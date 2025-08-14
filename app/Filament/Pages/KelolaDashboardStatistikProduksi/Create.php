<?php

namespace App\Filament\Pages\KelolaDashboardStatistikProduksi;

use App\Models\DashboardSp;
use App\Models\DetailDashboardSp;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

class Create extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi.create';

    protected static bool $shouldRegisterNavigation = false;

    public int $step = 1;

    public int $id;
    public $dashboardSp;

    public array $formData = [
        'jumlah_alsintan' => null,
        'jumlah_penggunaan_benih' => null,
        'total_luas_penggunaan_lahan_pertanian' => null,
        'luas_panen_jagung_jan' => null,
        'luas_panen_jagung_feb' => null,
        'luas_panen_jagung_mar' => null,
        'luas_panen_jagung_apr' => null,
        'luas_panen_jagung_mei' => null,
        'luas_panen_jagung_jun' => null,
        'luas_panen_jagung_jul' => null,
        'luas_panen_jagung_agu' => null,
        'luas_panen_jagung_sep' => null,
        'luas_panen_jagung_okt' => null,
        'luas_panen_jagung_nov' => null,
        'luas_panen_jagung_des' => null,
        'jenis_panen_palawija_tertinggi_1' => null,
        'luas_panen_palawija_tertinggi_1' => null,
        'jenis_panen_palawija_tertinggi_2' => null,
        'luas_panen_palawija_tertinggi_2' => null,
        'jenis_panen_palawija_tertinggi_3' => null,
        'luas_panen_palawija_tertinggi_3' => null,
        'jenis_panen_palawija_tertinggi_4' => null,
        'luas_panen_palawija_tertinggi_4' => null,
        'jenis_tanaman_bst_tertinggi_1' => null,
        'jumlah_tanaman_bst_tertinggi_1' => null,
        'jenis_tanaman_bst_tertinggi_2' => null,
        'jumlah_tanaman_bst_tertinggi_2' => null,
        'jenis_tanaman_bst_tertinggi_3' => null,
        'jumlah_tanaman_bst_tertinggi_3' => null,
        'jenis_tanaman_sbs_tertinggi_1' => null,
        'luas_tanaman_sbs_tertinggi_1' => null,
        'jenis_tanaman_sbs_tertinggi_2' => null,
        'luas_tanaman_sbs_tertinggi_2' => null,
        'jenis_tanaman_sbs_tertinggi_3' => null,
        'luas_tanaman_sbs_tertinggi_3' => null,
        'jenis_ternak_potong_1' => null,
        'jumlah_ternak_potong_1' => null,
        'jenis_ternak_potong_2' => null,
        'jumlah_ternak_potong_2' => null,
        'jenis_ternak_potong_3' => null,
        'jumlah_ternak_potong_3' => null,
        'jenis_ternak_potong_4' => null,
        'jumlah_ternak_potong_4' => null,
        'tahun_tren_pemotongan_ternak_1' => null,
        'jumlah_tren_pemotongan_ternak_1' => null,
        'tahun_tren_pemotongan_ternak_2' => null,
        'jumlah_tren_pemotongan_ternak_2' => null,
        'tahun_tren_pemotongan_ternak_3' => null,
        'jumlah_tren_pemotongan_ternak_3' => null,
        'tahun_tren_pemotongan_ternak_4' => null,
        'jumlah_tren_pemotongan_ternak_4' => null,
        'tahun_tren_pemotongan_ternak_5' => null,
        'jumlah_tren_pemotongan_ternak_5' => null,
    ];

    public function mount(int $id)
    {
        $this->id = $id;
        $this->dashboardSp = DashboardSp::findOrFail($id);
        $this->formData['dashboard_sp_id'] = $id;
    }

    // public static function getRouteName(?string $panel = null): string
    // {
    //     return 'filament.dashboard.sp.create';
    // }

    public static function getRoutes(): void
    {
        Route::get(
            '/kelola-dashboard-statistik-produksi/{id}/create',
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
        $this->formData['dashboard_sp_id'] = $this->dashboardSp->id;
        DetailDashboardSp::create($this->formData);

        session()->flash('success', 'Form berhasil dikirim!');
        $this->reset('formData', 'step');
        $this->step = 1;
        return redirect()->to('/dashboard/kelola-dashboard-statistik-produksi');
    }
}
