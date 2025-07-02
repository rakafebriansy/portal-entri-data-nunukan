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
        ]);
        KategoriSp::create([
            'nama' => 'SPH - SBS',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Palawija',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - BST',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - TBF',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SPH - TH',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Lahan',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Alat dan Mesin',
            'bidang' => 'pertanian',
        ]);
        KategoriSp::create([
            'nama' => 'SP - Benih Tanaman',
            'bidang' => 'pertanian',
        ]);
    }
}
