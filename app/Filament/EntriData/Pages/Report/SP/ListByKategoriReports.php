<?php

namespace App\Filament\EntriData\Pages\Report\SP;

use App\Models\KategoriSp;
use App\Models\ReportSp;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class ListByKategoriReports extends Page implements HasTable
{
    use InteractsWithTable;
    public ?KategoriSp $kategori;

    protected static ?string $navigationIcon = null;

    protected static string $view = 'filament.entri-data.pages.report.s-p.list-by-kategori-reports';

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

    protected function getTableQuery()
    {
        return ReportSp::where('kategori_sp_id', $this->kategori->id);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('kategoriSp.nama')->label('Nama Kategori'),
            Tables\Columns\TextColumn::make('user.name')->label('Nama Pengguna'),
            Tables\Columns\TextColumn::make('tahun')->label('Tahun'),
            Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
            Tables\Columns\TextColumn::make('url_file')->label('Link File'),
        ];
    }
}