<?php

namespace App\Filament\EntriData\Pages\Report;

use App\Models\KategoriSp;
use Filament\Pages\Page;

class ListByKategoriReports extends Page
{
    public ?KategoriSp $kategori;
    protected static string $resource = ReportResource::class;

    protected static ?string $navigationIcon = null;

    protected static string $view = 'filament.entri-data.pages.report.list-by-kategori-reports';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    public function getBreadcrumb(): string
    {
        return 'Daftar per Kategori';
    }

    public function getTitle(): string
    {
        return 'Daftar per Kategori';
    }
    public static function getRoute(): string
    {
        return '/reports/sp/{bidang}/{url}';
    }

    public function mount(string $bidang, string $url): void
    {
        $kategori = KategoriSp::where('bidang', $bidang)->where('url', $url)->first();
        $this->kategori = $kategori;
    }
}
