<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class TrenPemotonganTernakChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Pemotongan Ternak';
    public static array $jumlahFields = [
        'jumlah_tren_pemotongan_ternak_1',
        'jumlah_tren_pemotongan_ternak_2',
        'jumlah_tren_pemotongan_ternak_3',
        'jumlah_tren_pemotongan_ternak_4',
        'jumlah_tren_pemotongan_ternak_5',
    ];

    public static array $tahunFields = [
        'tahun_tren_pemotongan_ternak_1',
        'tahun_tren_pemotongan_ternak_2',
        'tahun_tren_pemotongan_ternak_3',
        'tahun_tren_pemotongan_ternak_4',
        'tahun_tren_pemotongan_ternak_5',
    ];

    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? 1992;
        $this->year = $year;
    }

    public function getHeading(): ?string
    {
        return 'Tren Pemotongan Ternak ' . $this->year . ' - ' . ($this->year - 4);
    }
    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $records = DetailDashboardSp::with('dashboardSp')->get();

        $labels = [];
        $data = [];

        foreach (range(0, 4) as $i) {
            $tahun = $records->first()[self::$tahunFields[$i]] ?? null;
            $labels[] = $tahun ?? 'Unknown';

            $total = $records->sum(self::$jumlahFields[$i]);
            $data[] = $total;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Pemotongan Ternak',
                    'data' => $data,
                    'borderColor' => 'rgba(54, 162, 235, 0.8)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.4)',
                    'tension' => 0.1,
                ],
            ],
        ];
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
