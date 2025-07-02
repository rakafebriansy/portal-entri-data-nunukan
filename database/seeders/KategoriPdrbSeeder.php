<?php

namespace Database\Seeders;

use App\Models\KategoriPdrb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPdrbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriPdrb::create([
            'nama' => 'Pendidikan'
        ]);
        KategoriPdrb::create([
            'nama' => 'Pangan dan Pertanian'
        ]);
        KategoriPdrb::create([
            'nama' => 'Budaya dan Olahraga'
        ]);
        KategoriPdrb::create([
            'nama' => 'Kelautan dan Perikanan'
        ]);
        KategoriPdrb::create([
            'nama' => 'Pekerjaan dan Penataan'
        ]);
        KategoriPdrb::create([
            'nama' => 'Perhubungan'
        ]);
        KategoriPdrb::create([
            'nama' => 'Air Minum'
        ]);
        KategoriPdrb::create([
            'nama' => 'Bapenda'
        ]);
        KategoriPdrb::create([
            'nama' => 'Perdagangan'
        ]);
        KategoriPdrb::create([
            'nama' => 'Keuangan dan Aset'
        ]);
    }
}
