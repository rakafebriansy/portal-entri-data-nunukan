<?php

namespace App\Filament\Pages;

use App\Models\DashboardSp;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class KelolaDashboardStatistikProduksi extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi';
    protected static ?string $navigationLabel = 'Statistik Produksi';
    public $dashboardSps;
    public function mount()
    {
        $this->dashboardSps = DashboardSp::all();
    }
    public function delete($id)
    {
        DashboardSp::findOrFail($id)->delete();
        $this->dashboardSps = DashboardSp::all();
        session()->flash('success', 'Data berhasil dihapus!');
    }
}
