<x-filament::page>
    <div class="flex flex-col gap-6">
        @foreach ($reportSps as $reportSp)
            <div class="bg-white rounded-xl justify-between flex p-5 shadow border items-center">
                <div class="">
                    <h3 class="text-lg font-semibold">{{ $reportSp->tahun }}</h3>
                    <p class="text-sm text-gray-500">{{ $reportSp->deskripsi }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ $reportSp->url}}" class="px-3 py-1 rounded text-sm text-[#3B7BDB]"
                        style="border: 1px solid #3B7BDB;">
                        Lihat Excel
                    </a>
                    <button wire:click="toggleStatus({{ $reportSp->id }})" class="px-3 py-1 rounded text-sm"
                        style="{{ $reportSp->status == 'selesai' ? 'background-color: #E1FFDA; color: #2EA70D; border: 1px solid #2EA70D;' : 'background-color: #FFD8E2; color: #D4335D; border: 1px solid #D4335D;' }}">
                        {{ $reportSp->status === 'selesai' ? 'Selesai' : 'Belum Selesai' }}
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
