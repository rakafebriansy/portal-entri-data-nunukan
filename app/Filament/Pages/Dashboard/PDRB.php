<?php

namespace App\Filament\Pages\Dashboard;

use App\Filament\Widgets\Sp\AdhbAdhkChart;
use App\Filament\Widgets\Sp\PdrbAtasDasarHargaBerlakuCard;
use App\Filament\Widgets\Sp\PdrbAtasDasarHargaKonstanCard;
use App\Filament\Widgets\Sp\PdrbLapanganUsahaTable;
use App\Filament\Widgets\Sp\PdrbPengeluaranTable;
use App\Filament\Widgets\Sp\PdrbPerKapitaCard;
use App\Filament\Widgets\Sp\PertumbuhanYoyCard;
use App\Filament\Widgets\Sp\SektorLapanganUsahaChart;
use App\Filament\Widgets\Sp\SektorPengeluaranChart;
use Filament\Pages\Page;

class PDRB extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'PDRB';
    protected static ?string $navigationGroup = 'Dashboard';
    protected static string $view = 'filament.pages.dashboard.p-d-r-b';
    public function mount(): void
    {
        $this->year = session('pdrb_selected_year', now()->year);

        if (!session()->has('pdrb_selected_year')) {
            session(['pdrb_selected_year' => $this->year]);
        }
    }
    public function getHeaderWidgets(): array
    {
        return [
            PdrbAtasDasarHargaBerlakuCard::class,
            PdrbAtasDasarHargaKonstanCard::class,
            PertumbuhanYoyCard::class,
            PdrbPerKapitaCard::class,
            SektorLapanganUsahaChart::class,
            SektorPengeluaranChart::class,
            PdrbLapanganUsahaTable::class,
            PdrbPengeluaranTable::class,
            AdhbAdhkChart::class
        ];
    }
    public function getHeaderWidgetsColumns(): int
    {
        return 12;
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
                    redirect('/dashboard/pdrb');
                })
                ->button(),
        ];
    }
}
