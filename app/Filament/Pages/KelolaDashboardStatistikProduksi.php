<?php

namespace App\Filament\Pages;

use App\Models\DashboardSp;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class KelolaDashboardStatistikProduksi extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.kelola-dashboard-statistik-produksi';
    protected static ?string $navigationLabel = 'Statistik Produksi';
    protected static ?string $navigationGroup = 'Kelola';
    public $dashboardSps;
    public $search = '';

    public array $formData = [
        'tahun' => null,
        'deskripsi' => null,
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function updatedSearch()
    {
        $this->loadData();
    }
    public function loadData()
    {
        $this->dashboardSps = DashboardSp::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('tahun', 'like', "%{$this->search}%")
                    ->orWhere('deskripsi', 'like', "%{$this->search}%")
            )
            ->orderBy('tahun')
            ->get();
    }

    public function save()
    {
        $validated = $this->validate([
            'formData.tahun' => 'required',
            'formData.deskripsi' => 'required',
        ]);

        DashboardSp::create($validated['formData']);

        $this->reset('formData');
        $this->loadData();
        session()->flash('success', 'Statistik Produksi berhasil ditambahkan.');
    }
    public function delete($id)
    {
        DashboardSp::findOrFail($id)->delete();
        $this->dashboardSps = DashboardSp::all();
        session()->flash('success', 'Data berhasil dihapus!');
    }
}
