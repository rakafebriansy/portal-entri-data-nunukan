<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\KategoriSpResource\Pages;
use App\Filament\EntriData\Resources\KategoriSpResource\RelationManagers;
use App\Models\KategoriSp;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class KategoriSpResource extends Resource
{
    protected static ?string $model = KategoriSp::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $label = 'Kategori Statistik Produksi';

    protected static ?string $pluralLabel = 'Daftar Kategori Statistik Produksi';
    protected static ?string $navigationGroup = 'Kategori';

    private static function formatString($string)
    {
        $replaced = str_replace(' ', '', strtolower(trim($string)));

        return $replaced;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nama')
                        ->label('Nama Kategori')
                        ->required()
                        ->reactive() 
                        ->afterStateUpdated(fn($state, \Filament\Forms\Set $set, \Filament\Forms\Get $get) => $set('url', self::formatString($state)))
                        ->maxLength(255),
                ]),
                Grid::make(2)->schema([
                    TextInput::make('url')
                        ->label('URL')
                        ->required()
                        ->dehydrated()
                        ->readOnly()
                        ->maxLength(255),
                ]),
                Grid::make(2)->schema([
                    Select::make('bidang')
                        ->label('Bidang')
                        ->options([
                            'peternakan' => 'Peternakan',
                            'pertanian' => 'Pertanian',
                        ])
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('nama')->searchable()->label('Nama Kategori'),
                TextColumn::make('bidang')->searchable()->label('Bidang')->formatStateUsing(fn($state) => Str::title($state)),
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
            'index' => Pages\ListKategoriSps::route('/'),
            'create' => Pages\CreateKategoriSp::route('/create'),
            'edit' => Pages\EditKategoriSp::route('/{record}/edit'),
        ];
    }
}
