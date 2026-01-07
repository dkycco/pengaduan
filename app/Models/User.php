<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'nama',
        'nim',
        'fakultas_id',
        'prodi_id',
        'foto_profile',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted() {
        static::creating(function ($user) {
            if (!$user->uuid) {
                $user->uuid = (string) Str::uuid();
            }
        });
    }

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function pengaduan() {
        return $this->hasMany(Pengaduan::class, 'user_uuid', 'uuid');
    }
}
