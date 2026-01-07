<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanStatus extends Model
{
    protected $table = 'pengaduan_status';

    protected $fillable = [
        'pengaduan_id',
        'status',
        'waktu_dibuat',
        'waktu_diproses',
        'waktu_selesai'
    ];
}
