<?php

namespace App\Filament\EntriData\Resources\AlarmResource\Pages;

use App\Filament\EntriData\Resources\AlarmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlarms extends ListRecords
{
    protected static string $resource = AlarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
