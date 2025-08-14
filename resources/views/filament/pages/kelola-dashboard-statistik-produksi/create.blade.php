<x-filament-panels::page>
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
            <div class="grid grid-cols-2 gap-6">
                <div class="">
                    <div class="">
                        <label class="block text-sm font-medium text-gray-700">Jumlah Alsintan {{ $dashboardSp->tahun }}
                            (dalam unit)</label>
                        <input type="number" required wire:model.defer="formData.jumlah_alsintan"
                            placeholder="Masukkan jumlah (contoh: 14.198)"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                    <div class="">
                        <label class="block text-sm font-medium text-gray-700">Jumlah Penggunaan Benih
                            {{ $dashboardSp->tahun }}
                            (dalam ton)</label>
                        <input type="number" required wire:model.defer="formData.jumlah_penggunaan_benih"
                            placeholder="Masukkan jumlah (contoh: 18)"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                    <div class="">
                        <label class="block text-sm font-medium text-gray-700">Total Luas Penggunaan Lahan Pertanian
                            {{ $dashboardSp->tahun }}
                            (dalam hektar)</label>
                        <input type="number" required wire:model.defer="formData.total_luas_penggunaan_lahan_pertanian"
                            placeholder="Masukkan jumlah (contoh: 154)"
                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                </div>
                <div class="">
                    <h1 class="mb-2">Luas Panen Jagung (ha) {{ $dashboardSp->tahun }}</h1>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="">
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Januari</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_jan"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Maret</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_mar"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Mei</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_mei"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Juli</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_jul"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">September</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_sep"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">November</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_nov"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Februari</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_feb"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">April</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_apr"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Juni</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_jun"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Agustus</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_agu"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Oktober</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_okt"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div class="">
                                <label class="block text-sm font-medium text-gray-700">Desember</label>
                                <input type="number" required wire:model.defer="formData.luas_panen_jagung_des"
                                    placeholder="Masukkan jumlah"
                                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                        </div>
                    </div>
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
                        <h1 class="mb-2">Luas Panen 4 Komoditas Palawija Tertinggi (ha) {{ $dashboardSp->tahun }}
                        </h1>
                        <div class="grid-cols-2 grid gap-3">
                            <div class="">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Jenis</label>
                                        <select
                                            wire:model.defer="formData.jenis_panen_palawija_tertinggi_{{ $i }}"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="">Pilih</option>
                                            <option value="jagung">Jagung</option>
                                            <option value="kacang_tanah">Kacang Tanah</option>
                                            <option value="ubi_jalar">Ubi Jalar</option>
                                            <option value="ubi_kayu">Ubi Kayu</option>
                                        </select>
                                    </div>
                                @endfor
                            </div>
                            <div class="">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Luas</label>
                                        <input type="number" required
                                            wire:model.defer="formData.luas_panen_palawija_tertinggi_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="">
                            <h1>Jumlah 3 Tanaman Menghasilkan BST Tertinggi {{ $dashboardSp->tahun }}</h1>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="">
                                    @for ($i = 1; $i < 4; $i++)
                                        <div class="">
                                            <label class="block text-sm font-medium text-gray-700">Jenis</label>
                                            <select
                                                wire:model.defer="formData.jenis_tanaman_bst_tertinggi_{{ $i }}"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm">
                                                <option value="">Pilih</option>
                                                <option value="pisang">Pisang</option>
                                                <option value="nanas">Nanas</option>
                                                <option value="durian">Durian</option>
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                                <div class="">
                                    @for ($i = 1; $i < 4; $i++)
                                        <div class="">
                                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input type="number" required
                                                wire:model.defer="formData.jumlah_tanaman_bst_tertinggi_{{ $i }}"
                                                placeholder="Masukkan jumlah"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <h1>Luas Panen 3 Tanaman SBS Tertinggi (ha) {{ $dashboardSp->tahun }}</h1>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="">
                                    @for ($i = 1; $i < 4; $i++)
                                        <div class="">
                                            <label class="block text-sm font-medium text-gray-700">Jenis</label>
                                            <select
                                                wire:model.defer="formData.jenis_tanaman_sbs_tertinggi_{{ $i }}"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm">
                                                <option value="">Pilih</option>
                                                <option value="bayam">Bayam</option>
                                                <option value="kangkung">Kangkung</option>
                                                <option value="sawi">Sawi</option>
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                                <div class="">
                                    @for ($i = 1; $i < 4; $i++)
                                        <div class="">
                                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input type="number" required
                                                wire:model.defer="formData.luas_tanaman_sbs_tertinggi_{{ $i }}"
                                                placeholder="Masukkan jumlah"
                                                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
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
                        <h1 class="mb-2">Jumlah Ternak Potong menurut Jenisnya {{ $dashboardSp->tahun }}
                        </h1>
                        <div class="grid-cols-2 grid gap-3">
                            <div class="">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Jenis</label>
                                        <select wire:model.defer="formData.jenis_ternak_potong_{{ $i }}"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="">Pilih</option>
                                            <option value="kambing">Kambing</option>
                                            <option value="babi">Babi</option>
                                            <option value="sapi">Sapi</option>
                                            <option value="kerbau">Kerbau</option>
                                        </select>
                                    </div>
                                @endfor
                            </div>
                            <div class="">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                        <input type="number" required
                                            wire:model.defer="formData.jumlah_ternak_potong_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h1 class="mb-2">Tren Pemotongan Ternak 5 Tahun Terakhir
                        </h1>
                        @php
                            $year = \Illuminate\Support\Carbon::now()->year;
                        @endphp
                        <div class="grid-cols-2 grid gap-3">
                            <div class="">
                                @for ($i = 1; $i < 6; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Tahun</label>
                                        <select
                                            wire:model.defer="formData.tahun_tren_pemotongan_ternak_{{ $i }}"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="">Pilih</option>
                                            @for ($j = 0; $j < 5; $j++)
                                                <option value="{{ $year - $j }}">{{ $year - $j }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                @endfor
                            </div>
                            <div class="">
                                @for ($i = 1; $i < 6; $i++)
                                    <div class="">
                                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                        <input type="number" required
                                            wire:model.defer="formData.jumlah_tren_pemotongan_ternak_{{ $i }}"
                                            placeholder="Masukkan jumlah"
                                            class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <x-filament::button color="danger" wire:click="resetForm">Reset</x-filament::button>
                <div class="flex items-center gap-2">
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
