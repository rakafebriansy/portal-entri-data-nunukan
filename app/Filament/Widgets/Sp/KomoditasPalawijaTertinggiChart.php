<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class KomoditasPalawijaTertinggiChart extends ChartWidget
{
    protected static ?string $heading = 'Luas Panen 4 Komoditas Palawija Tertinggi (ha)';
    public static array $palawijaLabels = [
        'jagung' => 'Jagung',
        'kacang_tanah' => 'Kacang Tanah',
        'ubi_jalar' => 'Ubi Jalar',
        'ubi_kayu' => 'Ubi Kayu',
    ];
    public static array $fields = [
        'jenis_panen_palawija_tertinggi_1',
        'jenis_panen_palawija_tertinggi_2',
        'jenis_panen_palawija_tertinggi_3',
        'jenis_panen_palawija_tertinggi_4',
    ];
    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? now()->year;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Luas Panen 4 Komoditas Palawija Tertinggi (ha) ' . $this->year;
    }
    protected function getData(): array
    {
        $detailDashboardSp = DetailDashboardSp::whereHas('dashboardSp', function ($query) {
            $query->where('tahun', $this->year);
        })->first();

        $data = collect(self::$fields)->map(function ($field) {
            return DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->sum($field);
        })->toArray();

        $labels = collect(self::$fields)->map(function ($field) use ($detailDashboardSp) {
            return self::$palawijaLabels[$detailDashboardSp[$field]] ?? 'Unknown';
        })->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        'rgb(39, 173, 142)',
                        'rgb(51, 112, 235)',
                        'rgb(37, 178, 229)',
                        'rgb(27, 206, 191)',
                    ],
                ],
            ],
        ];
    }
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'x' => [
                    'ticks' => [
                        'display' => false
                    ]
                ],
                'y' => [
                    'ticks' => [
                        'display' => false
                    ]
                ],
            ],
        ];
    }
    protected function getMaxHeight(): string
    {
        return '200px';
    }
    protected function getType(): string
    {
        return 'doughnut';
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
}
