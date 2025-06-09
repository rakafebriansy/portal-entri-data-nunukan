<?php

namespace App\Filament\EntriData\Resources\KategoriSpResource\Pages;

use App\Filament\EntriData\Resources\KategoriSpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriSp extends EditRecord
{
    protected static string $resource = KategoriSpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
