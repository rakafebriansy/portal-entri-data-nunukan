<x-filament-widgets::widget>
    <x-filament::section>
        <div class="w-full overflow-x-auto max-h-[200px]">
            <h2 class="text-lg font-bold mb-2">Tabel PDRB Pengeluaran</h2>

            <div class="rounded-lg overflow-hidden">
                <table class="w-full border-collapse text-sm">
                <thead class="bg-[#3B7BDB] text-white">
                    <tr>
                        <th class="py-2 px-4 text-left">Tabel PDRB Pengeluaran</th>
                        <th class="py-2 px-4 text-right">ADHB</th>
                        <th class="py-2 px-4 text-right">ADHK</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->rows as $row)
                        <tr>
                            <td class="py-2 px-4">{{ $row['komp'] }}</td>
                            <td class="py-2 px-4 text-right">
                                {{ number_format($row['adhb'], 0, ',', '.') }}</td>
                            <td class="py-2 px-4 text-right">
                                {{ number_format($row['adhk'], 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-2 px-4 text-center text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
