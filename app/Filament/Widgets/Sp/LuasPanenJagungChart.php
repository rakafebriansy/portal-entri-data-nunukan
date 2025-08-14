<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class LuasPanenJagungChart extends ChartWidget
{
    protected static ?string $heading = 'Luas Panen Jagung (ha)';
    protected static $year;

    public function mount(): void
    {
        $year = now()->year;
        self::$heading = 'Luas Panen Jagung (ha) ' . $year;
        self::$year = $year;
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
            $data[] = DetailDashboardSp::whereHas('dashboardSp',function($query) {
                $query->where('tahun',self::$year);
            })->sum('luas_panen_jagung_' . $b);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jagung',
                    'data' => $data,
                    'backgroundColor' => 'rgba(72, 81, 83, 0.7)',
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
}
