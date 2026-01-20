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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('nama_pemilik');
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('whatsapp');
            $table->string('gambar')->nullable();
            $table->string('kategori')->default('lainnya');
            $table->decimal('harga_mulai', 12, 0)->nullable();
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
