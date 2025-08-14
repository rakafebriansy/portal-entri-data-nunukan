<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\Widget;

class LuasPenggunaanLahanCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.luas-penggunaan-lahan-card';
    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? 1992;
        $this->year = $year;
    }
    public function getTotalLuasLahan()
    {
        return DetailDashboardSp::whereHas('dashboardSp', function ($query) {
            $query->where('tahun', $this->year);
        })->sum('total_luas_penggunaan_lahan_pertanian');
    }
    public function getColumnSpan(): int
    {
        return 2;
    }
}
