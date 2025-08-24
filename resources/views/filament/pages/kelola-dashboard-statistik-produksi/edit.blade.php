<x-filament-panels::page>
    <!-- Tombol Kembali -->
    <div class="mt-6 flex justify-start">
        <x-filament::button color="gray" tag="a"
            href="{{ url('/dashboard/kelola-dashboard-statistik-produksi') }}">
            Kembali
        </x-filament::button>
    </div>

    <!-- Indikator Step -->
    <div class="flex items-center justify-center mb-6">
        @foreach ([1, 2, 3] as $s)
            <div class="flex items-center">
                <div
                    class="rounded-full w-10 h-10 flex items-center justify-center {{ $step >= $s ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700' }}">
                    {{ $s }}
                </div>
                @if ($s < 3)
                    <div class="w-10 h-1 {{ $step > $s ? 'bg-blue-600' : 'bg-gray-300' }}"></div>
                @endif
            </div>
        @endforeach
    </div>

    @php
        $months = [
            'jan' => 'Januari',
            'feb' => 'Februari',
            'mar' => 'Maret',
            'apr' => 'April',
            'mei' => 'Mei',
            'jun' => 'Juni',
            'jul' => 'Juli',
            'agu' => 'Agustus',
            'sep' => 'September',
            'okt' => 'Oktober',
            'nov' => 'November',
            'des' => 'Desember',
        ];
    @endphp

    <!-- Step 1 -->
    @if ($step === 1)
        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah Alsintan {{ $dashboardSp->tahun }}
                            (dalam unit)</label>
                        <input type="text" wire:model.defer="formData.jumlah_alsintan" placeholder="Masukkan jumlah"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah Penggunaan Benih
                            {{ $dashboardSp->tahun }} (dalam ton)</label>
                        <input type="text" wire:model.defer="formData.jumlah_penggunaan_benih"
                            placeholder="Masukkan jumlah"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Total Luas Penggunaan Lahan Pertanian
                            {{ $dashboardSp->tahun }} (dalam hektar)</label>
                        <input type="text" wire:model.defer="formData.total_luas_penggunaan_lahan_pertanian"
                            placeholder="Masukkan jumlah"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>
                </div>

                <div>
                    <h1 class="mb-2">Luas Panen Jagung (ha) {{ $dashboardSp->tahun }}</h1>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            @foreach (['jan', 'mar', 'mei', 'jul', 'sep', 'nov'] as $month)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">{{ $months[$month] }}</label>
                                    <input type="text"
                                        wire:model.defer="formData.luas_panen_jagung_{{ $month }}"
                                        placeholder="Masukkan jumlah"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                                </div>
                            @endforeach
                        </div>
                        <div>
                            @foreach (['feb', 'apr', 'jun', 'agu', 'okt', 'des'] as $month)
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700">{{ $months[$month] }}</label>
                                    <input type="text"
                                        wire:model.defer="formData.luas_panen_jagung_{{ $month }}"
                                        placeholder="Masukkan jumlah"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <x-filament::button wire:click="nextStep">Selanjutnya</x-filament::button>
            </div>
        </div>
    @endif

    <!-- Step 2 -->
    @if ($step === 2)
        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-2 gap-6">
                <!-- Palawija -->
                <div>
                    <h1 class="mb-2">Luas Panen 4 Komoditas Palawija Tertinggi (ha) {{ $dashboardSp->tahun }}</h1>
                    <div class="grid grid-cols-2 gap-3">
                        {{-- <x-enum-input id="jenis_panen_palawija_tertinggi_" :names="['Jagung', 'Kacang Tanah', 'Ubi Jalar', 'Ubi Kayu']" :options="['jagung', 'kacang_tanah', 'ubi_jalar', 'ubi_kayu']" /> --}}
                        <div>
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="text-sm">
                                    <label>Jenis</label>
                                    <input type="text"
                                        wire:model.defer="formData.jenis_panen_palawija_tertinggi_{{ $i }}"
                                        placeholder="Masukkan jenis"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                </div>
                            @endfor
                        </div>
                        <div>
                            @for ($i = 1; $i <= 4; $i++)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Luas</label>
                                    <input type="text"
                                        wire:model.defer="formData.luas_panen_palawija_tertinggi_{{ $i }}"
                                        placeholder="Masukkan jumlah"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- BST & SBS -->
                <div class="flex flex-col gap-4">
                    <!-- BST -->
                    <div>
                        <h1>Jumlah 3 Tanaman BST Tertinggi {{ $dashboardSp->tahun }}</h1>
                        <div class="grid grid-cols-2 gap-3">
                            {{-- <x-enum-input id="jenis_tanaman_bst_tertinggi_" :names="['Pisang', 'Nanas', 'Durian']" :options="['pisang', 'nanas', 'durian']" /> --}}
                            <div>
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="text-sm">
                                        <label>Jenis</label>
                                        <input type="text"
                                            wire:model.defer="formData.jenis_tanaman_bst_tertinggi_{{ $i }}"
                                            placeholder="Masukkan jenis"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                @endfor
                            </div>
                            <div>
                                @for ($i = 1; $i <= 3; $i++)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                        <input type="text"
                                            wire:model.defer="formData.jumlah_tanaman_bst_tertinggi_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm"
                                            required />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- SBS -->
                    <div>
                        <h1>Luas Panen 3 Tanaman SBS Tertinggi (ha) {{ $dashboardSp->tahun }}</h1>
                        <div class="grid grid-cols-2 gap-3">
                            {{-- <x-enum-input id="jenis_tanaman_sbs_tertinggi_" :names="['Bayam', 'Kangkung', 'Sawi']" :options="['bayam', 'kangkung', 'sawi']" /> --}}
                            <div>
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="text-sm">
                                        <label>Jenis</label>
                                        <input type="text"
                                            wire:model.defer="formData.jenis_tanaman_sbs_tertinggi_{{ $i }}"
                                            placeholder="Masukkan jenis"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                @endfor
                            </div>
                            <div>
                                @for ($i = 1; $i <= 3; $i++)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                        <input type="text"
                                            wire:model.defer="formData.luas_tanaman_sbs_tertinggi_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm"
                                            required />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
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
                <!-- Ternak -->
                <div>
                    <h1 class="mb-2">Jumlah Ternak Potong menurut Jenisnya {{ $dashboardSp->tahun }}</h1>
                    <div class="grid grid-cols-2 gap-3">
                        {{-- <x-enum-input id="jenis_ternak_potong_" :names="['Kambing', 'Babi', 'Sapi', 'Kerbau']" :options="['kambing', 'babi', 'sapi', 'kerbau']" /> --}}
                        <div>
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="text-sm">
                                    <label>Jenis</label>
                                    <input type="text"
                                        wire:model.defer="formData.jenis_ternak_potong_{{ $i }}"
                                        placeholder="Masukkan jenis"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                </div>
                            @endfor
                        </div>
                        <div>
                            @for ($i = 1; $i <= 4; $i++)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="text"
                                        wire:model.defer="formData.jumlah_ternak_potong_{{ $i }}"
                                        placeholder="Masukkan jumlah"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Tren 5 Tahun -->
                <div>
                    <h1 class="mb-2">Tren Pemotongan Ternak 5 Tahun Terakhir</h1>
                    <div class="grid grid-cols-2 gap-3">
                        @php
                            $year = \Illuminate\Support\Carbon::now()->year;
                            $years = [];

                            for ($i = 0; $i <= 4; $i++) {
                                $years[] = $year - $i;
                            }
                        @endphp
                        <x-enum-input id="tahun_tren_pemotongan_ternak_" :names="$years" :options="$years" />
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="text"
                                        wire:model.defer="formData.jumlah_tren_pemotongan_ternak_{{ $i }}"
                                        placeholder="Masukkan jumlah"
                                        class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" required />
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <x-filament::button color="gray" wire:click="previousStep">Kembali</x-filament::button>
                <x-filament::button color="success" wire:click="submit">Simpan</x-filament::button>
            </div>
        </div>
    @endif
</x-filament-panels::page>
