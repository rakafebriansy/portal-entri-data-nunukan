<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\Widget;

class JumlahPengunaanBenihCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.jumlah-pengunaan-benih-card';
    public function getTotalPenggunaanBenih()
    {
        return DetailDashboardSp::whereHas('dashboardSp',function($query) {
                $query->where('tahun',now()->year);
            })->sum('jumlah_penggunaan_benih');
    }
    public function getColumnSpan(): int
    {
        return 2;
    }
}
