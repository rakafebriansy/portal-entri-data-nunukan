@props(['id', 'names', 'options'])

<div class="space-y-2">
    @for ($i = 0; $i < count($options); $i++)
        <div class="text-sm">
            <label>Jenis</label>
            <input type="text" disabled value="{{ $names[$i] }}"
                class="mt-1 mb-5 block w-full border-gray-300 rounded-md shadow-sm" />
            <input type="hidden" wire:model.fill="formData.{{ $id }}{{ $i + 1 }}" value="{{ $options[$i] }}">
        </div>
    @endfor
</div>
