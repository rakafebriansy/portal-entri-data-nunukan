<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\ChartWidget;

class SektorPengeluaranChart extends ChartWidget
{
    protected static ?string $heading = 'Kolom Chart dari Pengeluaran';
    public $year;
    public function mount(): void
    {
        $year = session('pdrb_selected_year') ?? now()->year;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Kolom Chart Pengeluaran ' . $this->year;
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
                        $data->sektor_pengeluaran_1_1,
                        $data->sektor_pengeluaran_2_1,
                        $data->sektor_pengeluaran_3_1,
                        $data->sektor_pengeluaran_4_1,
                    ],
                    'backgroundColor' => '#3B7BDB',
                ],
                [
                    'data' => [
                        $data->sektor_pengeluaran_1_2,
                        $data->sektor_pengeluaran_2_2,
                        $data->sektor_pengeluaran_3_2,
                        $data->sektor_pengeluaran_4_2,
                    ],
                    'backgroundColor' => '#3B7BDB',
                ],
                [
                    'data' => [
                        $data->sektor_pengeluaran_1_3,
                        $data->sektor_pengeluaran_2_3,
                        $data->sektor_pengeluaran_3_3,
                        $data->sektor_pengeluaran_4_3,
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
