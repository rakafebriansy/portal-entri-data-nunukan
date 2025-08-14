<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class LuasTanamanSbsTertinggiChart extends ChartWidget
{

    protected static ?string $heading = 'Luas Panen 3 Tanaman SBS Tertinggi (ha)';

    protected static array $sbsLabels = [
        'bayam' => 'Bayam',
        'kangkung' => 'Kangkung',
        'sawi' => 'Sawi',
    ];

    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? 1992;
        $this->year = $year;
    }

    public function getHeading(): ?string
    {
        return 'Luas Panen 3 Tanaman SBS Tertinggi (ha) ' . $this->year;
    }

    protected function getData(): array
    {
        $fields = [
            'jenis_tanaman_sbs_tertinggi_1' => 'luas_tanaman_sbs_tertinggi_1',
            'jenis_tanaman_sbs_tertinggi_2' => 'luas_tanaman_sbs_tertinggi_2',
            'jenis_tanaman_sbs_tertinggi_3' => 'luas_tanaman_sbs_tertinggi_3',
        ];

        $data = [];
        $labels = [];

        foreach ($fields as $jenisField => $luasField) {
            $records = DetailDashboardSp::whereHas('dashboardSp', function ($query) {
                $query->where('tahun', $this->year);
            })->get();

            $totalLuas = $records->sum($luasField);

            $jenisValue = $records->first()[$jenisField] ?? null;
            $label = self::$sbsLabels[$jenisValue] ?? 'Unknown';

            $data[] = $totalLuas;
            $labels[] = $label;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        'rgb(51, 112, 235)',
                        'rgb(37, 178, 229)',
                        'rgb(27, 206, 191)',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getMaxHeight(): string
    {
        return '200px';
    }
    public function getColumnSpan(): int
    {
        return 3;
    }
}
