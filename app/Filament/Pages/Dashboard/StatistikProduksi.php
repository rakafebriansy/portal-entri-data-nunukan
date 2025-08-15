<?php

namespace App\Filament\Pages\Dashboard;

use App\Filament\Widgets\Sp\JumlahAlsintanCard;
use App\Filament\Widgets\Sp\JumlahPengunaanBenihCard;
use App\Filament\Widgets\Sp\JumlahTanamanBstTertinggiChart;
use App\Filament\Widgets\Sp\JumlahTernakPotongChart;
use App\Filament\Widgets\Sp\KomoditasPalawijaTertinggiChart;
use App\Filament\Widgets\Sp\LuasPanenJagungChart;
use App\Filament\Widgets\Sp\LuasPenggunaanLahanCard;
use App\Filament\Widgets\Sp\LuasTanamanSbsTertinggiChart;
use App\Filament\Widgets\Sp\TrenPemotonganTernakChart;
use Filament\Pages\Page;

class StatistikProduksi extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Dashboard';
    protected static string $view = 'filament.pages.dashboard.statistik-produksi';
    public $year;
    public function mount(): void
    {
        $this->year = session('sp_selected_year', now()->year);

        if (!session()->has('sp_selected_year')) {
            session(['sp_selected_year' => $this->year]);
        }
    }
    public function getHeaderWidgets(): array
    {
        return [
            JumlahAlsintanCard::class,
            JumlahPengunaanBenihCard::class,
            LuasPenggunaanLahanCard::class,
            LuasPanenJagungChart::class,
            KomoditasPalawijaTertinggiChart::class,
            JumlahTanamanBstTertinggiChart::class,
            LuasTanamanSbsTertinggiChart::class,
            JumlahTernakPotongChart::class,
            TrenPemotonganTernakChart::class,
        ];
    }
    public function getHeaderWidgetsColumns(): int
    {
        return 6;
    }
    protected function getActions(): array
    {
        $currentYear = now()->year;
        $years = [];
        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }

        return [
            \Filament\Pages\Actions\Action::make('ubahTahun')
                ->label('Ubah Tahun')
                ->form([
                    \Filament\Forms\Components\Select::make('year')
                        ->label('Pilih Tahun')
                        ->options(array_combine($years, $years))
                        ->default($this->year)
                        ->required(),
                ])
                ->action(function (array $data) {
                    $this->year = (int) $data['year'];
                    session(['sp_selected_year' => $this->year]);
                    redirect('/dashboard/statistik-produksi');
                })
                ->button(),
        ];
    }

}
