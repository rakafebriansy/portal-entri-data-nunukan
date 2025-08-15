<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardSp;
use Filament\Widgets\ChartWidget;

class JumlahTernakPotongChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Ternak Potong menurut Jenisnya';
    protected static array $ternakLabels = [
        'kambing' => 'Kambing',
        'babi' => 'Babi',
        'sapi' => 'Sapi',
        'kerbau' => 'Kerbau',
    ];

    public $year;
    public function mount(): void
    {
        $year = session('sp_selected_year') ?? now()->year;
        $this->year = $year;
    }
    public function getHeading(): ?string
    {
        return 'Jumlah Ternak Potong menurut Jenisnya Tahun ' . $this->year;
    }

    protected function getType(): string
    {
        return 'bar';
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

    protected function getData(): array
    {
        $fields = [
            'jenis_ternak_potong_1' => 'jumlah_ternak_potong_1',
            'jenis_ternak_potong_2' => 'jumlah_ternak_potong_2',
            'jenis_ternak_potong_3' => 'jumlah_ternak_potong_3',
            'jenis_ternak_potong_4' => 'jumlah_ternak_potong_4',
        ];

        $records = DetailDashboardSp::whereHas('dashboardSp', function ($query) {
            $query->where('tahun', $this->year);
        })->get();

        $labels = [];
        $data = [];

        foreach ($fields as $jenisField => $jumlahField) {
            $jenisValue = $records->first()[$jenisField] ?? null;
            $labels[] = self::$ternakLabels[$jenisValue] ?? 'Unknown';
            $data[] = $records->sum($jumlahField);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Ternak',
                    'data' => $data,
                    'backgroundColor' => 'rgb(51, 112, 235)',
                    'borderWidth' => 0,
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
