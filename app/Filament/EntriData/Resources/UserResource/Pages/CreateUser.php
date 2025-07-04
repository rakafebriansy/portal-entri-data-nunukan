<?php

namespace App\Filament\EntriData\Resources\UserResource\Pages;

use App\Filament\EntriData\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
