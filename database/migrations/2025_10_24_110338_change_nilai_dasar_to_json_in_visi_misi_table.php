<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert existing text data to JSON format
        $records = DB::table('visi_misi')->get();

        foreach ($records as $record) {
            if ($record->nilai_dasar && !empty($record->nilai_dasar)) {
                // Convert existing text to array format
                $values = array_filter(array_map('trim', explode("\n", $record->nilai_dasar)));
                DB::table('visi_misi')
                    ->where('id', $record->id)
                    ->update(['nilai_dasar' => json_encode(array_values($values))]);
            }
        }

        // Then change column type to JSON
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->json('nilai_dasar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Convert JSON back to text
        $records = DB::table('visi_misi')->get();

        foreach ($records as $record) {
            if ($record->nilai_dasar) {
                $values = json_decode($record->nilai_dasar, true);
                if (is_array($values)) {
                    $text = implode("\n", $values);
                    DB::table('visi_misi')
                        ->where('id', $record->id)
                        ->update(['nilai_dasar' => $text]);
                }
            }
        }

        Schema::table('visi_misi', function (Blueprint $table) {
            $table->text('nilai_dasar')->nullable()->change();
        });
    }
};
