<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';

    protected $fillable = [
        'nama',
        'singkat'
    ];

    public function pengaduan() {
        return $this->hasMany(Pengaduan::class, 'fakultas_id');
    }
}
