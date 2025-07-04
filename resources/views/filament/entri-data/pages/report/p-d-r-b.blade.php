<x-filament-panels::page>
    <div x-id="['input']" class="fi-ta-search-field">
        <label x-bind:for="$id('input')" class="sr-only" for="input-1">
            Cari
        </label>

        <div
            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500">
            <div class="fi-input-wrp-prefix items-center gap-x-3 ps-3 flex pe-2">

                <svg style=";" wire:loading.remove.delay.default="1" wire:target="tableSearch"
                    class="fi-input-wrp-icon h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
                        clip-rule="evenodd"></path>
                </svg>

                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="animate-spin fi-input-wrp-icon h-5 w-5 text-gray-400 dark:text-gray-500"
                    wire:loading.delay.default="" wire:target="tableSearch">
                    <path clip-rule="evenodd"
                        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                </svg>

            </div>


            <div class="fi-input-wrp-input min-w-0 flex-1">
                <input
                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-0 pe-3"
                    autocomplete="off" maxlength="1000" placeholder="Cari" type="search"
                    wire:key="pdrb123.table.tableSearch.field.input"
                    placeholder="Cari kategori..." wire:model.live.debounce.200ms="search"
                    x-on:keyup="if ($event.key === 'Enter') { $wire.$refresh() }" id="input-1">
            </div>
        </div>
    </div>
    <div 
    @class([
        'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6' => count($this->filteredKategoris) > 0, 
    ])>
        @forelse ($this->filteredKategoris as $index => $kategori)
            @php
                $cardStyle =
                    $index % 3 == 0
                        ? 'background-color: #17A2B7;'
                        : ($index % 3 == 1
                            ? 'background-color: #27A844;'
                            : 'background-color: #DC3546;');
                $buttonStyle =
                    $index % 3 == 0
                        ? 'background-color: #1491A5;'
                        : ($index % 3 == 1
                            ? 'background-color: #24963E;'
                            : 'background-color: #C62F3E;');
            @endphp
            <div style="{{ $cardStyle }} overflow:hidden;"
                class="rounded-xl text-white shadow border border-gray-200 gap-3 flex flex-col justify-between">
                <div class="p-3">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-full">
                            @if ($index % 3 == 0)
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        fill="#5CCEE0" />
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        stroke="#1491A5" stroke-width="1.75" stroke-linejoin="round" />
                                    <path
                                        d="M8.75 14C8.75 10.7511 9.30312 7.63526 10.2877 5.33794C11.2723 3.04062 12.6076 1.75 14 1.75C15.3924 1.75 16.7277 3.04062 17.7123 5.33794C18.6969 7.63526 19.25 10.7511 19.25 14C19.25 17.2489 18.6969 20.3647 17.7123 22.6621C16.7277 24.9594 15.3924 26.25 14 26.25C12.6076 26.25 11.2723 24.9594 10.2877 22.6621C9.30312 20.3647 8.75 17.2489 8.75 14Z"
                                        stroke="#1491A5" stroke-width="1.75" stroke-linejoin="round" />
                                    <path d="M2.625 18.0837H25.375M2.625 9.91699H25.375" stroke="#1491A5"
                                        stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @elseif ($index % 3 == 1)
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        fill="#5AD284" />
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        stroke="#24963E" stroke-width="1.75" stroke-linejoin="round" />
                                    <path
                                        d="M8.75 14C8.75 10.7511 9.30312 7.63526 10.2877 5.33794C11.2723 3.04062 12.6076 1.75 14 1.75C15.3924 1.75 16.7277 3.04062 17.7123 5.33794C18.6969 7.63526 19.25 10.7511 19.25 14C19.25 17.2489 18.6969 20.3647 17.7123 22.6621C16.7277 24.9594 15.3924 26.25 14 26.25C12.6076 26.25 11.2723 24.9594 10.2877 22.6621C9.30312 20.3647 8.75 17.2489 8.75 14Z"
                                        stroke="#24963E" stroke-width="1.75" stroke-linejoin="round" />
                                    <path d="M2.625 18.0837H25.375M2.625 9.91699H25.375" stroke="#24963E"
                                        stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @elseif ($index % 3 == 2)
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        fill="#F46D7A" />
                                    <path
                                        d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                        stroke="#C62F3E" stroke-width="1.75" stroke-linejoin="round" />
                                    <path
                                        d="M8.75 14C8.75 10.7511 9.30312 7.63526 10.2877 5.33794C11.2723 3.04062 12.6076 1.75 14 1.75C15.3924 1.75 16.7277 3.04062 17.7123 5.33794C18.6969 7.63526 19.25 10.7511 19.25 14C19.25 17.2489 18.6969 20.3647 17.7123 22.6621C16.7277 24.9594 15.3924 26.25 14 26.25C12.6076 26.25 11.2723 24.9594 10.2877 22.6621C9.30312 20.3647 8.75 17.2489 8.75 14Z"
                                        stroke="#C62F3E" stroke-width="1.75" stroke-linejoin="round" />
                                    <path d="M2.625 18.0837H25.375M2.625 9.91699H25.375" stroke="#C62F3E"
                                        stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif
                        </div>

                        <h3 class="text-lg font-semibold">{{ $kategori->nama }}</h3>
                    </div>

                    <div style="height: 4rem; overflow-y: autoo;">
                        <p class="mt-2 text-sm">Deskripsi: {{ $kategori->deskripsi ?? 'Tidak Ada' }}</p>
                    </div>
                </div>

                <a href="/entri-data/reports/pdrb/{{ $this->normalizeKategoriSp($kategori->nama) }}"
                    style="{{ $buttonStyle }}"
                    class="inline-block text-xs text-white p-4 font-light rounded cursor-pointer text-center hover:bg-blue-700">
                    Info Selengkapnya
                </a>
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
