<?php

namespace App\Filament\EntriData\Resources\ReportSpResource\Pages;

use App\Filament\EntriData\Resources\ReportSpResource;
use App\Models\ReportSp;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportSps extends ListRecords
{
    protected static string $resource = ReportSpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
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
