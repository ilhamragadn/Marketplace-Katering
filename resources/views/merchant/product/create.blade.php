<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <form action="{{ route('merchant-product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-4 mx-8">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-2">
                                <x-input-label for="prod_title" :value="__('Nama Menu')" />
                                <x-text-input id="prod_title" class="block mt-1 w-full" type="text" name="prod_title"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('prod_title')" class="mt-2" />
                            </div>
                            <div class="mb-2">
                                <x-input-label for="prod_description" :value="__('Deskripsi Menu')" />
                                <x-textarea-input id="prod_description" class="block mt-1 w-full"
                                    name="prod_description" required />
                                <x-input-error :messages="$errors->get('prod_description')" class="mt-2" />
                            </div>
                            <div class="mb-2 flex flex-row">
                                <div class="flex-1 mr-1">
                                    <x-input-label for="prod_price" :value="__('Harga Per Porsi')" />
                                    <x-text-input id="prod_price" class="block mt-1 w-full" type="text"
                                        name="prod_price" required />
                                    <x-input-error :messages="$errors->get('prod_price')" class="mt-2" />
                                </div>
                                <div class="flex-1 ml-1">
                                    <x-input-label for="prod_image" :value="__('Foto Menu')" />
                                    <x-text-input id="prod_image" class="block mt-1 p-1.5 w-full border" type="file"
                                        name="prod_image" required />
                                    <x-input-error :messages="$errors->get('prod_image')" class="mt-2" />
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
        const prod_price = document.getElementById("prod_price");

        function formatHarga(e) {
            let harga = e.value;
            let newHarga = new Intl.NumberFormat('id-ID', {
                style: "currency",
                currency: "IDR",
                maximumFractionDigits: 0,
                minimumFractionDigits: 0,
            }).format(harga);
            e.value = newHarga;
        }
        formatHarga(prod_price);


        function formatAngkaRibuan(inputElement) {
            inputElement.addEventListener('input', function() {
                let valueInput = inputElement.value;
                valueInput = valueInput.replace(/[^\d]/g, '');
                const formatValue = parseInt(valueInput);

                if (!isNaN(formatValue)) {
                    const formatInput = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                        maximumFractionDigits: 0,
                        minimumFractionDigits: 0,
                    }).format(formatValue);
                    inputElement.value = formatInput;
                } else {
                    inputElement.value = 'Rp 0';
                }
            });
        }

        formatAngkaRibuan(prod_price);
    })
</script>
