<?php

namespace App\Filament\EntriData\Pages\Report\SP;

use App\Models\KategoriSp;
use App\Models\ReportSp;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Concerns\HasHeader;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class ListByKategoriReports extends Page implements HasTable
{
    use InteractsWithTable, HasHeader;
    public ?KategoriSp $kategori;

    protected static ?string $navigationIcon = null;

    protected static string $view = 'filament.entri-data.pages.report.s-p.list-by-kategori-reports';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    protected function getTableHeader(): View|Htmlable|null
    {
        return view('components.table-header');
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

    protected function getTableQuery()
    {
        return ReportSp::where('kategori_sp_id', $this->kategori->id)->orderBy('tahun')->orderBy('periode');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('deskripsi')->label('Deskripsi'),
            TextColumn::make('periode')->label('Periode')->sortable(),
            TextColumn::make('tahun')->label('Tahun')->searchable()->sortable(),
              TextColumn::make('url_file')->label('Kuesioner')
                    ->view('blade-components.columns.link-button')
                    ->viewData(fn($record) => ['record' => $record]),
            ViewColumn::make('status')
                ->label('Status Review')
                ->searchable()
                ->view('blade-components.columns.status-button')
                ->viewData(fn($record) => ['record' => $record])
        ];
    }
    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('status')
                ->label('Status Review')
                ->options([
                    'selesai' => 'Selesai',
                    'belum selesai' => 'Belum Selesai',
                ]),

            SelectFilter::make('tahun')
                ->label('Tahun')
                ->options(
                    fn() =>
                    \App\Models\ReportSp::query()
                        ->select('tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc')
                        ->pluck('tahun', 'tahun')
                        ->toArray()
                ),
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

        $actor = auth()->user();
        $recipients = User::where('role', 'admin')->get();

        Notification::make()
            ->title('Status diperbarui')
            ->body("Status data diubah menjadi: {$report->status}.")
            ->success()
            ->send();
        Notification::make()
            ->title('Status diperbarui oleh ' . $actor->name)
            ->body("Status data diubah menjadi: {$report->status}.")
            ->success()
            ->sendToDatabase($recipients);

        // $this->reportSps = ReportSp::all();
        $this->resetTable();
    }
}
