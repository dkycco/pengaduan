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
            $table->enum('status', ['dibuat', 'diproses', 'selesai'])->nullable();
            $table->dateTime('waktu_dibuat');
            $table->dateTime('waktu_diproses');
            $table->dateTime('waktu_selesai');
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
