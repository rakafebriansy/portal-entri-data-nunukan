<?php

namespace App\Filament\Widgets\Sp;

use App\Models\DetailDashboardPdrb;
use Filament\Widgets\Widget;

class PdrbLapanganUsahaTable extends Widget
{
    protected static string $view = 'filament.widgets.sp.pdrb-lapangan-usaha-table';
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
                    'lapangan_usaha' => 'Lapangan Usaha 1',
                    'adhb' => $record->adhb_lapangan_usaha_1,
                    'adhk' => $record->adhk_lapangan_usaha_1,
                ],
                [
                    'lapangan_usaha' => 'Lapangan Usaha 2',
                    'adhb' => $record->adhb_lapangan_usaha_2,
                    'adhk' => $record->adhk_lapangan_usaha_2,
                ],
                [
                    'lapangan_usaha' => 'Lapangan Usaha 3',
                    'adhb' => $record->adhb_lapangan_usaha_3,
                    'adhk' => $record->adhk_lapangan_usaha_3,
                ],
            ];
        }
    }
    public function getColumnSpan(): int
    {
        return 6;
    }
}
