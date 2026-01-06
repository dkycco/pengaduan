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
        Schema::create('pengaduan_status', function(Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->constrained('pengaduan');
            $table->enum('status', ['terkirim', 'diproses', 'selesai'])->default('terkirim');
            $table->dateTime('waktu_dibuat')->nullable();
            $table->dateTime('waktu_diproses')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_status');
    }
};
