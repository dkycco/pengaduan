<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'fakultas_id',
        'lokasi_ruangan_id',
        'gambar',
        'deskripsi',
        'harapan_saran',
        'suka',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function pengaduan_status() {
        return $this->hasOne(PengaduanStatus::class, 'pengaduan_id');
    }
}
