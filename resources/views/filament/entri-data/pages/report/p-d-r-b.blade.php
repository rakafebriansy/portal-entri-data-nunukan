<x-filament-panels::page>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($kategoris as $index => $kategori)
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
                        <div class="flex-shrink-0 p-2 bg-blue-100 rounded-full">
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

                <a href="/entri-data/reports/pdrb/{{ $this->normalizeKategoriSp($kategori->nama) }}" style="{{ $buttonStyle }}"
                    class="inline-block text-xs text-white p-4 font-light rounded cursor-pointer text-center hover:bg-blue-700">
                    Info Selengkapnya
                </a>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
