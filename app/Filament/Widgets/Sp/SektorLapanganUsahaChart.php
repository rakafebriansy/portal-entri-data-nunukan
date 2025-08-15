<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\ChartWidget;

class SektorLapanganUsahaChart extends ChartWidget
{
    protected static ?string $heading = 'Kolom Chart Lapangan Usaha';
    public $year;
    public function mount(): void
    {
        $year = session('pdrb_selected_year') ?? now()->year;
        $this->year = $year;
    }

    protected function getData(): array
    {
        $data = DetailDashboardPdrb::whereHas('dashboardPdrb', function ($query) {
            $query->where('tahun', $this->year);
        })->first();

        return [
            'datasets' => [
                [
                    'data' => [
                        $data->sektor_lapangan_usaha_1_1,
                        $data->sektor_lapangan_usaha_2_1,
                        $data->sektor_lapangan_usaha_3_1,
                        $data->sektor_lapangan_usaha_4_1,
                    ],
                    'backgroundColor' => '#3B7BDB',
                ],
                [
                    'data' => [
                        $data->sektor_lapangan_usaha_1_2,
                        $data->sektor_lapangan_usaha_2_2,
                        $data->sektor_lapangan_usaha_3_2,
                        $data->sektor_lapangan_usaha_4_2,
                    ],
                    'backgroundColor' => '#3B7BDB',
                ],
                [
                    'data' => [
                        $data->sektor_lapangan_usaha_1_3,
                        $data->sektor_lapangan_usaha_2_3,
                        $data->sektor_lapangan_usaha_3_3,
                        $data->sektor_lapangan_usaha_4_3,
                    ],
                    'backgroundColor' => '#3B7BDB',
                ],
            ],
            'labels' => ['Sektor 1', 'Sektor 2', 'Sektor 3', 'Sektor 4'],
        ];
    }
    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
    public function getColumnSpan(): int
    {
        return 6;
    }
    protected function getMaxHeight(): string
    {
        return '400px';
    }
}
