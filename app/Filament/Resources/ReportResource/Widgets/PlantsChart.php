<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use Filament\Widgets\ChartWidget;

class PlantsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
