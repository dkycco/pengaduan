<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\LokasiRuangan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Fakultas::create([
            'nama' => 'Fakultas Teknologi Informasi',
            'singkat' => 'FTI'
        ]);

        Prodi::create([
            'nama' => 'Informatika',
            'singkat' => 'IF',
            'fakultas_id' => '1'
        ]);

        LokasiRuangan::create([
            'nama' => 'Ruang 1',
            'fakultas_id' => '1',
            'prodi_id' => '1'
        ]);

        User::create([
            'nama' => 'Diki Muhamad Alfikri',
            'nim' => '230660121111',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'foto_profile' => '',
            'password' => bcrypt('12345')
        ]);
    }
}
