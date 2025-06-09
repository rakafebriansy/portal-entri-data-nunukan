<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use Filament\Widgets\ChartWidget;

class ConsumptionPredictChart extends ChartWidget
{
    protected static ?string $heading = 'Prediksi Konsumsi';

    protected function getData(): array
    {
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            'datasets' => [
                [
                    'label' => 'Molen',
                    'data' => [120, 150, 170, 140, 180, 200],
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.3)',
                    'fill' => false,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Beras',
                    'data' => [80, 90, 110, 130, 160, 180],
                    'borderColor' => 'rgba(239, 68, 68, 1)',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.3)',
                    'fill' => false,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Umbi',
                    'data' => [40, 60, 60, 10, 20, 20],
                    'borderColor' => 'rgba(34, 197, 94, 1)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.3)',
                    'fill' => false,
                    'tension' => 0.4,
                ],
            ],
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
