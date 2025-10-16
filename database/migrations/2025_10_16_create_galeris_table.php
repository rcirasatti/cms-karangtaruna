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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('berita')->onDelete('cascade');
            $table->enum('tipe', ['foto', 'video'])->default('foto');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('url'); // URL untuk foto atau embedded video (YouTube/Vimeo)
            $table->string('thumbnail')->nullable(); // Path thumbnail untuk video
            $table->string('diupload_oleh')->nullable();
            $table->timestamps();
            $table->index('kegiatan_id');
            $table->index('tipe');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
