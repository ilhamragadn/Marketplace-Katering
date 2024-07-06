<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    {{ __('Daftar Pesanan') }}
                </div>
                <div class="overflow-x-auto m-6">
                    <table class="min-w-full bg-gray-100 dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Produk</th>
                                <th class="px-4 py-2">Jumlah Porsi</th>
                                <th class="px-4 py-2">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataOrder as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $order->product->prod_title }}</td>
                                    <td class="border px-4 py-2">{{ $order->order_quantity }}</td>
                                    <td class="border px-4 py-2">Rp
                                        {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center">Tidak ada pesanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
