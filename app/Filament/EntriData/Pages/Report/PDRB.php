<?php

namespace App\Filament\EntriData\Pages\Report;

use App\Models\KategoriPdrb;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

class PDRB extends Page
{
    public Collection $kategoris;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
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
}
