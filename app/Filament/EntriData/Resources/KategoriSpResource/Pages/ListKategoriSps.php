<?php

namespace App\Filament\EntriData\Resources\KategoriSpResource\Pages;

use App\Filament\EntriData\Resources\KategoriSpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriSps extends ListRecords
{
    protected static string $resource = KategoriSpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
