<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\ReportPdrbResource\Pages;
use App\Filament\EntriData\Resources\ReportPdrbResource\RelationManagers;
use App\Models\ReportPdrb;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
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
                    Hidden::make('user_id')
                        ->default(auth()->id())
                        ->required(),
                    Select::make('triwulan')
                        ->label('Periode')
                        ->preload()
                        ->options([
                            1 => 'Triwulan 1',
                            2 => 'Triwulan 2',
                            3 => 'Triwulan 3',
                            4 => 'Triwulan 4',
                        ])
                        ->required(),
                    Select::make('kategori_pdrb_id')
                        ->label('Kategori')
                        ->preload()
                        ->relationship('kategoriPdrb', 'nama')
                        ->searchable()
                        ->required(),
                    TextInput::make('url_file')
                        ->label('Link File')
                        ->placeholder('Contoh: https://example.com')
                        ->url()
                        ->required(),
                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(5)
                        ->placeholder('Masukkan deskripsi di sini...')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('triwulan')->label('Periode'),
                Tables\Columns\TextColumn::make('tahun')->label('Tahun'),
                Tables\Columns\TextColumn::make('url_file')->label('Link')
                    ->formatStateUsing(fn() => 'Link')
                    ->color('#FF0000')
                    ->extraAttributes(['class' => 'text-blue-600 underline hover:text-blue-800 transition-colors'])
                    ->url(fn($record) => $record->url_file, true)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('status')->label('Status Review'),
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
