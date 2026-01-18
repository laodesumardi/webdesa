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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('page'); // beranda, profil, pemerintahan, berita, layanan, data, darurat, kesehatan, galeri, umkm, kontak
            $table->string('section'); // nama section di halaman tersebut
            $table->string('key'); // key unik untuk identifikasi konten (misal: hero_title, hero_subtitle, dll)
            $table->string('title')->nullable(); // judul konten (opsional)
            $table->text('content')->nullable(); // isi konten
            $table->timestamps();
            
            // Index untuk pencarian cepat
            $table->index(['page', 'section', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
