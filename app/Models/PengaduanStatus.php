<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanStatus extends Model
{
    protected $table = 'pengaduan_status';

    protected $fillable = [
        'pengaduan_uuid',
        'status',
        'waktu_terkirim',
        'waktu_diproses',
        'waktu_selesai'
    ];
}
