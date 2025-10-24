<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix Produk galeri column (should be json, already is)
        // Produk.foto - string is ok for single image
        
        // Fix VisiMisi images - all should be longText or text
        if (Schema::hasTable('visi_misi')) {
            Schema::table('visi_misi', function (Blueprint $table) {
                // These columns store image paths, ok as string for single images
                // No change needed - already text type in migrations
            });
        }

        // Fix Kepengurusan foto
        if (Schema::hasTable('kepengurusan')) {
            Schema::table('kepengurusan', function (Blueprint $table) {
                // foto is string, ok for single image
            });
        }

        // Fix Mitra logo
        if (Schema::hasTable('mitra')) {
            Schema::table('mitra', function (Blueprint $table) {
                // logo is string, ok for single image
            });
        }

        // Fix Profile/About columns
        if (Schema::hasTable('profiles')) {
            Schema::table('profiles', function (Blueprint $table) {
                // logo_path and filosofi_logo are already text
            });
        }

        // Fix FilosofiLogoItem gambar
        if (Schema::hasTable('filosofi_logo_items')) {
            Schema::table('filosofi_logo_items', function (Blueprint $table) {
                // gambar is string, ok for single image
            });
        }

        // Fix Quote foto
        if (Schema::hasTable('quotes')) {
            Schema::table('quotes', function (Blueprint $table) {
                // foto is string, ok for single image
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No changes needed for reverse since we didn't alter anything
    }
};
