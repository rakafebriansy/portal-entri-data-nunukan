<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\Widget;

class PertumbuhanYoyCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.pertumbuhan-yoy-card';
    public $year;
    public function mount(): void
    {
        $year = session('pdrb_selected_year') ?? 1992;
        $this->year = $year;
    }

    public function getPertumbuhanYoy()
    {
        return DetailDashboardPdrb::whereHas('dashboardPdrb', function ($query) {
            $query->where('tahun', $this->year);
        })->sum('pertumbuhan_y_on_y');
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
}
