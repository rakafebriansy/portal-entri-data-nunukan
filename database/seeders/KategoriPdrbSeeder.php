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
            'nama' => 'Pendidikan',
            'deskripsi' => 'Dinas Pendidikan Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Pangan dan Pertanian',
            'deskripsi' => 'Dinas Ketahanan Pangan dan dan Pertanian Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Budaya dan Olahraga',
            'deskripsi' => 'Dinas Kebudayaan Kepemudaan dan Olahraga serta Pariwisata Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Kelautan dan Perikanan',
            'deskripsi' => 'Dinas Kelautan dan Perikanan Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Pekerjaan dan Penataan',
            'deskripsi' => 'Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Ruang',
        ]);
        KategoriPdrb::create([
            'nama' => 'Perhubungan',
            'deskripsi' => 'Dinas Perhubungan Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Air Minum',
            'deskripsi' => 'Perumda Air Minum Tirta Taka Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Bapenda',
            'deskripsi' => 'UPTD Bapenda Kelas A Wilayah Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Perdagangan',
            'deskripsi' => 'Dinas Koperasi, UMKM, Perdagangan, dan Perindustrian Kabupaten Nunukan',
        ]);
        KategoriPdrb::create([
            'nama' => 'Keuangan dan Aset',
            'deskripsi' => 'Badan Pengelolaan Keuangan dan Aset Daerah  (BPKAD) Kabupaten Nunukan',
        ]);
    }
}
