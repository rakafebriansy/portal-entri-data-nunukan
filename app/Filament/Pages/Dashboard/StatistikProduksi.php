<?php

namespace App\Filament\Pages\Dashboard;

use App\Filament\Widgets\Sp\JumlahAlsintanCard;
use App\Filament\Widgets\Sp\JumlahPengunaanBenihCard;
use App\Filament\Widgets\Sp\KomoditasPalawijaTertinggiChart;
use App\Filament\Widgets\Sp\LuasPanenJagungChart;
use App\Filament\Widgets\Sp\LuasPenggunaanLahanCard;
use App\Models\DetailDashboardSp;
use Filament\Pages\Page;

class StatistikProduksi extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Dashboard';
    protected static string $view = 'filament.pages.dashboard.statistik-produksi';

    public function getHeaderWidgets(): array 
    {
        return [
            JumlahAlsintanCard::class,
            JumlahPengunaanBenihCard::class,
            LuasPenggunaanLahanCard::class,
            LuasPanenJagungChart::class,
            KomoditasPalawijaTertinggiChart::class
        ];
    }
    public function getHeaderWidgetsColumns(): int 
    {
        return 6;
    }
}
