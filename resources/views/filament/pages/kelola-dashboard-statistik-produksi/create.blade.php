<x-filament-panels::page>
    <!-- Indikator Step -->
        <div class="flex items-center justify-center mb-6">
            @foreach ([1, 2, 3] as $s)
                <div class="flex items-center">
                    <div
                        class="rounded-full w-10 h-10 flex items-center justify-center 
                    {{ $step >= $s ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700' }}">
                        {{ $s }}
                    </div>
                    @if ($s < 3)
                        <div class="w-10 h-1 {{ $step > $s ? 'bg-blue-600' : 'bg-gray-300' }}"></div>
                    @endif
                </div>
            @endforeach
        </div>

    <!-- Step 1 -->
    @if ($step === 1)
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-bold mb-4">Step 1: Data Pribadi</h2>
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" wire:model.defer="formData.name"
                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
            </div>
        </div>
    @endif

    <!-- Step 2 -->
    @if ($step === 2)
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-bold mb-4">Step 2: Kontak</h2>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model.defer="formData.email"
                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <div class="flex gap-2">
                    <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                    <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
                </div>
            </div>
        </div>
    @endif

    <!-- Step 3 -->
    @if ($step === 3)
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-bold mb-4">Step 3: Alamat</h2>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" wire:model.defer="formData.address"
                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <div class="flex gap-2">
                    <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                    <x-filament::button color="success" wire:click="submit">Submit</x-filament::button>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
</x-filament-panels::page>
