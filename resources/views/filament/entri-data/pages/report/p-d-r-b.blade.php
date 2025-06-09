<x-filament-panels::page>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($kategoris as $kategori)
            <div class="p-6 rounded-xl shadow border border-gray-200 gap-3 bg-white flex flex-col justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0 p-2 bg-blue-100 rounded-full">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                fill="#8FBFFA" />
                            <path
                                d="M1.75 14C1.75 17.2489 3.04062 20.3647 5.33794 22.6621C7.63526 24.9594 10.7511 26.25 14 26.25C17.2489 26.25 20.3647 24.9594 22.6621 22.6621C24.9594 20.3647 26.25 17.2489 26.25 14C26.25 10.7511 24.9594 7.63526 22.6621 5.33794C20.3647 3.04062 17.2489 1.75 14 1.75C10.7511 1.75 7.63526 3.04062 5.33794 5.33794C3.04062 7.63526 1.75 10.7511 1.75 14Z"
                                stroke="#2859C5" stroke-width="1.75" stroke-linejoin="round" />
                            <path
                                d="M8.75 14C8.75 10.7511 9.30312 7.63526 10.2877 5.33794C11.2723 3.04062 12.6076 1.75 14 1.75C15.3924 1.75 16.7277 3.04062 17.7123 5.33794C18.6969 7.63526 19.25 10.7511 19.25 14C19.25 17.2489 18.6969 20.3647 17.7123 22.6621C16.7277 24.9594 15.3924 26.25 14 26.25C12.6076 26.25 11.2723 24.9594 10.2877 22.6621C9.30312 20.3647 8.75 17.2489 8.75 14Z"
                                stroke="#2859C5" stroke-width="1.75" stroke-linejoin="round" />
                            <path d="M2.625 18.0834H25.375M2.625 9.91675H25.375" stroke="#2859C5" stroke-width="1.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-semibold">{{ $kategori->nama }}</h3>
                </div>

                <p class="mt-2 text-sm text-gray-500">Deskripsi: {{ $kategori->deskripsi ?? 'Tidak Ada' }}</p>

                <a
                href="/entri-data/reports/pdrb/{{ $kategori->url }}"
                    style="color: #3B7BDB; border: 2px solid #3B7BDB;"
                    class="mt-4 inline-block text-white px-4 py-2 rounded cursor-pointer text-center hover:bg-blue-700">
                    Info Selengkapnya
                </a>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
