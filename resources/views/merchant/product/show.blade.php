<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 m-6">
                    <div class="flex justify-center items-center mr-2">
                        <img src="{{ asset($dataProduct->prod_image) }}" alt="prod-img" class="rounded-lg h-80">
                    </div>
                    <div class="flex flex-col justify-center ml-2">
                        <div class="mb-2">
                            <x-input-label for="prod_title" :value="__('Nama Menu')" />
                            <x-text-input id="prod_title" class="block mt-1 w-full" type="text" name="prod_title"
                                value="{{ $dataProduct->prod_title }}" readOnly />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="prod_description" :value="__('Deskripsi Menu')" />
                            <x-text-input id="prod_description" class="block mt-1 w-full" name="prod_description"
                                value="{{ $dataProduct->prod_description }}" readOnly />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="prod_price" :value="__('Harga Per Porsi')" />
                            <x-text-input id="prod_price" class="block mt-1 w-full" type="text" name="prod_price"
                                value="Rp {{ number_format($dataProduct->prod_price, 0, ',', '.') }}" readOnly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
