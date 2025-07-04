<?php

namespace App\Filament\EntriData\Resources;

use App\Filament\EntriData\Resources\ReportSpResource\Pages;
use App\Filament\EntriData\Resources\ReportSpResource\RelationManagers;
use App\Models\ReportSp;
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

class ReportSpResource extends Resource
{
    protected static ?string $model = ReportSp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $label = 'Report Statistik Produksi';

    protected static ?string $pluralLabel = 'Daftar Report Statistik Produksi';
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
                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(5)
                        ->placeholder('Masukkan deskripsi di sini...')
                        ->required(),
                    Select::make('kategori_sp_id')
                        ->label('Kategori')
                        ->relationship('kategoriSp', 'nama')
                        ->searchable()
                        ->preload()
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
            ->recordUrl(null)
            ->columns([
                TextColumn::make('kategoriSp.nama')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('url_file')->label('Link')
                    ->formatStateUsing(fn() => 'Link')
                    ->color('#FF0000')
                    ->extraAttributes(['class' => 'text-blue-600 underline hover:text-blue-800 transition-colors'])
                    ->url(fn($record) => $record->url_file, true)
                    ->openUrlInNewTab(),

                Tables\Columns\ViewColumn::make('status')
                    ->label('Status Review')
                    ->searchable()
                    ->view('blade-components.columns.status-button')
                    ->viewData(fn($record) => ['record' => $record])
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
            'index' => Pages\ListReportSps::route('/'),
            'create' => Pages\CreateReportSp::route('/create'),
            'edit' => Pages\EditReportSp::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return \Filament\Facades\Filament::auth()->user()?->role === 'admin';
    }
}
