<?php

namespace App\Filament\EntriData\Pages\Report\PDRB;

use App\Models\KategoriPdrb;
use App\Models\ReportPdrb;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class ListByKategoriReports extends Page implements HasTable
{
    use InteractsWithTable;
    public ?KategoriPdrb $kategori;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.entri-data.pages.report.p-d-r-b.list-by-kategori-reports';

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
        return '/reports/pdrb/{url}';
    }

    public function mount(string $url): void
    {
        $kategori = KategoriPdrb::where('url', $url)->first();
        $this->kategori = $kategori;
    }

    protected function getTableQuery()
    {
        return ReportPdrb::where('kategori_pdrb_id', $this->kategori->id)->orderBy('nama');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('kategorPdrb.nama')->label('Nama Kategori'),
            Tables\Columns\TextColumn::make('user.name')->label('Nama Pengguna'),
            Tables\Columns\TextColumn::make('tahun')->label('Tahun'),
            Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
            Tables\Columns\TextColumn::make('url_file')->label('Link File'),
        ];
    }
}
