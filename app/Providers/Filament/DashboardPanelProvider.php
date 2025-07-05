<?php

namespace App\Providers\Filament;

use App\Filament\Resources\ReportResource\Widgets\ConsumptionPredictChart;
use App\Filament\Resources\ReportResource\Widgets\ConsumptionTable;
use App\Filament\Resources\ReportResource\Widgets\FoodPlantsChart;
use App\Filament\Resources\ReportResource\Widgets\HorticulturePlantsChart;
use App\Filament\Resources\ReportResource\Widgets\OverviewStats;
use App\Filament\Resources\ReportResource\Widgets\PlantsChart;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('dashboard')
            ->brandLogo(asset('images/colored_logo_penta.png'))
            ->brandLogoHeight('40px')
            ->path('dashboard')
            ->databaseNotifications()
            ->colors([
                'primary' => 'rgb(59, 123, 219)',
            ])
            // ->userMenuItems([
            //     MenuItem::make()->label('Butuh Bantuan?')
            //         ->url("#")
            //         ->icon('heroicon-o-cog-6-tooth'),
            //     MenuItem::make()->label('Tentang Kami')
            //         ->url("#")
            //         ->icon('heroicon-o-information-circle'),
            // ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                    // Widgets\AccountWidget::class,
                OverviewStats::class,
                FoodPlantsChart::class,
                ConsumptionPredictChart::class,
                HorticulturePlantsChart::class,
                ConsumptionTable::class
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/entri-data/theme.css');
    }
}
