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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportPdrbResource extends Resource
{
    protected static ?string $model = ReportPdrb::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
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
                    Select::make('periode')
                        ->label('Periode')
                        ->preload()
                        ->options([
                            'Triwulan 1' => 'Triwulan 1',
                            'Triwulan 2' => 'Triwulan 2',
                            'Triwulan 3' => 'Triwulan 3',
                            'Triwulan 4' => 'Triwulan 4',
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
            ->recordUrl(null)
            ->columns([
                TextColumn::make('kategoriPdrb.nama')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('periode')->label('Periode')->sortable(),
                Tables\Columns\TextColumn::make('tahun')->label('Tahun')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('url_file')->label('Kuesioner')
                    ->view('blade-components.columns.link-button')
                    ->viewData(fn($record) => ['record' => $record]),
                Tables\Columns\ViewColumn::make('status')
                    ->label('Status Review')
                    ->searchable()
                    ->view('blade-components.columns.status-button')
                    ->viewData(fn($record) => ['record' => $record]),
                TextColumn::make('remind')->label('Pengingat')
                    ->view('blade-components.columns.remind-button'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Review')
                    ->options([
                        'selesai' => 'Selesai',
                        'belum selesai' => 'Belum Selesai',
                    ]),

                SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(
                        fn() =>
                        \App\Models\ReportSp::query()
                            ->select('tahun')
                            ->distinct()
                            ->orderBy('tahun', 'desc')
                            ->pluck('tahun', 'tahun')
                            ->toArray()
                    ),
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
    public static function shouldRegisterNavigation(): bool
    {
        return \Filament\Facades\Filament::auth()->user()?->role === 'admin';
    }
}
