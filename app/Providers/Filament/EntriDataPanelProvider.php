<?php

namespace App\Providers\Filament;

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
    private function formatString($string)
    {
        $replaced = str_replace(' ', '', strtolower(trim($string)));

        return $replaced;
    }

    public function panel(Panel $panel): Panel
    {
        $kategoris = KategoriSp::orderBy('nama')->get();
        $navigations = $kategoris->map(
            fn($item) =>
            NavigationItem::make($item->nama)
                ->url("/entri-data/sp/{$item->bidang}/" . $this->formatString($item->nama))
                ->icon('heroicon-o-link')
                ->group(Str::title($item->bidang))
        )->toArray();

        return $panel
            ->id('entri-data')
            ->brandName('Entri Data Penta')
            ->path('entri-data')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->navigationItems($navigations)
            ->discoverResources(in: app_path('Filament/EntriData/Resources'), for: 'App\\Filament\\EntriData\\Resources')
            ->discoverPages(in: app_path('Filament/EntriData/Pages'), for: 'App\\Filament\\EntriData\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
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
