<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\AlarmResource\Pages;
use App\Filament\EntriData\Resources\AlarmResource\RelationManagers;
use App\Models\Alarm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlarmResource extends Resource
{
    protected static ?string $model = Alarm::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $label = 'Alarm';

    protected static ?string $pluralLabel = 'Daftar Alarm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlarms::route('/'),
            'create' => Pages\CreateAlarm::route('/create'),
            'edit' => Pages\EditAlarm::route('/{record}/edit'),
        ];
    }
}
