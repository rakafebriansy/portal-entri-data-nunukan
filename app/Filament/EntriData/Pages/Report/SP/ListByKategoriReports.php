<?php

namespace App\Filament\EntriData\Pages\Report\SP;

use App\Models\KategoriSp;
use App\Models\ReportSp;
use Filament\Pages\Page;

class ListByKategoriReports extends Page
{
    public ?KategoriSp $kategori;

    protected static ?string $navigationIcon = null;

    protected static string $view = 'filament.entri-data.pages.report.s-p.list-by-kategori-reports';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return strtolower($this->kategori->nama) == $this->kategori->bidang ? 'Entri Data ' . ucwords($this->kategori->bidang) : 'Entri Data ' . ucwords($this->kategori->bidang) . ' - ' . $this->kategori->nama;
    }
    public static function getRoute(): string
    {
        return '/reports/sp/{bidang}/{url}';
    }

    public function mount(string $bidang, string $url): void
    {

        $kategori = KategoriSp::where('bidang', $bidang)->where('nama', $this->denormalizeKategoriSp($url))->first();
        $this->kategori = $kategori;
    }

    // protected function getTableQuery()
    // {
    //     return ReportSp::where('kategori_sp_id', $this->kategori->id);
    // }

    // protected function getTableColumns(): array
    // {
    //     return [
    //         Tables\Columns\TextColumn::make('kategoriSp.nama')->label('Nama Kategori'),
    //         Tables\Columns\TextColumn::make('user.name')->label('Nama Pengguna'),
    //         Tables\Columns\TextColumn::make('tahun')->label('Tahun'),
    //         Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
    //         Tables\Columns\TextColumn::make('url_file')->label('Link File'),
    //     ];
    // }

    public function getViewData(): array
    {

        return [
            'reportSps' => ReportSp::where('kategori_sp_id', $this->kategori->id)->get()
        ];
    }
    private function denormalizeKategoriSp(string $string): string
    {
        $string = str_replace('_', ' ', $string);
        $pos = strpos($string, '-');
        if ($pos !== false) {
            $string = substr_replace($string, ' - ', $pos, 1);
        }
        return ucwords($string);
    }
    public function toggleStatus($id)
    {
        $report = ReportSp::findOrFail($id);

        $report->status = $report->status === 'selesai' ? 'belum selesai' : 'selesai';
        $report->save();

        \Filament\Notifications\Notification::make()
            ->title('Status diperbarui')
            ->body("Status data diubah menjadi: {$report->status}.")
            ->success()
            ->send();

        $this->reportSps = ReportSp::all();
    }
}
