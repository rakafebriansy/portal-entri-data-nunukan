<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class LuasPanenJagungChart extends ChartWidget
{
    protected static ?string $heading = 'Luas Panen Jagung (ha)';
    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? now()->year;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Luas Panen Jagung (ha) ' . $this->year;
    }
    protected function getData(): array
    {
        $bulan = [
            'jan',
            'feb',
            'mar',
            'apr',
            'mei',
            'jun',
            'jul',
            'agu',
            'sep',
            'okt',
            'nov',
            'des'
        ];

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $data = [];

        foreach ($bulan as $b) {
            $data[] = DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->sum('luas_panen_jagung_' . $b);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Luas (m2)',
                    'data' => $data,
                    'backgroundColor' => 'rgb(51, 112, 235)',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
    protected function getMaxHeight(): string
    {
        return '200px';
    }
}
