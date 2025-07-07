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
                    Select::make('kategori_sp_id')
                        ->label('Kategori')
                        ->relationship('kategoriSp', 'nama')
                        ->searchable()
                        ->preload()
                        ->reactive()
                        ->required(),
                    TextInput::make('url_file')
                        ->label('Link File')
                        ->placeholder('Contoh: https://example.com')
                        ->url()
                        ->required(),
                    Select::make('periode')
                        ->label('Periode')
                        ->options(function (callable $get) {
                            $kategori = \App\Models\KategoriSp::find($get('kategori_sp_id'));

                            $jenis = $kategori?->jenis_periode;

                            return match ($jenis) {
                                'bulanan' => [
                                    'Januari' => 'Januari',
                                    'Februari' => 'Februari',
                                    'Maret' => 'Maret',
                                    'April' => 'April',
                                    'Mei' => 'Mei',
                                    'Juni' => 'Juni',
                                    'Juli' => 'Juli',
                                    'Agustus' => 'Agustus',
                                    'September' => 'September',
                                    'Oktober' => 'Oktober',
                                    'November' => 'November',
                                    'Desember' => 'Desember',
                                ],
                                'triwulan' => [
                                    'Triwulan 1' => 'Triwulan 1',
                                    'Triwulan 2' => 'Triwulan 2',
                                    'Triwulan 3' => 'Triwulan 3',
                                    'Triwulan 4' => 'Triwulan 4',
                                ],
                                'tahunan' => [
                                    'Tahunan' => 'Tahunan',
                                ],
                                default => [],
                            };
                        })
                        ->helperText('Pilih kategori terlebih dahulu')
                        ->placeholder('Pilih periode')
                        ->reactive()
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
                TextColumn::make('kategoriSp.nama')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('periode')
                    ->label('Periode')
                    ->sortable(),
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),
                TextColumn::make('url_file')->label('Kuesioner')
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
