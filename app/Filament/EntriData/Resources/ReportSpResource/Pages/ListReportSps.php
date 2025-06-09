<?php

namespace App\Filament\EntriData\Resources\ReportSpResource\Pages;

use App\Filament\EntriData\Resources\ReportSpResource;
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
}
