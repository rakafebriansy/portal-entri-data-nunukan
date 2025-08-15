<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\Widget;

class PdrbPerKapitaCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.pdrb-per-kapita-card';
    public $year;
    public function mount(): void
    {
        $year = session('pdrb_selected_year') ?? now()->year;
        $this->year = $year;
    }

    public function getPdrbPerKapita()
    {
        return DetailDashboardPdrb::whereHas('dashboardPdrb', function ($query) {
            $query->where('tahun', $this->year);
        })->sum('pdrb_per_kapita');
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
}
