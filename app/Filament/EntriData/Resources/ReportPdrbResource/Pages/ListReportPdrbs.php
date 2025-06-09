<?php

namespace App\Filament\EntriData\Resources\ReportPdrbResource\Pages;

use App\Filament\EntriData\Resources\ReportPdrbResource;
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
}
