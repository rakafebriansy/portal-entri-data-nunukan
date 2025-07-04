<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\KategoriSpResource\Pages;
use App\Filament\EntriData\Resources\KategoriSpResource\RelationManagers;
use App\Models\KategoriSp;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    Select::make('bidang')
                        ->label('Bidang')
                        ->options([
                            'peternakan' => 'Peternakan',
                            'pertanian' => 'Pertanian',
                        ])
                        ->required(),
                ]),
                Grid::make(2)->schema([
                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
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
                TextColumn::make('bidang')->searchable()->label('Bidang')->formatStateUsing(fn($state) => Str::title($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
    public static function shouldRegisterNavigation(): bool
    {
        return \Filament\Facades\Filament::auth()->user()?->role === 'admin';
    }
}
