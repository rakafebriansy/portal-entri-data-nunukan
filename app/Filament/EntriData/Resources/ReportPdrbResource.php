<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\ReportPdrbResource\Pages;
use App\Filament\EntriData\Resources\ReportPdrbResource\RelationManagers;
use App\Models\ReportPdrb;
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

class ReportPdrbResource extends Resource
{
    protected static ?string $model = ReportPdrb::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Report PDRB';
    protected static ?string $pluralLabel = 'Daftar Report PDRB';
    protected static ?string $navigationGroup = 'Kelola Report';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('tahun')
                        ->label('Tahun')
                        ->required()
                        ->numeric()
                        ->minValue(1900)
                        ->maxValue(date('Y'))
                        ->rules(['digits:4'])
                        ->helperText('Masukkan tahun antara 1900 sampai ' . date('Y'))
                        ->placeholder('Contoh: 2023'),
                    Select::make('user_id')
                        ->label('Pengguna')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->required(),
                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(5)
                        ->placeholder('Masukkan deskripsi di sini...')
                        ->required(),
                    Select::make('kategori_pdrb_id')
                        ->label('Kategori')
                        ->relationship('kategoriPdrb', 'nama')
                        ->searchable()
                        ->required(),
                    TextInput::make('url_file')
                        ->label('Link File')
                        ->placeholder('Contoh: https://example.com')
                        ->url()
                        ->required()
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('url_file')
                    ->label('Link File')
                    ->url(fn($record) => $record->sheet_url, true)
                    ->openUrlInNewTab(),
                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kategoriPdrb.nama')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReportPdrbs::route('/'),
            'create' => Pages\CreateReportPdrb::route('/create'),
            'edit' => Pages\EditReportPdrb::route('/{record}/edit'),
        ];
    }
}
