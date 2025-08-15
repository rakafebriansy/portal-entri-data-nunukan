<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\Widget;

class PdrbPengeluaranTable extends Widget
{
    protected static string $view = 'filament.widgets.sp.pdrb-pengeluaran-table';
    public $rows = [];

    public $year;
    public function mount()
    {
        $year = session('pdrb_selected_year') ?? now()->year;
        $this->year = $year;
        $record = DetailDashboardPdrb::whereHas('dashboardPdrb', function ($query) {
            $query->where('tahun', $this->year);
        })->first();

        if ($record) {
            $this->rows = [
                [
                    'komp' => 'Komp 1',
                    'adhb' => $record->adhb_komp_1,
                    'adhk' => $record->adhk_komp_1,
                ],
                [
                    'komp' => 'Komp 2',
                    'adhb' => $record->adhb_komp_2,
                    'adhk' => $record->adhk_komp_2,
                ],
                [
                    'komp' => 'Komp 3',
                    'adhb' => $record->adhb_komp_3,
                    'adhk' => $record->adhk_komp_3,
                ],
            ];
        }
    }
    public function getColumnSpan(): int
    {
        return 6;
    }
}
