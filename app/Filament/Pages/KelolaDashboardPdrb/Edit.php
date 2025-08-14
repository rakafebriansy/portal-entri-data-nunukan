<?php

namespace App\Filament\Pages\KelolaDashboardPdrb;

use App\Models\DetailDashboardPdrb;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Redirect;

class Edit extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-pdrb.edit';

    public $dashboardPdrb;
    public $formData = [];
    public $step = 1;
    protected static bool $shouldRegisterNavigation = false;

    public function mount($id)
    {
        $this->dashboardPdrb = DetailDashboardPdrb::where('dashboard_pdrb_id', $id)->firstOrFail();
        $this->formData = $this->dashboardPdrb->toArray();
    }

    public function nextStep()
    {
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $validated = $this->validate([
            'dashboard_pdrb_id' => 'required|numeric',
            'pdrb_atas_dasar_harga_berlaku' => 'required|numeric',
            'pdrb_atas_dasar_harga_konstan' => 'required|numeric',
            'pertumbuhan_y_on_y' => 'required|numeric',
            'pdrb_per_kapita' => 'required|numeric',
            'nilai_adhb' => 'required|numeric',
            'nilai_adhk' => 'required|numeric',
            'sektor_lapangan_usaha_1_1' => 'required|numeric',
            'sektor_lapangan_usaha_1_2' => 'required|numeric',
            'sektor_lapangan_usaha_1_3' => 'required|numeric',
            'sektor_lapangan_usaha_2_1' => 'required|numeric',
            'sektor_lapangan_usaha_2_2' => 'required|numeric',
            'sektor_lapangan_usaha_2_3' => 'required|numeric',
            'sektor_lapangan_usaha_3_1' => 'required|numeric',
            'sektor_lapangan_usaha_3_2' => 'required|numeric',
            'sektor_lapangan_usaha_3_3' => 'required|numeric',
            'adhb_lapangan_usaha_1' => 'required|numeric',
            'adhk_lapangan_usaha_1' => 'required|numeric',
            'adhb_lapangan_usaha_2' => 'required|numeric',
            'adhk_lapangan_usaha_2' => 'required|numeric',
            'adhb_lapangan_usaha_3' => 'required|numeric',
            'adhk_lapangan_usaha_3' => 'required|numeric',
            'sektor_pengeluaran_1_1' => 'required|numeric',
            'sektor_pengeluaran_1_2' => 'required|numeric',
            'sektor_pengeluaran_1_3' => 'required|numeric',
            'sektor_pengeluaran_2_1' => 'required|numeric',
            'sektor_pengeluaran_2_2' => 'required|numeric',
            'sektor_pengeluaran_2_3' => 'required|numeric',
            'sektor_pengeluaran_3_1' => 'required|numeric',
            'sektor_pengeluaran_3_2' => 'required|numeric',
            'sektor_pengeluaran_3_3' => 'required|numeric',
            'sektor_pengeluaran_4_1' => 'required|numeric',
            'sektor_pengeluaran_4_2' => 'required|numeric',
            'sektor_pengeluaran_4_3' => 'required|numeric',
            'adhb_komp_1' => 'required|numeric',
            'adhk_komp_1' => 'required|numeric',
            'adhb_komp_2' => 'required|numeric',
            'adhk_komp_2' => 'required|numeric',
            'adhb_komp_3' => 'required|numeric',
            'adhk_komp_3' => 'required|numeric',
        ]);

        $this->dashboardPdrb->update($validated['formData']);

        session()->flash('success', 'Data berhasil diperbarui!');
        return Redirect::to('/dashboard/kelola-dashboard-statistik-produksi');
    }
}
