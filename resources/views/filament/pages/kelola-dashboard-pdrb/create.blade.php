<x-filament-panels::page>
    <div class="mt-6 flex justify-start">
        <x-filament::button color="gray" tag="a"
            href="{{ url('/dashboard/kelola-dashboard-pdrb') }}">
            Kembali
        </x-filament::button>
    </div>
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
            <div class="">
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">PDRB Atas Dasar Harga Berlaku</label>
                    <input type="number" required wire:model.defer="formData.pdrb_atas_dasar_harga_berlaku"
                        placeholder="Masukkan jumlah (contoh: 14.198)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">PDRB Atas Dasar Harga Konstan</label>
                    <input type="number" required wire:model.defer="formData.pdrb_atas_dasar_harga_konstan"
                        placeholder="Masukkan jumlah (contoh: 14.234)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Pertumbuhan Y-on-Y (dalam persen)</label>
                    <input type="number" required wire:model.defer="formData.pertumbuhan_y_on_y"
                        placeholder="Masukkan jumlah (contoh: 50)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">PDRB per kapita</label>
                    <input type="number" required wire:model.defer="formData.pdrb_per_kapita"
                        placeholder="Masukkan jumlah (contoh: 50)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Nilai ADHB</label>
                    <input type="number" required wire:model.defer="formData.nilai_adhb"
                        placeholder="Masukkan jumlah (contoh: 50)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Nilai ADHK</label>
                    <input type="number" required wire:model.defer="formData.nilai_adhk"
                        placeholder="Masukkan jumlah (contoh: 50)"
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
            </div>
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
            </div>
        </div>
    @endif

    <!-- Step 2 -->
    @if ($step === 2)
        <div class="bg-white shadow rounded p-6">
            <div class="">
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <h1 class="mb-2">Sektor Lapangan Usaha
                        </h1>
                        <div class="">
                            @for ($i = 1; $i < 15; $i++)
                                <div class="">
                                    <label class="block text-sm font-medium text-gray-700">Sektor
                                        {{ $i }}</label>
                                    <div class="grid-cols-3 grid gap-3">
                                        @for ($j = 1; $j < 4; $j++)
                                            <input type="number" required
                                                wire:model.defer="formData.sektor_lapangan_usaha_{{ $i }}_{{ $j }}"
                                                placeholder="Masukkan jumlah"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1>PDRB Pengeluaran</h1>
                        @for ($i = 1; $i < 4; $i++)
                            <div>
                                <h1>Pengeluaran {{ $i }}</h1>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ADHD</label>
                                        <input type="number" required
                                            wire:model.defer="formData.adhb_lapangan_usaha_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ADHK</label>
                                        <input type="number" required
                                            wire:model.defer="formData.adhk_lapangan_usaha_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <div class="flex items-center gap-2">
                    <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                    <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
                </div>
            </div>
        </div>
    @endif

    <!-- Step 3 -->
    @if ($step === 3)
        <div class="bg-white shadow rounded p-6">
            <div class="">
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <h1 class="mb-2">Sektor Pengeluaran
                        </h1>
                        <div class="">
                            @for ($i = 1; $i < 7; $i++)
                                <div class="">
                                    <label class="block text-sm font-medium text-gray-700">Sektor
                                        {{ $i }}</label>
                                    <div class="grid-cols-3 grid gap-3">
                                        @for ($j = 1; $j < 4; $j++)
                                            <input type="number" required
                                                wire:model.defer="formData.sektor_pengeluaran_{{ $i }}_{{ $j }}"
                                                placeholder="Masukkan jumlah"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1>PDRB Pengeluaran</h1>
                        @for ($i = 1; $i < 4; $i++)
                            <div>
                                <h1>Komp {{ $i }}</h1>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ADHD</label>
                                        <input type="number" required
                                            wire:model.defer="formData.adhb_komp_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ADHK</label>
                                        <input type="number" required
                                            wire:model.defer="formData.adhk_komp_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <div class="flex items-center gap-2">
                    <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                    <x-filament::button color="success" wire:click="submit">Simpan</x-filament::button>
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
