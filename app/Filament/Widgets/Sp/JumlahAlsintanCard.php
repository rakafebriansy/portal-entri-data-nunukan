<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\Widget;

class JumlahAlsintanCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.jumlah-alsintan-card';
    public function getTotalAlsintan()
    {
        return DetailDashboardSp::whereHas('dashboardSp',function($query) {
                $query->where('tahun',now()->year);
            })->sum('jumlah_alsintan');
    }
    public function getColumnSpan(): int
    {
        return 2;
    }
}
