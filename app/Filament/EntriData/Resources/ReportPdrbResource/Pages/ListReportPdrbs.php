<?php

namespace App\Filament\EntriData\Resources\ReportPdrbResource\Pages;

use App\Filament\EntriData\Resources\ReportPdrbResource;
use App\Models\ReportPdrb;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportPdrbs extends ListRecords
{
    protected static string $resource = ReportPdrbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function toggleStatus($id)
    {
        $report = ReportPdrb::findOrFail($id);

        $report->status = $report->status === 'selesai' ? 'belum selesai' : 'selesai';
        $report->save();

        \Filament\Notifications\Notification::make()
            ->title('Status diperbarui')
            ->body("Status data diubah menjadi: {$report->status}.")
            ->success()
            ->send();

        $this->reportSps = ReportPdrb::all();
    }
}
