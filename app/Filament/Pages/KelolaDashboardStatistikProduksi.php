<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class KelolaDashboardStatistikProduksi extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi';
    protected static ?string $navigationLabel = 'Statistik Produksi';

    public int $step = 1;

    public array $formData = [
        'name' => '',
        'email' => '',
        'address' => '',
    ];

    public function nextStep()
    {
        if ($this->step < 3) {
            $this->step++;
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function resetForm()
    {
        $this->reset('formData', 'step');
        $this->step = 1;
        session()->forget('success');
    }


    public function submit()
    {
        // Simpan data
        // Contoh:
        // ModelName::create($this->formData);

        session()->flash('success', 'Form berhasil dikirim!');
        $this->reset('formData', 'step');
        $this->step = 1;
    }
}
