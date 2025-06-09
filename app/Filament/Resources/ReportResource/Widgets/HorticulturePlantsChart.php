<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use Filament\Widgets\ChartWidget;

class HorticulturePlantsChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Tanaman Hortikultura';

    // protected function getOptions(): array
    // {
    //     return [
    //         'plugins' => [
    //             'title' => [
    //                 'display' => true,
    //                 'text' => 'Grafik Tanaman Hortikultura',
    //                 'font' => [
    //                     'size' => 16,
    //                     'weight' => 'bold',
    //                 ],
    //             ],
    //         ],
    //     ];
    // }
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Beras',
                    'data' => [100, 150, 120, 170, 200],
                    'backgroundColor' => 'rgba(34, 197, 94, 0.7)',
                    'borderWidth' => 0,
                ],
                [
                    'label' => 'Umbi',
                    'data' => [80, 90, 110, 130, 160],
                    'backgroundColor' => 'rgba(239, 68, 68, 0.7)',
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
