<?php

namespace Database\Seeders;

use App\Models\DashboardPdrb;
use App\Models\DetailDashboardPdrb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DashboardPdrbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunMulai = 2005;
        $tahunAkhir = 2025;

        for ($tahun = $tahunMulai; $tahun <= $tahunAkhir; $tahun++) {
            $dashboard = DashboardPdrb::create([
                'tahun' => $tahun,
                'deskripsi' => "Data PDRB untuk tahun $tahun. " . Str::random(50),
            ]);

            DetailDashboardPdrb::create([
                'dashboard_pdrb_id' => $dashboard->id,
                'pdrb_atas_dasar_harga_berlaku' => rand(100000, 500000),
                'pdrb_atas_dasar_harga_konstan' => rand(80000, 400000),
                'pertumbuhan_y_on_y' => rand(1, 10),
                'pdrb_per_kapita' => rand(1000, 5000),
                'nilai_adhb' => rand(50000, 200000),
                'sektor_lapangan_usaha_1_1' => rand(1000, 5000),
                'sektor_lapangan_usaha_1_2' => rand(1000, 5000),
                'sektor_lapangan_usaha_1_3' => rand(1000, 5000),
                'sektor_lapangan_usaha_2_1' => rand(1000, 5000),
                'sektor_lapangan_usaha_2_2' => rand(1000, 5000),
                'sektor_lapangan_usaha_2_3' => rand(1000, 5000),
                'sektor_lapangan_usaha_3_1' => rand(1000, 5000),
                'sektor_lapangan_usaha_3_2' => rand(1000, 5000),
                'sektor_lapangan_usaha_3_3' => rand(1000, 5000),
                'adhb_lapangan_usaha_1' => rand(5000, 20000),
                'adhk_lapangan_usaha_1' => rand(5000, 20000),
                'adhb_lapangan_usaha_2' => rand(5000, 20000),
                'adhk_lapangan_usaha_2' => rand(5000, 20000),
                'adhb_lapangan_usaha_3' => rand(5000, 20000),
                'adhk_lapangan_usaha_3' => rand(5000, 20000),
                'sektor_pengeluaran_1_1' => rand(1000, 5000),
                'sektor_pengeluaran_1_2' => rand(1000, 5000),
                'sektor_pengeluaran_1_3' => rand(1000, 5000),
                'sektor_pengeluaran_2_1' => rand(1000, 5000),
                'sektor_pengeluaran_2_2' => rand(1000, 5000),
                'sektor_pengeluaran_2_3' => rand(1000, 5000),
                'sektor_pengeluaran_3_1' => rand(1000, 5000),
                'sektor_pengeluaran_3_2' => rand(1000, 5000),
                'sektor_pengeluaran_3_3' => rand(1000, 5000),
                'sektor_pengeluaran_4_1' => rand(1000, 5000),
                'sektor_pengeluaran_4_2' => rand(1000, 5000),
                'sektor_pengeluaran_4_3' => rand(1000, 5000),
                'sektor_pengeluaran_4_4' => rand(1000, 5000),
                'adhb_komp_1' => rand(5000, 20000),
                'adhk_komp_1' => rand(5000, 20000),
                'adhb_komp_2' => rand(5000, 20000),
                'adhk_komp_2' => rand(5000, 20000),
                'adhb_komp_3' => rand(5000, 20000),
                'adhk_komp_3' => rand(5000, 20000),
            ]);
        }
    }
}
