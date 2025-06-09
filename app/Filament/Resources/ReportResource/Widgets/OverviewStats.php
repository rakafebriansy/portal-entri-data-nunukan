<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\View\View;

class OverviewStats extends BaseWidget
{
    // public function render(): View
    // {
    //     return view('blade-components.overview-stats-widget', [
    //         'cards' => $this->getCards(),
    //     ]);
    // }

    protected function getCards(): array
    {
        $data = [
            [
                'title' => 'Total Konsumsi',
                'value' => 100,
                'description' => 'Semua data konsumsi',
                'color' => 'primary',
                'icon' => 'heroicon-o-clipboard',
            ],
            [
                'title' => 'Total Kategori',
                'value' => 20,
                'description' => 'Kategori yang tersedia',
                'color' => 'success',
                'icon' => 'heroicon-o-folder-open',
            ],
            [
                'title' => 'Total User',
                'value' => 50,
                'description' => 'Jumlah user terdaftar',
                'color' => 'info',
                'icon' => 'heroicon-o-user-group',
            ],
            [
                'title' => 'Laporan Hari Ini',
                'value' => 5,
                'description' => 'Data konsumsi hari ini',
                'color' => 'warning',
                'icon' => 'heroicon-o-calendar',
            ],
            [
                'title' => 'Laporan Bulan Ini',
                'value' => 15,
                'description' => 'Data konsumsi bulan ini',
                'color' => 'danger',
                'icon' => 'heroicon-o-calendar-days',
            ],
        ];

        return collect($data)->map(
            fn($item) =>
            Card::make($item['title'], $item['value'])
                ->description($item['description'])
                ->color($item['color'])
                ->icon($item['icon'])
        )->toArray();
    }

}
