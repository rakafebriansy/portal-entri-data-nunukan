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
        $tahunAwal = $this->year - 4;
        $tahunAkhir = $this->year;

        $records = DetailDashboardSp::with('dashboardSp')
            ->whereHas('dashboardSp', fn($q) => $q->whereBetween('tahun', [$tahunAwal, $tahunAkhir]))
            ->get();

        $labels = [];
        $data = [];

        foreach (range($tahunAwal, $tahunAkhir) as $tahun) {
            $labels[] = $tahun;

            $total = $records
                ->filter(fn($r) => $r->dashboardSp->tahun == $tahun)
                ->sum(
                    fn($r) =>
                    $r->jumlah_tren_pemotongan_ternak_1 +
                    $r->jumlah_tren_pemotongan_ternak_2 +
                    $r->jumlah_tren_pemotongan_ternak_3 +
                    $r->jumlah_tren_pemotongan_ternak_4 +
                    $r->jumlah_tren_pemotongan_ternak_5
                );

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
