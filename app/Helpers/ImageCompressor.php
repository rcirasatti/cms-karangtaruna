<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageCompressor
{
    /**
     * Max file sizes in bytes
     */
    const MAX_FILE_SIZE = 5242880; // 5MB
    const MAX_TOTAL_SIZE = 52428800; // 50MB
    const QUALITY = 80;

    /**
     * Compress image to WebP format with fallback to original if Image library unavailable
     * 
     * @param UploadedFile $file
     * @param string $path
     * @param int $quality Quality percentage (1-100)
     * @return string Path to saved image
     * @throws \Exception
     */
    public static function compressToWebp(UploadedFile $file, string $path = 'images', int $quality = self::QUALITY): string
    {
        // Validate file size
        if ($file->getSize() > self::MAX_FILE_SIZE) {
            $maxMB = self::MAX_FILE_SIZE / 1024 / 1024;
            $fileMB = round($file->getSize() / 1024 / 1024, 2);
            throw new \Exception("File size {$fileMB} MB exceeds maximum allowed {$maxMB} MB");
        }

        try {
            // Try to use Intervention Image if available
            return self::compressWithIntervention($file, $path, $quality);
        } catch (\Throwable $e) {
            // Fallback: save image with original extension if Intervention Image fails
            Log::warning('Image compression with Intervention failed, using fallback: ' . $e->getMessage());
            return self::saveFallback($file, $path);
        }
    }

    /**
     * Compress using Intervention Image library
     * 
     * @param UploadedFile $file
     * @param string $path
     * @param int $quality
     * @return string
     */
    private static function compressWithIntervention(UploadedFile $file, string $path, int $quality): string
    {
        // Generate filename with .webp extension
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.webp';
        
        // Read, manipulate and save image as WebP
        $image = \Intervention\Image\Laravel\Facades\Image::read($file)
            ->toWebp($quality);
        
        // Save to storage
        Storage::disk('public')->put("{$path}/{$filename}", (string)$image);
        
        return "{$path}/{$filename}";
    }

    /**
     * Fallback: Save image with original extension without compression
     * 
     * @param UploadedFile $file
     * @param string $path
     * @return string
     */
    private static function saveFallback(UploadedFile $file, string $path): string
    {
        // Generate filename with original extension
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
        
        // Save to storage using store() method
        $storedPath = $file->store($path, 'public');
        
        return $storedPath;
    }

    /**
     * Compress multiple images
     * 
     * @param array $files
     * @param string $path
     * @param int $quality
     * @return array Paths to saved images
     * @throws \Exception
     */
    public static function compressMultipleToWebp(array $files, string $path = 'images', int $quality = self::QUALITY): array
    {
        $paths = [];
        $totalSize = 0;
        
        // Calculate total size first
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $totalSize += $file->getSize();
            }
        }
        
        // Validate total size
        if ($totalSize > self::MAX_TOTAL_SIZE) {
            $maxMB = self::MAX_TOTAL_SIZE / 1024 / 1024;
            $totalMB = round($totalSize / 1024 / 1024, 2);
            throw new \Exception("Total file size {$totalMB} MB exceeds maximum allowed {$maxMB} MB");
        }
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = self::compressToWebp($file, $path, $quality);
            }
        }
        
        return $paths;
    }

    /**
     * Delete old image and compress new one
     * 
     * @param UploadedFile $file
     * @param string|null $oldPath
     * @param string $path
     * @param int $quality
     * @return string Path to saved image
     * @throws \Exception
     */
    public static function replaceWithWebp(UploadedFile $file, ?string $oldPath, string $path = 'images', int $quality = self::QUALITY): string
    {
        // Delete old image if exists
        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
        
        // Compress and save new image
        return self::compressToWebp($file, $path, $quality);
    }

    /**
     * Delete image from storage
     * 
     * @param string|null $path
     * @return bool
     */
    public static function deleteImage(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        
        return false;
    }
}
