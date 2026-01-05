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
        'status',
        'create_at',
        'update_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
