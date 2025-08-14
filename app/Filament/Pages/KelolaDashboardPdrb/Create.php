<?php

namespace App\Filament\Pages\KelolaDashboardPdrb;

use App\Models\DashboardPdrb;
use App\Models\DetailDashboardPdrb;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

class Create extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-pdrb.create';

    protected static bool $shouldRegisterNavigation = false;

    public int $step = 1;

    public int $id;
    public $dashboardPdrb;

    public array $formData = [
        'dashboard_pdrb_id' => null,
        'pdrb_atas_dasar_harga_berlaku' => null,
        'pdrb_atas_dasar_harga_konstan' => null,
        'pertumbuhan_y_on_y' => null,
        'pdrb_per_kapita' => null,
        'nilai_adhb' => null,
        'sektor_lapangan_usaha_1_1' => null,
        'sektor_lapangan_usaha_1_2' => null,
        'sektor_lapangan_usaha_1_3' => null,
        'sektor_lapangan_usaha_2_1' => null,
        'sektor_lapangan_usaha_2_2' => null,
        'sektor_lapangan_usaha_2_3' => null,
        'sektor_lapangan_usaha_3_1' => null,
        'sektor_lapangan_usaha_3_2' => null,
        'sektor_lapangan_usaha_3_3' => null,
        'adhb_lapangan_usaha_1' => null,
        'adhk_lapangan_usaha_1' => null,
        'adhb_lapangan_usaha_2' => null,
        'adhk_lapangan_usaha_2' => null,
        'adhb_lapangan_usaha_3' => null,
        'adhk_lapangan_usaha_3' => null,
        'sektor_pengeluaran_1_1' => null,
        'sektor_pengeluaran_1_2' => null,
        'sektor_pengeluaran_1_3' => null,
        'sektor_pengeluaran_2_1' => null,
        'sektor_pengeluaran_2_2' => null,
        'sektor_pengeluaran_2_3' => null,
        'sektor_pengeluaran_3_1' => null,
        'sektor_pengeluaran_3_2' => null,
        'sektor_pengeluaran_3_3' => null,
        'sektor_pengeluaran_4_1' => null,
        'sektor_pengeluaran_4_2' => null,
        'sektor_pengeluaran_4_3' => null,
        'sektor_pengeluaran_4_4' => null,
        'adhb_komp_1' => null,
        'adhk_komp_1' => null,
        'adhb_komp_2' => null,
        'adhk_komp_2' => null,
        'adhb_komp_3' => null,
        'adhk_komp_3' => null,
    ];

    public function mount(int $id)
    {
        $this->id = $id;
        $this->dashboardPdrb = DashboardPdrb::findOrFail($id);
        $this->formData['dashboard_pdrb_id'] = $id;
    }

    public static function getRoutes(): void
    {
        Route::get(
            '/kelola-dashboard-pdrb/{id}/create',
            static::class
        )->name(static::getRouteName());
    }


    public function nextStep()
    {
        if ($this->step < 3) {
            $this->step++;
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function resetForm()
    {
        $this->reset('formData', 'step');
        $this->step = 1;
        session()->forget('success');
    }


    public function submit()
    {
        $validated = $this->validate([
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

        DetailDashboardPdrb::create(array_merge($validated['formData'], ['dashboard_sp_id' => $this->dashboardPdrb->id]));

        session()->flash('success', 'Form berhasil dikirim!');
        $this->reset('formData', 'step');
        $this->step = 1;
        return redirect()->to('/dashboard/kelola-dashboard-pdrb');
    }
}
