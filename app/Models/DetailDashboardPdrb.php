<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailDashboardPdrb extends Model
{
    protected $fillable = [
        'dashboard_pdrb_id',
        'pdrb_atas_dasar_harga_berlaku',
        'pdrb_atas_dasar_harga_konstan',
        'pertumbuhan_y_on_y',
        'pdrb_per_kapita',
        'nilai_adhb',
        'nilai_adhk',
        'sektor_lapangan_usaha_1_1',
        'sektor_lapangan_usaha_1_2',
        'sektor_lapangan_usaha_1_3',
        'sektor_lapangan_usaha_2_1',
        'sektor_lapangan_usaha_2_2',
        'sektor_lapangan_usaha_2_3',
        'sektor_lapangan_usaha_3_1',
        'sektor_lapangan_usaha_3_2',
        'sektor_lapangan_usaha_3_3',
        'adhb_lapangan_usaha_1',
        'adhk_lapangan_usaha_1',
        'adhb_lapangan_usaha_2',
        'adhk_lapangan_usaha_2',
        'adhb_lapangan_usaha_3',
        'adhk_lapangan_usaha_3',
        'sektor_pengeluaran_1_1',
        'sektor_pengeluaran_1_2',
        'sektor_pengeluaran_1_3',
        'sektor_pengeluaran_2_1',
        'sektor_pengeluaran_2_2',
        'sektor_pengeluaran_2_3',
        'sektor_pengeluaran_3_1',
        'sektor_pengeluaran_3_2',
        'sektor_pengeluaran_3_3',
        'sektor_pengeluaran_4_1',
        'sektor_pengeluaran_4_2',
        'sektor_pengeluaran_4_3',
        'adhb_komp_1',
        'adhk_komp_1',
        'adhb_komp_2',
        'adhk_komp_2',
        'adhb_komp_3',
        'adhk_komp_3',
    ];

    public function dashboardPdrb()
    {
        return $this->belongsTo(DashboardPdrb::class);
    }
}
