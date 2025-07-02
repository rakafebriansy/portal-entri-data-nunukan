<button wire:click="toggleStatus({{ $record->id }})" class="px-3 py-1 rounded text-sm"
    style="{{ $record->status == 'selesai' ? 'background-color: #E1FFDA; color: #2EA70D; border: 1px solid #2EA70D;' : 'background-color: #FFD8E2; color: #D4335D; border: 1px solid #D4335D;' }}"
    >
    {{ $record->status === 'selesai' ? 'Selesai' : 'Belum Selesai' }}
</button>
