<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailDashboardSp extends Model
{
    protected $fillable = [
        'dashboard_sp_id',
        'jumlah_alsintan',
        'jumlah_penggunaan_benih',
        'total_luas_penggunaan_lahan_pertanian',
        'luas_panen_jagung_jan',
        'luas_panen_jagung_feb',
        'luas_panen_jagung_mar',
        'luas_panen_jagung_apr',
        'luas_panen_jagung_mei',
        'luas_panen_jagung_jun',
        'luas_panen_jagung_jul',
        'luas_panen_jagung_agu',
        'luas_panen_jagung_sep',
        'luas_panen_jagung_okt',
        'luas_panen_jagung_nov',
        'luas_panen_jagung_des',
        'jenis_panen_palawija_tertinggi_1',
        'luas_panen_palawija_tertinggi_1',
        'jenis_panen_palawija_tertinggi_2',
        'luas_panen_palawija_tertinggi_2',
        'jenis_panen_palawija_tertinggi_3',
        'luas_panen_palawija_tertinggi_3',
        'jenis_panen_palawija_tertinggi_4',
        'luas_panen_palawija_tertinggi_4',
        'jenis_tanaman_bst_tertinggi_1',
        'jumlah_tanaman_bst_tertinggi_1',
        'jenis_tanaman_bst_tertinggi_2',
        'jumlah_tanaman_bst_tertinggi_2',
        'jenis_tanaman_bst_tertinggi_3',
        'jumlah_tanaman_bst_tertinggi_3',
        'jenis_tanaman_sbs_tertinggi_1',
        'luas_tanaman_sbs_tertinggi_1',
        'jenis_tanaman_sbs_tertinggi_2',
        'luas_tanaman_sbs_tertinggi_2',
        'jenis_tanaman_sbs_tertinggi_3',
        'luas_tanaman_sbs_tertinggi_3',
        'jenis_ternak_potong_1',
        'jumlah_ternak_potong_1',
        'jenis_ternak_potong_2',
        'jumlah_ternak_potong_2',
        'jenis_ternak_potong_3',
        'jumlah_ternak_potong_3',
        'jenis_ternak_potong_4',
        'jumlah_ternak_potong_4',
        'tahun_tren_pemotongan_ternak_1',
        'jumlah_tren_pemotongan_ternak_1',
        'tahun_tren_pemotongan_ternak_2',
        'jumlah_tren_pemotongan_ternak_2',
        'tahun_tren_pemotongan_ternak_3',
        'jumlah_tren_pemotongan_ternak_3',
        'tahun_tren_pemotongan_ternak_4',
        'jumlah_tren_pemotongan_ternak_4',
        'tahun_tren_pemotongan_ternak_5',
        'jumlah_tren_pemotongan_ternak_5',
    ];
    public function dashboardSp()
    {
        return $this->belongsTo(DashboardSp::class);
    }
}
