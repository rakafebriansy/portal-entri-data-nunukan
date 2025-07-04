<?php

namespace App\Providers\Filament;

use App\Models\KategoriPdrb;
use App\Models\KategoriSp;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
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
use Illuminate\View\Middleware\ShareErrorsFromSession;

class EntriDataPanelProvider extends PanelProvider
{
    private function normalizeKategoriSp(string $string): string
    {
        return strtolower(
            str_replace(
                [' - ', ' '],
                ['-', '_'],
                $string
            )
        );
    }
    public function panel(Panel $panel): Panel
    {
        $kategoris = KategoriSp::orderBy('nama')->get();
        $spNavs = $kategoris->map(
            fn($item) =>
            NavigationItem::make($item->nama)
                ->url("/entri-data/reports/sp/{$item->bidang}/{$this->normalizeKategoriSp($item->nama)}")
                ->icon('heroicon-o-squares-2x2')
                ->group('Statistik Produksi - ' . ucwords($item->bidang))
                ->visible(fn(): bool => auth()->user()?->role == 'pegawai')
                ->hidden(fn(): bool => !auth()->user()?->role == 'admin')
        )->toArray();

        return $panel
            ->id('entri-data')
            ->brandLogo(asset('images/colored_logo_penta.png'))
            ->brandLogoHeight('40px')
            ->path('entri-data')
            ->colors([
                'primary' => '#3B7BDB',
            ])
            ->navigationItems($spNavs)
            ->databaseNotifications()
                        ->userMenuItems([
                MenuItem::make()->label('Butuh Bantuan?')
                    ->url("#")
                    ->icon('heroicon-o-cog-6-tooth'),
                MenuItem::make()->label('Tentang Kami')
                    ->url("#")
                    ->icon('heroicon-o-information-circle'),
            ])
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
            ])
            ->viteTheme('resources/css/filament/entri-data/theme.css');
    }
}
