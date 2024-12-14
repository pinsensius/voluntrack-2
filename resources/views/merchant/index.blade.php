<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merchant') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('merchant.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Tambah Item</a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $item)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                    <img class="w-full h-48 object-cover rounded-t-lg" src="{{ asset('storage/'.$item->gambar_barang) }}" alt="{{ $item->nama_barang }}">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $item->nama_barang }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">Harga: Rp {{ number_format($item->harga_barang, 0, ',', '.') }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Stok: {{ $item->stok }}</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('merchant.show', $item->id) }}" class="text-blue-500 hover:text-blue-600">Lihat</a>
                        <a href="{{ route('merchant.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                        <form action="{{ route('merchant.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
