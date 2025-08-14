<?php

namespace Database\Seeders;

use App\Models\DashboardSp;
use App\Models\DetailDashboardSp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardSpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunMulai = 2005;
        $tahunAkhir = 2025;

        for ($tahun = $tahunMulai; $tahun <= $tahunAkhir; $tahun++) {
            $dashboard = DashboardSp::create([
                'tahun' => $tahun,
                'deskripsi' => fake()->paragraph(3)
            ]);

            DetailDashboardSp::create([
                'dashboard_sp_id' => $dashboard->id,
                'jumlah_alsintan' => fake()->numberBetween(10, 100),
                'jumlah_penggunaan_benih' => fake()->numberBetween(100, 1000),
                'total_luas_penggunaan_lahan_pertanian' => fake()->numberBetween(1000, 10000),
                'luas_panen_jagung_jan' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_feb' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_mar' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_apr' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_mei' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_jun' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_jul' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_agu' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_sep' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_okt' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_nov' => fake()->numberBetween(10, 200),
                'luas_panen_jagung_des' => fake()->numberBetween(10, 200),
                'jenis_panen_palawija_tertinggi_1' => fake()->randomElement(['ubi_kayu', 'jagung', 'kacang_tanah', 'ubi_jalar']),
                'luas_panen_palawija_tertinggi_1' => fake()->numberBetween(100, 1000),
                'jenis_panen_palawija_tertinggi_2' => fake()->randomElement(['ubi_kayu', 'jagung', 'kacang_tanah', 'ubi_jalar']),
                'luas_panen_palawija_tertinggi_2' => fake()->numberBetween(100, 1000),
                'jenis_panen_palawija_tertinggi_3' => fake()->randomElement(['ubi_kayu', 'jagung', 'kacang_tanah', 'ubi_jalar']),
                'luas_panen_palawija_tertinggi_3' => fake()->numberBetween(100, 1000),
                'jenis_panen_palawija_tertinggi_4' => fake()->randomElement(['ubi_kayu', 'jagung', 'kacang_tanah', 'ubi_jalar']),
                'luas_panen_palawija_tertinggi_4' => fake()->numberBetween(100, 1000),
                'jenis_tanaman_bst_tertinggi_1' => fake()->randomElement(['pisang', 'nanas', 'durian']),
                'jumlah_tanaman_bst_tertinggi_1' => fake()->numberBetween(100, 500),
                'jenis_tanaman_bst_tertinggi_2' => fake()->randomElement(['pisang', 'nanas', 'durian']),
                'jumlah_tanaman_bst_tertinggi_2' => fake()->numberBetween(100, 500),
                'jenis_tanaman_bst_tertinggi_3' => fake()->randomElement(['pisang', 'nanas', 'durian']),
                'jumlah_tanaman_bst_tertinggi_3' => fake()->numberBetween(100, 500),
                'jenis_tanaman_sbs_tertinggi_1' => fake()->randomElement(['bayam', 'kangkung', 'sawi']),
                'luas_tanaman_sbs_tertinggi_1' => fake()->numberBetween(10, 200),
                'jenis_tanaman_sbs_tertinggi_2' => fake()->randomElement(['bayam', 'kangkung', 'sawi']),
                'luas_tanaman_sbs_tertinggi_2' => fake()->numberBetween(10, 200),
                'jenis_tanaman_sbs_tertinggi_3' => fake()->randomElement(['bayam', 'kangkung', 'sawi']),
                'luas_tanaman_sbs_tertinggi_3' => fake()->numberBetween(10, 200),
                'jenis_ternak_potong_1' => fake()->randomElement(['kambing', 'babi', 'sapi', 'kerbau']),
                'jumlah_ternak_potong_1' => fake()->numberBetween(10, 500),
                'jenis_ternak_potong_2' => fake()->randomElement(['kambing', 'babi', 'sapi', 'kerbau']),
                'jumlah_ternak_potong_2' => fake()->numberBetween(10, 500),
                'jenis_ternak_potong_3' => fake()->randomElement(['kambing', 'babi', 'sapi', 'kerbau']),
                'jumlah_ternak_potong_3' => fake()->numberBetween(10, 500),
                'jenis_ternak_potong_4' => fake()->randomElement(['kambing', 'babi', 'sapi', 'kerbau']),
                'jumlah_ternak_potong_4' => fake()->numberBetween(10, 500),
                'tahun_tren_pemotongan_ternak_1' => fake()->year(),
                'jumlah_tren_pemotongan_ternak_1' => fake()->numberBetween(10, 200),
                'tahun_tren_pemotongan_ternak_2' => fake()->year(),
                'jumlah_tren_pemotongan_ternak_2' => fake()->numberBetween(10, 200),
                'tahun_tren_pemotongan_ternak_3' => fake()->year(),
                'jumlah_tren_pemotongan_ternak_3' => fake()->numberBetween(10, 200),
                'tahun_tren_pemotongan_ternak_4' => fake()->year(),
                'jumlah_tren_pemotongan_ternak_4' => fake()->numberBetween(10, 200),
                'tahun_tren_pemotongan_ternak_5' => fake()->year(),
                'jumlah_tren_pemotongan_ternak_5' => fake()->numberBetween(10, 200),
            ]);
        }
    }
}
