<x-filament-widgets::widget>
    <x-filament::section>
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-bold mb-2">{{ $this->getHeading() }}</h2>
            {{ $this->chart() }}
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
