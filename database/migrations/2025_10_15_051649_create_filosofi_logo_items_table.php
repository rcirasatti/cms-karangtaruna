<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filosofi_logo_items', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul item filosofi (misal: Desain Unik, Warna Merah)
            $table->text('description'); // Deskripsi filosofi
            $table->string('icon')->nullable(); // Nama icon (optional)
            $table->string('gambar')->nullable(); // Path gambar (optional)
            $table->integer('urutan')->default(0); // Urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filosofi_logo_items');
    }
};
