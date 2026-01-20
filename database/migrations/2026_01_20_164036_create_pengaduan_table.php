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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16)->nullable();
            $table->string('email')->nullable();
            $table->string('telepon');
            $table->text('alamat')->nullable();
            $table->string('kategori')->default('umum');
            $table->string('judul');
            $table->text('isi');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['masuk', 'diproses', 'selesai', 'ditolak'])->default('masuk');
            $table->text('tanggapan')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('ditanggapi_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
