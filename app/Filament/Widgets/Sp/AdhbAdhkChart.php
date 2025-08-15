<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\ChartWidget;

class AdhbAdhkChart extends ChartWidget
{
    protected static ?string $heading = 'Tren ADHB & ADHK Lapangan Usaha + Pengeluaran (Sepanjang Masa)';

    protected function getData(): array
    {
        $records = DetailDashboardPdrb::query()
            ->select('detail_dashboard_pdrbs.*', 'dashboard_pdrbs.tahun')
            ->join('dashboard_pdrbs', 'dashboard_pdrbs.id', '=', 'detail_dashboard_pdrbs.dashboard_pdrb_id')
            ->orderBy('dashboard_pdrbs.tahun')
            ->get();

        $labels = [];
        $seriesAdhbLu = [];
        $seriesAdhbPeng = [];
        $seriesAdhkLu = [];
        $seriesAdhkPeng = [];

        $adhbLuCols = ['adhb_lapangan_usaha_1', 'adhb_lapangan_usaha_2', 'adhb_lapangan_usaha_3'];
        $adhkLuCols = ['adhk_lapangan_usaha_1', 'adhk_lapangan_usaha_2', 'adhk_lapangan_usaha_3'];

        $adhbPengCols = ['adhb_komp_1', 'adhb_komp_2', 'adhb_komp_3'];
        $adhkPengCols = ['adhk_komp_1', 'adhk_komp_2', 'adhk_komp_3'];

        $sumCols = function ($row, array $cols): int {
            $total = 0;
            foreach ($cols as $col) {
                $total += (int) ($row[$col] ?? 0);
            }
            return $total;
        };

        foreach ($records as $row) {
            $labels[] = (string) $row->tahun;
            $seriesAdhbLu[] = $sumCols($row, $adhbLuCols);
            $seriesAdhbPeng[] = $sumCols($row, $adhbPengCols);
            $seriesAdhkLu[] = $sumCols($row, $adhkLuCols);
            $seriesAdhkPeng[] = $sumCols($row, $adhkPengCols);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'ADHB Lapangan Usaha',
                    'data' => $seriesAdhbLu,
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => false,
                    'tension' => 0.2,
                    'pointRadius' => 2,
                ],
                [
                    'label' => 'ADHB Pengeluaran',
                    'data' => $seriesAdhbPeng,
                    'borderColor' => 'rgba(245, 158, 11, 1)',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                    'fill' => false,
                    'tension' => 0.2,
                    'pointRadius' => 2,
                ],
                [
                    'label' => 'ADHK Lapangan Usaha',
                    'data' => $seriesAdhkLu,
                    'borderColor' => 'rgba(16, 185, 129, 1)',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.2)',
                    'fill' => false,
                    'tension' => 0.2,
                    'pointRadius' => 2,
                ],
                [
                    'label' => 'ADHK Pengeluaran',
                    'data' => $seriesAdhkPeng,
                    'borderColor' => 'rgba(139, 92, 246, 1)',
                    'backgroundColor' => 'rgba(139, 92, 246, 0.2)',
                    'fill' => false,
                    'tension' => 0.2,
                    'pointRadius' => 2,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => ['display' => true, 'position' => 'bottom'],
                'tooltip' => ['mode' => 'index', 'intersect' => false],
            ],
            'interaction' => ['mode' => 'index', 'intersect' => false],
            'scales' => [
                'y' => ['beginAtZero' => true],
            ],
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 12;
    }

    protected function getMaxHeight(): string
    {
        return '320px';
    }
}
