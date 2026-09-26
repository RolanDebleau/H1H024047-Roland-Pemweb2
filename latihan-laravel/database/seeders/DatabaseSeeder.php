<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProgramStudiSeeder::class);
        $this->call(MatakuliahSeeder::class);

        Mahasiswa::factory()->count(30)->create();

        $daftarMatakuliah = Matakuliah::pluck('id');
        $nilaiOpsi = ['A', 'AB', 'B', 'BC', 'C', 'D'];

        Mahasiswa::all()->each(function ($mahasiswa) use ($daftarMatakuliah, $nilaiOpsi) {
            $diambil = $daftarMatakuliah->random(rand(2, 4));

            foreach ($diambil as $matakuliahId) {
                $mahasiswa->matakuliah()->attach($matakuliahId, [
                    'nilai' => $nilaiOpsi[array_rand($nilaiOpsi)],
                ]);
            }
        });
    }
}