<?php

namespace App\Filament\Pages\KelolaDashboardStatistikProduksi;

use App\Models\DashboardSp;
use App\Models\DetailDashboardSp;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

class Detail extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi.detail';

    public int $id;
    public $dashboardSp;
    public array $formData = [];
    public int $step = 1;

    public static function getRoutes(): void
    {
        Route::get(
            '/kelola-dashboard-statistik-produksi/{id}',
            static::class
        )->name(static::getRouteName());
    }
    public function mount(int $id)
    {
        $this->id = $id;
        $this->dashboardSp = DetailDashboardSp::where('dashboard_sp_id',$id)->firstOrFail();

        $detail = DetailDashboardSp::where('dashboard_sp_id', $id)->firstOrFail();
        $this->formData = $detail->toArray();
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
}
