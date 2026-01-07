<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'user_uuid',
        'judul',
        'kategori',
        'fakultas_id',
        'lokasi_ruangan_id',
        'gambar',
        'deskripsi',
        'harapan_saran',
        'suka',
        'anonim'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function pengaduan_status() {
        return $this->hasOne(PengaduanStatus::class, 'pengaduan_id');
    }
}
