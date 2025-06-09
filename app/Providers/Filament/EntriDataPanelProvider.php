<?php

namespace App\Providers\Filament;

use App\Models\KategoriPdrb;
use App\Models\KategoriSp;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
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
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class EntriDataPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // $categories = collect([
        //     [
        //         'model' => KategoriSp::orderBy('nama')->get(),
        //         'urlPrefix' => '/entri-data/reports/sp',
        //     ],
        //     [
        //         'model' => KategoriPdrb::orderBy('nama')->get(),
        //         'urlPrefix' => '/entri-data/reports/pdrb',
        //     ],
        // ]);

        // $navigationItems = $categories->flatMap(function ($categoryGroup) {
        //     return $categoryGroup['model']->map(function ($item) use ($categoryGroup) {
        //         return NavigationItem::make($item->nama)
        //             ->url("{$categoryGroup['urlPrefix']}/" . ($item->bidang ? "{$item->bidang}/" : '') . "{$item->url}")
        //             ->icon('heroicon-o-link')
        //             ->group(Str::title($item->bidang ?? 'PDRB'));
        //     });
        // ->toArray();

        $kategoris = KategoriSp::orderBy('nama')->get();
        $navigationItems = $kategoris->map(
            fn($item) =>
            NavigationItem::make($item->nama)
                ->url("/entri-data/reports/sp/{$item->bidang}/{$item->url}")
                ->icon('heroicon-o-link')
                ->group(Str::title($item->bidang))
        )->toArray();

        return $panel
            ->id('entri-data')
            ->brandName('Entri Data Penta')
            ->path('entri-data')
            ->colors([
                'primary' => '#3B7BDB',
            ])
            ->navigationItems($navigationItems)
            ->discoverResources(in: app_path('Filament/EntriData/Resources'), for: 'App\\Filament\\EntriData\\Resources')
            ->discoverPages(in: app_path('Filament/EntriData/Pages'), for: 'App\\Filament\\EntriData\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->routes(function () {
                \Route::get('/reports/sp/{bidang}/{url}', \App\Filament\EntriData\Pages\Report\SP\ListByKategoriReports::class)
                    ->name('entri-data.reports.sp.list-by-kategori');
                \Route::get('/reports/pdrb/{url}', \App\Filament\EntriData\Pages\Report\PDRB\ListByKategoriReports::class)
                    ->name('entri-data.reports.pdrb.list-by-kategori');
            })
            ->discoverWidgets(in: app_path('Filament/EntriData/Widgets'), for: 'App\\Filament\\EntriData\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
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
            ]);
    }
}
