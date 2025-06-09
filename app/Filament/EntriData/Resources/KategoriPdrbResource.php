<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\KategoriPdrbResource\Pages;
use App\Filament\EntriData\Resources\KategoriPdrbResource\RelationManagers;
use App\Models\KategoriPdrb;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriPdrbResource extends Resource
{
    protected static ?string $model = KategoriPdrb::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $label = 'Kategori PDRB';

    protected static ?string $pluralLabel = 'Daftar Kategori PDRB';
    protected static ?string $navigationGroup = 'Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nama')
                        ->label('Nama Kategori')
                        ->required()
                        ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('nama')->searchable()->label('Nama Kategori'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKategoriPdrbs::route('/'),
            'create' => Pages\CreateKategoriPdrb::route('/create'),
            'edit' => Pages\EditKategoriPdrb::route('/{record}/edit'),
        ];
    }
}
