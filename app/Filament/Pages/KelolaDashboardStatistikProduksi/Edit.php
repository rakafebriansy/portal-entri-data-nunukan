<?php

namespace App\Filament\Pages\KelolaDashboardStatistikProduksi;

use App\Models\DetailDashboardSp;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Redirect;

class Edit extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi.edit';
    public $dashboardSp;
    public $formData = [];
    public $step = 1;
    protected static bool $shouldRegisterNavigation = false;

    public function mount($id)
    {
        $this->dashboardSp = DetailDashboardSp::where('dashboard_sp_id',$id)->firstOrFail();
        $this->formData = $this->dashboardSp->toArray();
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
            // Step 1
            'formData.jumlah_alsintan' => 'required|numeric',
            'formData.jumlah_penggunaan_benih' => 'required|numeric',
            'formData.total_luas_penggunaan_lahan_pertanian' => 'required|numeric',
            'formData.luas_panen_jagung_jan' => 'required|numeric',
            'formData.luas_panen_jagung_feb' => 'required|numeric',
            'formData.luas_panen_jagung_mar' => 'required|numeric',
            'formData.luas_panen_jagung_apr' => 'required|numeric',
            'formData.luas_panen_jagung_mei' => 'required|numeric',
            'formData.luas_panen_jagung_jun' => 'required|numeric',
            'formData.luas_panen_jagung_jul' => 'required|numeric',
            'formData.luas_panen_jagung_agu' => 'required|numeric',
            'formData.luas_panen_jagung_sep' => 'required|numeric',
            'formData.luas_panen_jagung_okt' => 'required|numeric',
            'formData.luas_panen_jagung_nov' => 'required|numeric',
            'formData.luas_panen_jagung_des' => 'required|numeric',
            // Step 2
            'formData.jenis_panen_palawija_tertinggi_1' => 'required|string',
            'formData.jenis_panen_palawija_tertinggi_2' => 'required|string',
            'formData.jenis_panen_palawija_tertinggi_3' => 'required|string',
            'formData.jenis_panen_palawija_tertinggi_4' => 'required|string',
            'formData.luas_panen_palawija_tertinggi_1' => 'required|numeric',
            'formData.luas_panen_palawija_tertinggi_2' => 'required|numeric',
            'formData.luas_panen_palawija_tertinggi_3' => 'required|numeric',
            'formData.luas_panen_palawija_tertinggi_4' => 'required|numeric',
            'formData.jenis_tanaman_bst_tertinggi_1' => 'required|string',
            'formData.jenis_tanaman_bst_tertinggi_2' => 'required|string',
            'formData.jenis_tanaman_bst_tertinggi_3' => 'required|string',
            'formData.jumlah_tanaman_bst_tertinggi_1' => 'required|numeric',
            'formData.jumlah_tanaman_bst_tertinggi_2' => 'required|numeric',
            'formData.jumlah_tanaman_bst_tertinggi_3' => 'required|numeric',
            'formData.jenis_tanaman_sbs_tertinggi_1' => 'required|string',
            'formData.jenis_tanaman_sbs_tertinggi_2' => 'required|string',
            'formData.jenis_tanaman_sbs_tertinggi_3' => 'required|string',
            'formData.luas_tanaman_sbs_tertinggi_1' => 'required|numeric',
            'formData.luas_tanaman_sbs_tertinggi_2' => 'required|numeric',
            'formData.luas_tanaman_sbs_tertinggi_3' => 'required|numeric',
            // Step 3
            'formData.jenis_ternak_potong_1' => 'required|string',
            'formData.jenis_ternak_potong_2' => 'required|string',
            'formData.jenis_ternak_potong_3' => 'required|string',
            'formData.jenis_ternak_potong_4' => 'required|string',
            'formData.jumlah_ternak_potong_1' => 'required|numeric',
            'formData.jumlah_ternak_potong_2' => 'required|numeric',
            'formData.jumlah_ternak_potong_3' => 'required|numeric',
            'formData.jumlah_ternak_potong_4' => 'required|numeric',
            'formData.tahun_tren_pemotongan_ternak_1' => 'required|numeric',
            'formData.tahun_tren_pemotongan_ternak_2' => 'required|numeric',
            'formData.tahun_tren_pemotongan_ternak_3' => 'required|numeric',
            'formData.tahun_tren_pemotongan_ternak_4' => 'required|numeric',
            'formData.tahun_tren_pemotongan_ternak_5' => 'required|numeric',
            'formData.jumlah_tren_pemotongan_ternak_1' => 'required|numeric',
            'formData.jumlah_tren_pemotongan_ternak_2' => 'required|numeric',
            'formData.jumlah_tren_pemotongan_ternak_3' => 'required|numeric',
            'formData.jumlah_tren_pemotongan_ternak_4' => 'required|numeric',
            'formData.jumlah_tren_pemotongan_ternak_5' => 'required|numeric',
        ]);

        $this->dashboardSp->update($validated['formData']);

        session()->flash('success', 'Data berhasil diperbarui!');
        return Redirect::to('/dashboard/kelola-dashboard-statistik-produksi');
    }
}
