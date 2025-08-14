<?php

namespace App\Filament\Pages\KelolaDashboardPdrb;

use App\Models\DetailDashboardPdrb;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

class Detail extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-pdrb.detail';

    protected static bool $shouldRegisterNavigation = false;

    public int $id;
    public $dashboardSp;
    public array $formData = [];
    public int $step = 1;

    public static function getRoutes(): void
    {
        Route::get(
            '/kelola-dashboard-pdrb/{id}',
            static::class
        )->name(static::getRouteName());
    }
    public function mount(int $id)
    {
        $this->id = $id;
        $this->dashboardSp = DetailDashboardPdrb::where('dashboard_pdrb_id', $id)->firstOrFail();

        $detail = DetailDashboardPdrb::where('dashboard_pdrb_id', $id)->firstOrFail();
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
