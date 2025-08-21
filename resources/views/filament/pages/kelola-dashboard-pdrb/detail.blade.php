<x-filament-panels::page>
    <div class="mt-6 flex justify-start">
        <x-filament::button color="gray" tag="a" href="{{ url('/dashboard/kelola-dashboard-pdrb') }}">
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
                    <input type="number" value="{{ $dashboardPdrb->pdrb_atas_dasar_harga_berlaku }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">PDRB Atas Dasar Harga Konstan</label>
                    <input type="number" value="{{ $dashboardPdrb->pdrb_atas_dasar_harga_konstan }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Pertumbuhan Y-on-Y (dalam persen)</label>
                    <input type="number" value="{{ $dashboardPdrb->pertumbuhan_y_on_y }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">PDRB per kapita</label>
                    <input type="number" value="{{ $dashboardPdrb->pdrb_per_kapita }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Nilai ADHB</label>
                    <input type="number" value="{{ $dashboardPdrb->nilai_adhb }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Nilai ADHK</label>
                    <input type="number" value="{{ $dashboardPdrb->nilai_adhk }}" readonly
                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                </div>
            </div>
            <div class="flex items-center justify-end">
                <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
            </div>
        </div>
    @endif

    <!-- Step 2 -->
    @if ($step === 2)
        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h1 class="mb-2">Sektor Lapangan Usaha</h1>
                    @for ($i = 1; $i <= 14; $i++)
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Sektor {{ $i }}</label>
                            <div class="grid grid-cols-3 gap-3">
                                @for ($j = 1; $j <= 3; $j++)
                                    <input type="number"
                                        value="{{ $dashboardPdrb->{'sektor_lapangan_usaha_' . $i . '_' . $j} }}"
                                        readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <div>
                    <h1 class="mb-2">PDRB Pengeluaran</h1>
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="mb-3">
                            <h1 class="font-medium">Pengeluaran {{ $i }}</h1>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ADHD</label>
                                    <input type="number" value="{{ $dashboardPdrb->{'adhb_lapangan_usaha_' . $i} }}"
                                        readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ADHK</label>
                                    <input type="number" value="{{ $dashboardPdrb->{'adhk_lapangan_usaha_' . $i} }}"
                                        readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="flex items-center gap-2 justify-end">
                <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
            </div>
        </div>
    @endif

    <!-- Step 3 -->
    @if ($step === 3)
        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h1 class="mb-2">Sektor Pengeluaran Tambahan</h1>
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Sektor {{ $i }}</label>
                            <div class="grid grid-cols-3 gap-3">
                                @for ($j = 1; $j <= 3; $j++)
                                    <input type="number"
                                        value="{{ $dashboardPdrb->{'sektor_pengeluaran_' . $i . '_' . $j} }}" readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <div>
                    <h1 class="mb-2">PDRB Pengeluaran Tambahan</h1>
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="mb-3">
                            <h1 class="font-medium">Komp {{ $i }}</h1>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ADHD</label>
                                    <input type="number" value="{{ $dashboardPdrb->{'adhb_komp_' . $i} }}" readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ADHK</label>
                                    <input type="number" value="{{ $dashboardPdrb->{'adhk_komp_' . $i} }}" readonly
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" />
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
            </div>
        </div>
    @endif
</x-filament-panels::page>
