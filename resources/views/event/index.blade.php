<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Voluntrack Events') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 px-6">
        <a href="{{ route('event.create') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold mx-auto hover:bg-blue-500 transition duration-300 ml-4">
            Buat Event Baru
        </a>    
        <!-- Search Bar -->
        <div class="mb-8 flex justify-center">
            <form action="{{ route('event.index') }}" method="GET" class="w-full max-w-md">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search events..." class="w-full px-6 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" value="{{ request()->search }}">
                    <button type="submit" class="absolute top-0 right-0 px-4 py-3 bg-blue-600 text-white rounded-lg">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Header Section -->
        <div class="text-center mb-6">
            <h3 class="text-3xl font-semibold text-gray-800 dark:text-white">Explore Our Events</h3>
            <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">Join the most exciting and impactful events happening in your community!</p>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <a href="{{ route('event.show', $event->id_event) }}">
                    <!-- Event Image -->
                    <img src="{{ asset('storage/' . json_decode($event->event_image)[0]) }}" alt="{{ $event->nama }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-6">
                    <!-- Event Title -->
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        <a href="{{ route('event.show', $event->id_event) }}" class="hover:text-blue-600 dark:hover:text-blue-400">{{ $event->nama }}</a>
                    </h3>
                    <!-- Event Host -->
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Hosted by: <span class="font-medium text-blue-500">{{ $event->user->username }}</span></p>
                    <!-- Event Start and End Dates -->
                    <div class="flex justify-between mt-4">
                        <span class="text-gray-600 dark:text-gray-400 text-sm">Start: {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</span>
                        <span class="text-gray-600 dark:text-gray-400 text-sm">End: {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}</span>
                    </div>
                    <!-- Event Location -->
                    <p class="mt-4 text-gray-600 dark:text-gray-400 text-sm">Location: <span class="font-medium text-blue-500">{{ $event->lokasi }}</span></p>
                    <!-- Event Description (Limited) -->
                    <p class="mt-4 text-gray-600 dark:text-gray-400 text-sm">{{ Str::limit(strip_tags($event->event_detail), 100) }}</p>

                    <!-- Event Actions -->

                    @if (auth()->id() === $event->host)
                        <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('event.show', $event->id_event) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-500">View Details</a>
                        <div class="flex space-x-3">
                            <a href="{{ route('event.edit', $event->id_event) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-500">Edit</a>
                            <form action="{{ route('event.destroy', $event->id_event) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-500">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
            @endforeach
        </div>

        
    </div>
</x-app-layout>
