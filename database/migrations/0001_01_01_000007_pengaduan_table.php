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
        Schema::create('pengaduan', function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('kategori', ['fasilitas_kampus', 'pelayanan_administrasi', 'kebijakan_kampus', 'tenaga_pengajar/staf', 'kegiatan_mahasiswa'])->nullable();
            $table->string('judul')->nullable();
            $table->foreignId('fakultas_id')->constrained('fakultas');
            $table->foreignId('lokasi_ruangan_id')->constrained('lokasi_ruangan');
            $table->string('gambar');
            $table->string('deskripsi')->nullable();
            $table->string('harapan_saran');
            $table->boolean('anonim')->default(0);
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
