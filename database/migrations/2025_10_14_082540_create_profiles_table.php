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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->text('alamat');
            $table->year('tahun_berdiri');
            $table->string('legalitas')->nullable();
            $table->text('sejarah');
            $table->text('profil_singkat');
            $table->string('logo_path')->nullable();
            $table->text('filosofi_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
