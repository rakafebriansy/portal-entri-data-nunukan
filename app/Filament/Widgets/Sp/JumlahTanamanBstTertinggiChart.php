<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class JumlahTanamanBstTertinggiChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah 3 Tanaman Menghasilkan BST Tertinggi';

    public static $bstLabels = ['pisang' => 'Pisang', 'nanas' => 'Nanas', 'durian' => 'Durian'];
    public static $fields = [
        'jenis_tanaman_bst_tertinggi_1',
        'jenis_tanaman_bst_tertinggi_2',
        'jenis_tanaman_bst_tertinggi_3',
    ];
    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? 1992;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Jumlah 3 Tanaman Menghasilkan BST Tertinggi ' . $this->year;
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
            return self::$bstLabels[$detailDashboardSp[$field]] ?? 'Unknown';
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Tanaman',
                    'data' => $data,
                    'backgroundColor' => 'rgb(51, 112, 235)',
                    'borderWidth' => 0,
                    'indexAxis' => 'y',
                ],
            ],
            'labels' => $labels,
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
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
