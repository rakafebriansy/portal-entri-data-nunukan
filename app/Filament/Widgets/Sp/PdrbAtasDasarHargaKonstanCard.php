<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\Widget;

class PdrbAtasDasarHargaKonstanCard extends Widget
{
    protected static string $view = 'filament.widgets.sp.pdrb-atas-dasar-harga-konstan-card';
    public $year;
    public function mount(): void
    {
        $year = session('pdrb_selected_year') ?? 1992;
        $this->year = $year;
    }

    public function getPdrbAtasDasarHargaKonstan()
    {
        return DetailDashboardPdrb::whereHas('dashboardPdrb', function ($query) {
            $query->where('tahun', $this->year);
        })->sum('pdrb_atas_dasar_harga_konstan');
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
}
