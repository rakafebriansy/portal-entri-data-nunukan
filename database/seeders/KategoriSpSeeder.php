<?php

namespace Database\Seeders;

use App\Models\KategoriSp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriSp::create([
            'nama' => 'Peternakan',
            'bidang' => 'peternakan',
            'jenis_periode' => 'bulanan',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - SBS',
            'bidang' => 'pertanian',
            'jenis_periode' => 'bulanan',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Palawija',
            'bidang' => 'pertanian',
            'jenis_periode' => 'bulanan',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - BST',
            'bidang' => 'pertanian',
            'jenis_periode' => 'triwulan',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - TBF',
            'bidang' => 'pertanian',
            'jenis_periode' => 'triwulan',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - TH',
            'bidang' => 'pertanian',
            'jenis_periode' => 'triwulan',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Lahan',
            'bidang' => 'pertanian',
            'jenis_periode' => 'tahunan',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Alat dan Mesin',
            'bidang' => 'pertanian',
            'jenis_periode' => 'tahunan',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Benih Tanaman',
            'bidang' => 'pertanian',
            'jenis_periode' => 'tahunan',
        ]);
    }
}
