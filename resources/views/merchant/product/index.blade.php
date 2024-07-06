<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="flex-1">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Menu') }}
                </h2>
            </div>

            <a href="{{ route('merchant-product.create') }}" class="bg-green-500 p-2 rounded-lg text-white text-sm">
                Tambah Menu
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <h3 class="text-center font-semibold">Daftar Menu</h3>
                </div>
                <div class="flex justify-center items-center pb-6">
                    <div class="grid grid-cols-5 gap-2 mx-6">
                        @forelse ($dataProduct as $product)
                            <a href="{{ route('merchant-product.show', $product->id) }}">
                                <div
                                    class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <img class="rounded-t-lg h-56" src="{{ asset($product->prod_image) }}"
                                        alt="prod-img">
                                    <div class="mx-2 my-1">
                                        <p class="text-sm overflow-hidden whitespace-nowrap text-ellipsis">
                                            {{ $product->prod_description }}
                                        </p>
                                        <p class="my-1 font-semibold text-lg">Rp
                                            {{ number_format($product->prod_price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div
                                class="col-span-5 flex items-center justify-center p-4 text-gray-900 dark:text-gray-100">
                                <h3 class="text-center">Menu Kosong</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
