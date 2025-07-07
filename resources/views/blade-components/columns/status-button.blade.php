<div class="relative inline-block px-3 py-3.5">
    <button
        wire:click="toggleStatus({{ $record->id }})"
        wire:loading.remove
        wire:target="toggleStatus"
        class="px-3 py-1 rounded text-sm transition-opacity duration-200"
        style="{{ $record->status == 'selesai'
            ? 'background-color: #E1FFDA; color: #2EA70D; border: 1px solid #2EA70D;'
            : 'background-color: #FFD8E2; color: #D4335D; border: 1px solid #D4335D;' }}"
    >
        {{ $record->status === 'selesai' ? 'Selesai' : 'Belum Selesai' }}
    </button>

    <div
        wire:loading
        wire:target="toggleStatus"
        class="flex items-center justify-center border-none text-sm"
        style="min-width: 80px;"
    >
        <svg class="w-4 h-4 mr-2 animate-spin text-gray-600" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </div>
</div>
