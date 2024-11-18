<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ALL topic') }}
        </h2>
    </x-slot>

    <div class="container px-4 sm:px-8 py-12">
        <a href="{{ route('topic.create') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-500 transition duration-300 ml-4">
            Buat Topic Baru
        </a>    
        <!-- Pencarian -->
        <form action="{{ route('topic.index') }}" method="GET" class="mb-8">
            <div class="flex justify-center items-center space-x-2">
                <input type="text" name="search" class="w-full sm:w-1/2 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-800 dark:text-white"
                    placeholder="Cari topik..." value="{{ request()->search }}">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-500 transition">Cari</button>
            </div>
        </form>

        <!-- Hasil Pencarian -->
        @if(request()->search)
            <div class="text-center mb-4">
                <h4 class="text-xl font-semibold">Hasil Pencarian: "{{ request()->search }}"</h4>
            </div>
        @endif

        <!-- Heading -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Daftar Topik</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Temukan diskusi terbaru dan ikuti percakapan menarik</p>
        </div>

        <!-- Daftar Topik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($data as $topic)
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <a href="{{ route('topic.show', $topic->id) }}">
                        <img src="{{ asset('storage/' . $topic->topic_img) }}" alt="{{ $topic->judul_topic }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            <a href="{{ route('topic.show', $topic->id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">{{ $topic->judul_topic }}</a>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($topic->isi_topic, 150) }}</p>
                        <div class="flex items-center space-x-3 text-sm text-gray-500 dark:text-gray-300">
                            <span>Author: <span class="font-medium text-blue-500">{{ $topic->author->name }}</span></span>
                            <span class="text-gray-400">|</span>
                            <span>{{ \Carbon\Carbon::parse($topic->tanggal_dibuat)->diffForHumans() }}</span>
                        </div>
                    </div>
                    @if (auth()->id() === $topic->author_id)
                        <a href="{{ route('topic.edit', $topic->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                            Edit
                        </a>
                        <form action="{{ route('topic.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus topic ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Hapus
                            </button>
                        </form>
                    @endif
                    
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-6">
            {{ $data->links('vendor.pagination.tailwind') }}
        </div> --}}

        <!-- Button to Create Topic -->
        <div class="mt-6 text-center">
            <a href="{{ route('topic.create') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-blue-500 transition">Buat Topik Baru</a>
        </div>
    </div>
</x-app-layout>
