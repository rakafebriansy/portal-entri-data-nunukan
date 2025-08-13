{{-- <x-filament-panels::page>
    <div class="flex flex-col gap-6">
        @forelse ($reportSps as $reportSp)
            <div class="bg-white rounded-xl justify-between flex p-5 shadow border items-center">
                <div class="">
                    <h3 class="text-lg font-semibold">{{ $reportSp->tahun }}</h3>
                    <p class="text-sm text-gray-500">{{ $reportSp->deskripsi }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ $reportSp->url }}" class="px-3 py-1 rounded text-sm text-[#3B7BDB]"
                        style="border: 1px solid #3B7BDB;">
                        Lihat Excel
                    </a>
                    <button wire:click="toggleStatus({{ $reportSp->id }})" class="px-3 py-1 rounded text-sm"
                        style="{{ $reportSp->status == 'selesai' ? 'background-color: #E1FFDA; color: #2EA70D; border: 1px solid #2EA70D;' : 'background-color: #FFD8E2; color: #D4335D; border: 1px solid #D4335D;' }}">
                        {{ $reportSp->status === 'selesai' ? 'Selesai' : 'Belum Selesai' }}
                    </button>
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
</x-filament-panels::page> --}}
