<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class KomoditasPalawijaTertinggiChart extends ChartWidget
{
    protected static ?string $heading = 'Luas Panen 4 Komoditas Palawija Tertinggi (ha)';
    public $year;
    public static array $palawijaLabels = [
        'jagung' => 'Jagung',
        'kacang_tanah' => 'Kacang Tanah',
        'ubi_jalar' => 'Ubi Jalar',
        'ubi_kayu' => 'Ubi Kayu',
    ];

    public function mount(): void
    {
        $year = now()->year;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Luas Panen 4 Komoditas Palawija Tertinggi (ha) ' . $this->year;
    }
    protected function getData(): array
    {
        $columns = DetailDashboardSp::whereHas('dashboardSp', function ($query) {
            $query->where('tahun', $this->year);
        })->first([
                    'jenis_panen_palawija_tertinggi_1',
                    'jenis_panen_palawija_tertinggi_2',
                    'jenis_panen_palawija_tertinggi_3',
                    'jenis_panen_palawija_tertinggi_4',
                ]);
        $data = [
            DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->sum('luas_panen_palawija_tertinggi_2'),
            DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->sum('luas_panen_palawija_tertinggi_3'),
            DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->sum('luas_panen_palawija_tertinggi_4'),
        ];

        $labels = [
            self::$palawijaLabels[$columns['jenis_panen_palawija_tertinggi_1']],
            self::$palawijaLabels[$columns['jenis_panen_palawija_tertinggi_2']],
            self::$palawijaLabels[$columns['jenis_panen_palawija_tertinggi_3']],
            self::$palawijaLabels[$columns['jenis_panen_palawija_tertinggi_4']],
        ];

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                    ],
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
