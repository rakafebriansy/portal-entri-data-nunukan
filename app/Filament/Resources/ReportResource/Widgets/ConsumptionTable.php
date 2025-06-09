<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use App\Models\Report;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ConsumptionTable extends BaseWidget
{
    protected static ?string $heading = 'Konsumsi';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Report::query()
            )
            ->columns([
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi'),
                TextColumn::make('sheet_url')
                    ->label('Link File')
            ]);
    }
}
