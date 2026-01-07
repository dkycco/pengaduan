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
            $table->uuid('user_uuid');
            $table->enum('kategori', [
                'fasilitas_kampus', 'pelayanan_administrasi',
                'kebijakan_kampus', 'tenaga_pengajar/staf', 
                'kegiatan_mahasiswa'
            ]);
            $table->string('judul');
            $table->foreignId('fakultas_id')->constrained('fakultas');
            $table->foreignId('lokasi_ruangan_id')->constrained('lokasi_ruangan');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->text('harapan_saran');
            $table->integer('suka')->default(0)->nullable();
            $table->enum('anonim', ['true', 'false']);
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
