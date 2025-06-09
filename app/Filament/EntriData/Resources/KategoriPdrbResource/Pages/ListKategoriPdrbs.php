<?php

namespace App\Filament\EntriData\Resources\KategoriPdrbResource\Pages;

use App\Filament\EntriData\Resources\KategoriPdrbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriPdrbs extends ListRecords
{
    protected static string $resource = KategoriPdrbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
