<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <form action="{{ route('customer-order.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-4 mx-8">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="prod_id" value="{{ $dataProduct->id }}">
                            <div class="grid grid-cols-2 m-6">
                                <div class="flex justify-center items-center mr-2">
                                    <img src="{{ asset($dataProduct->prod_image) }}" alt="prod-img"
                                        class="rounded-lg h-80">
                                </div>
                                <div class="flex flex-col justify-center ml-2">
                                    <div class="mb-2">
                                        <x-input-label for="prod_title" :value="__('Nama Menu')" />
                                        <x-text-input id="prod_title" class="block mt-1 w-full"
                                            value="{{ $dataProduct->prod_title }}" readOnly />
                                    </div>
                                    <div class="mb-2">
                                        <x-input-label for="prod_description" :value="__('Deskripsi Menu')" />
                                        <x-text-input id="prod_description" class="block mt-1 w-full"
                                            value="{{ $dataProduct->prod_description }}" readOnly />
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="flex-1 mb-2 mr-2">
                                            <x-input-label for="prod_price" :value="__('Harga Per Porsi')" />
                                            <x-text-input id="prod_price" class="block mt-1 w-full"
                                                value="Rp {{ number_format($dataProduct->prod_price, 0, ',', '.') }}"
                                                readOnly />
                                        </div>
                                        <div class="flex-1 mb-2 ml-2">
                                            <x-input-label for="order_quantity" :value="__('Jumlah Porsi')" />
                                            <x-text-input id="order_quantity" class="block mt-1 w-full" type="number"
                                                name="order_quantity" required />
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <x-input-label for="delivery_date" :value="__('Tanggal Pengiriman')" />
                                        <x-text-input id="delivery_date" class="block mt-1 w-full" type="date"
                                            name="delivery_date" required />
                                    </div>
                                    <div class="mb-2">
                                        <x-input-label for="total_price" :value="__('Total')" />
                                        <x-text-input id="total_price" class="block mt-1 w-full" type="text"
                                            name="total_price" required readOnly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mb-6">
                            <button type="submit"
                                class="mr-2 bg-green-500 px-4 py-2 rounded-lg text-white text-sm">Simpan</button>
                            <x-primary-button onclick="window.history.back()" class="mr-8">
                                {{ __('Kembali') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prodPriceElement = document.getElementById("prod_price");
        const orderQtyElement = document.getElementById("order_quantity");
        const totalPriceElement = document.getElementById("total_price");

        function updateTotalPrice() {
            const prodPrice = parseInt(prodPriceElement.value.replace(/[^\d]/g,
                '')); // Mengambil nilai harga tanpa format
            const orderQty = parseInt(orderQtyElement.value) || 0; // Jika kosong, anggap 0

            const total = prodPrice * orderQty;
            totalPriceElement.value = 'Rp ' + total.toLocaleString('id-ID'); // Format ke dalam Rupiah
        }

        orderQtyElement.addEventListener('input',
            updateTotalPrice); // Update total harga saat jumlah porsi diubah
    });
</script>
