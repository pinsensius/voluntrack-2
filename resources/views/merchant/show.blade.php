<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Item') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <div class="flex items-center mb-4">
            <img class="w-32 h-32 object-cover rounded-md" src="{{ asset('storage/'.$item->gambar_barang) }}" alt="{{ $item->nama_barang }}">
            <div class="ml-4">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $item->nama_barang }}</h3>
                <p class="text-gray-600 dark:text-gray-400">Harga: Rp {{ $item->harga_barang}}</p>
                <p class="text-gray-600 dark:text-gray-400">Stok: {{ $item->stok }}</p>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('merchant.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-gray-600">Kembali</a>
        </div>
    </div>
</x-app-layout>
