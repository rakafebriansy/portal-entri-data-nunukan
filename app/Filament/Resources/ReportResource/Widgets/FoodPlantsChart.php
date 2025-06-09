<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use Filament\Widgets\ChartWidget;

class FoodPlantsChart extends ChartWidget
{
protected static ?string $heading = 'Grafik Tanaman Pangan';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Molen',
                    'data' => [1010, 1500, 1290, 1730, 2040],
                    'backgroundColor' => 'rgba(72, 81, 83, 0.7)',
                    'borderWidth' => 0,
                ],
                [
                    'label' => 'Tahu',
                    'data' => [800, 940, 1110, 1340, 1650],
                    'backgroundColor' => 'rgba(83, 43, 122, 0.7)',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
