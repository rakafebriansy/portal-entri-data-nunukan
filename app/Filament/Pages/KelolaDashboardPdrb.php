<?php

namespace App\Filament\Pages;

use App\Models\DashboardPdrb;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class KelolaDashboardPdrb extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.kelola-dashboard-pdrb';

    protected static ?string $navigationLabel = 'PDRB';
    protected static ?string $navigationGroup = 'Kelola';

    public $dashboardPdrbs;
    public $search = '';
    public $formData = [
        'tahun' => null,
        'deskripsi' => null,
    ];

    public function mount()
    {
        $this->loadData();
    }
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user() != null ? auth()->user()->role == 'admin' : false;
    }
    public function updatedSearch()
    {
        $this->loadData();
    }
    public function loadData()
    {
        $this->dashboardPdrbs = DashboardPdrb::query()
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

        DashboardPdrb::create($validated['formData']);

        $this->reset('formData');
        $this->loadData();
        session()->flash('success', 'PDRB berhasil ditambahkan.');
        redirect('/dashboard/kelola-dashboard-pdrb');
    }
    public function delete($id)
    {
        DashboardPdrb::findOrFail($id)->delete();
        $this->dashboardPdrbs = DashboardPdrb::all();
        session()->flash('success', 'Data berhasil dihapus!');
        redirect('/dashboard/kelola-dashboard-pdrb');
    }
}
