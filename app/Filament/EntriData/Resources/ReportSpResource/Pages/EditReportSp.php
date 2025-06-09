<?php

namespace App\Filament\EntriData\Resources\ReportSpResource\Pages;

use App\Filament\EntriData\Resources\ReportSpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportSp extends EditRecord
{
    protected static string $resource = ReportSpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
