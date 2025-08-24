<x-filament-panels::page>
    <div class="flex justify-between items-center mb-5">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari tahun atau deskripsi..."
            class="border rounded-md px-3 py-2 w-full md:w-1/3" />
        <!-- Modal Tambah -->
        <x-filament::modal>
            <x-slot name="trigger">
                <x-filament::button color="primary">
                    + Tambah
                </x-filament::button>

            </x-slot>

            <x-slot name="heading">
                Tambah Statistik Produksi
            </x-slot>

            <x-slot name="footer">
                <x-filament::button wire:click="save">Simpan</x-filament::button>
            </x-slot>

            <div class="">
                <label class="block text-sm font-medium text-gray-700">Tahun</label>
                <input required wire:model.defer="formData.tahun" placeholder="Masukkan tahun"
                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>
            <div class="">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea required wire:model.defer="formData.deskripsi" placeholder="Masukkan deskripsi"
                    class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

        </x-filament::modal>
    </div>
    <div class="flex flex-col gap-6">
        @forelse ($dashboardSps as $dashboardSp)
            <div class="bg-white rounded-xl justify-between flex p-5 shadow border items-center">
                <div class="w-[70%]">
                    <h3 class="text-lg font-semibold">{{ $dashboardSp->tahun }}</h3>
                    <p class="text-sm text-gray-500">{{ $dashboardSp->deskripsi }}</p>
                </div>
                <div class="flex gap-3 items-center">
                    @if ($dashboardSp->detailDashboardSp)
                        <a href="/dashboard/kelola-dashboard-statistik-produksi/{{ $dashboardSp->id }}"
                            class="px-3 py-1 rounded-lg text-sm text-white bg-[#3B7BDB]"> Lihat Detail </a>
                        <a href="{{ route('filament.dashboard.sp.edit', ['id' => $dashboardSp->id]) }}">
                            <svg width="34" height="33" viewBox="0 0 34 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.3585 2.76562L30.4835 6.89062L27.3389 10.0366L23.2139 5.91163L26.3585 2.76562ZM11.25 21.9991H15.375L25.3946 11.9795L21.2696 7.8545L11.25 17.8741V21.9991Z"
                                    fill="#3B7BDB" />
                                <path
                                    d="M26.375 26.125H11.4672C11.4315 26.125 11.3944 26.1388 11.3586 26.1388C11.3133 26.1388 11.2679 26.1264 11.2211 26.125H7.125V6.875H16.5396L19.2896 4.125H7.125C5.60837 4.125 4.375 5.357 4.375 6.875V26.125C4.375 27.643 5.60837 28.875 7.125 28.875H26.375C27.1043 28.875 27.8038 28.5853 28.3195 28.0695C28.8353 27.5538 29.125 26.8543 29.125 26.125V14.2065L26.375 16.9565V26.125Z"
                                    fill="#3B7BDB" />
                            </svg>
                        </a>
                        <!-- Modal Hapus -->
                        <x-filament::modal id="confirm-delete-{{ $dashboardSp->id }}">
                            <x-slot name="trigger">
                                <x-filament::button color="red" style="padding: 0;"><svg width="34"
                                        height="33" viewBox="0 0 34 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.875 28.875C9.11875 28.875 8.47159 28.606 7.9335 28.0679C7.39542 27.5298 7.12592 26.8822 7.125 26.125V8.25C6.73542 8.25 6.40909 8.118 6.146 7.854C5.88292 7.59 5.75092 7.26367 5.75 6.875C5.74909 6.48633 5.88109 6.16 6.146 5.896C6.41092 5.632 6.73725 5.5 7.125 5.5H12.625C12.625 5.11042 12.757 4.78408 13.021 4.521C13.285 4.25792 13.6113 4.12592 14 4.125H19.5C19.8896 4.125 20.2164 4.257 20.4804 4.521C20.7444 4.785 20.8759 5.11133 20.875 5.5H26.375C26.7646 5.5 27.0914 5.632 27.3554 5.896C27.6194 6.16 27.7509 6.48633 27.75 6.875C27.7491 7.26367 27.6171 7.59046 27.354 7.85537C27.0909 8.12029 26.7646 8.25183 26.375 8.25V26.125C26.375 26.8813 26.106 27.5289 25.5679 28.0679C25.0298 28.6069 24.3822 28.8759 23.625 28.875H9.875ZM14 23.375C14.3896 23.375 14.7164 23.243 14.9804 22.979C15.2444 22.715 15.3759 22.3887 15.375 22V12.375C15.375 11.9854 15.243 11.6591 14.979 11.396C14.715 11.1329 14.3887 11.0009 14 11C13.6113 10.9991 13.285 11.1311 13.021 11.396C12.757 11.6609 12.625 11.9872 12.625 12.375V22C12.625 22.3896 12.757 22.7164 13.021 22.9804C13.285 23.2444 13.6113 23.3759 14 23.375ZM19.5 23.375C19.8896 23.375 20.2164 23.243 20.4804 22.979C20.7444 22.715 20.8759 22.3887 20.875 22V12.375C20.875 11.9854 20.743 11.6591 20.479 11.396C20.215 11.1329 19.8887 11.0009 19.5 11C19.1113 10.9991 18.785 11.1311 18.521 11.396C18.257 11.6609 18.125 11.9872 18.125 12.375V22C18.125 22.3896 18.257 22.7164 18.521 22.9804C18.785 23.2444 19.1113 23.3759 19.5 23.375Z"
                                            fill="#D4335D" />
                                    </svg></x-filament::button>
                            </x-slot>

                            <x-slot name="heading">
                                Hapus Statistik Produksi
                            </x-slot>

                            <x-slot name="footer">
                                <div class="flex justify-between">
                                    <x-filament::button color="gray"
                                        x-on:click="$dispatch('close-modal', { id: 'confirm-delete-{{ $dashboardSp->id }}' })">
                                        Batal
                                    </x-filament::button>

                                    <x-filament::button color="danger" wire:click="delete({{ $dashboardSp->id }})">
                                        Ya, Hapus
                                    </x-filament::button>
                                </div>
                            </x-slot>

                            <div class="">
                                Apakah Anda yakin ingin menghapus data <strong>{{ $dashboardSp->tahun }}</strong>?
                            </div>

                        </x-filament::modal>
                    @else
                        <a href="/dashboard/kelola-dashboard-statistik-produksi/{{ $dashboardSp->id }}/create"
                            class="px-3 py-1 rounded-lg text-sm text-white bg-[#3B7BDB]">
                            + Buat
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div
                class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                <div
                    class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                    <div class="fi-ta-empty-state px-6 py-12">
                        <div class="fi-ta-empty-state-content mx-auto grid max-w-lg justify-items-center text-center">
                            <div
                                class="fi-ta-empty-state-icon-ctn mb-4 rounded-full bg-gray-100 p-3 dark:bg-gray-500/20">
                                <svg class="fi-ta-empty-state-icon h-6 w-6 text-gray-500 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </div>

                            <h4
                                class="fi-ta-empty-state-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                Tidak ada data yang ditemukan
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
</x-filament-panels::page>
