<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\Widget;

class JumlahAlsintanCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.jumlah-alsintan-card';
    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? 1992;
        $this->year = $year;
    }
    
    public function getTotalAlsintan()
    {
        return DetailDashboardSp::whereHas('dashboardSp', function ($query) {
            $query->where('tahun', $this->year);
        })->sum('jumlah_alsintan');
    }
    public function getColumnSpan(): int
    {
        return 2;
    }
}
