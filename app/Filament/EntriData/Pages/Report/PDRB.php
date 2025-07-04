<?php

namespace App\Filament\EntriData\Pages\Report;

use App\Models\KategoriPdrb;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithPagination;
use Livewire\Attributes\Reactive;

class PDRB extends Page
{
    use WithPagination;
    public Collection $kategoris;


    public string $search = '';
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'PDRB';

    protected static string $view = 'filament.entri-data.pages.report.p-d-r-b';
    public function getBreadcrumb(): string
    {
        return 'PDRB';
    }

    public function getTitle(): string
    {
        return 'Entri Data PDRB';
    }
    public static function getRoute(): string
    {
        return '/reports/pdrb';
    }

    public function mount(): void
    {
        $kategoris = KategoriPdrb::all();
        $this->kategoris = $kategoris;
    }
    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()?->role === 'pegawai';
    }
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
    public function getFilteredKategorisProperty()
    {
        return KategoriPdrb::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('nama', 'like', '%' . $this->search . '%')
                    // ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
            )
            ->get();
    }
}
