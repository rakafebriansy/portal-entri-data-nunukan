<?php

namespace App\Filament\EntriData\Pages\Report\PDRB;

use App\Models\KategoriPdrb;
use App\Models\ReportPdrb;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Filters\SelectFilter;

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
    public function getTitle(): string
    {
        return 'Entri Data PDRB - ' . $this->kategori->nama;
    }
    public static function getRoute(): string
    {
        return '/reports/pdrb/{url}';
    }

    public function mount(string $url): void
    {
        $kategori = KategoriPdrb::where('nama', $this->denormalizeKategoriSp($url))->first();
        $this->kategori = $kategori;
    }

    protected function getTableQuery()
    {
        return ReportPdrb::where('kategori_pdrb_id', $this->kategori->id)->orderBy('tahun')->orderBy('periode');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
            Tables\Columns\TextColumn::make('periode')->label('Periode')->sortable(),
            Tables\Columns\TextColumn::make('tahun')->label('Tahun')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('url_file')->label('Kuesioner')
                ->view('blade-components.columns.link-button')
                ->viewData(fn($record) => ['record' => $record]),
            Tables\Columns\ViewColumn::make('status')
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
        $report = ReportPdrb::findOrFail($id);

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

        $this->resetTable();
    }

}
