<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\LokasiRuangan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $fakultas = Fakultas::create([
            'nama' => 'Fakultas Teknologi Informasi',
            'singkat' => 'FTI'
        ]);

        $prodi = Prodi::create([
            'nama' => 'Informatika',
            'singkat' => 'IF',
            'fakultas_id' => $fakultas->id
        ]);

        $ruangan = LokasiRuangan::create([
            'nama' => 'Ruang 1',
            'fakultas_id' => $fakultas->id,
            'prodi_id' => $prodi->id
        ]);

        $user = User::create([
            'uuid' => Str::uuid(),
            'nama' => 'Diki Muhamad Alfikri',
            'nim' => '230660121111',
            'fakultas_id' => $fakultas->id,
            'prodi_id' => $prodi->id,
            'foto_profile' => '',
            'password' => bcrypt('12345')
        ], [
            'uuid' => Str::uuid(),
            'nama' => 'Admin',
            'nim' => '230660121112',
            'fakultas_id' => $fakultas->id,
            'prodi_id' => $prodi->id,
            'foto_profile' => '',
            'password' => bcrypt('admin')
        ]);
    }
}
