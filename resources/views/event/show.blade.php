<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="container px-40 py-12 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Event Image -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <div class="p-4">
                    @foreach (json_decode($event->event_image) as $image)
                        <img src="{{ asset('storage/' . $image) }}" class="w-full rounded-lg" alt="Event Image">
                    @endforeach
                </div>
            </div>

            <!-- Event Details -->
            <div class="md:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <div class="p-6">
                    <h3 class="text-3xl font-semibold text-gray-800 dark:text-white">{{ $event->nama }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $event->tags }}</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}</p>
                    <hr class="my-4 border-gray-300 dark:border-gray-700">
                    <p class="text-xl font-semibold text-gray-800 dark:text-white">{{ "Rp " . number_format($event->target_donasi,2,',','.') }}</p>

                    <div class="mt-4 text-gray-600 dark:text-gray-400">
                        <h4 class="font-semibold">Event Details</h4>
                        {!! $event->event_detail !!}
                    </div>

                    <div class="mt-4 text-gray-600 dark:text-gray-400">
                        <h4 class="font-semibold">Requirements</h4>
                        {!! $event->requirement !!}
                    </div>

                    <hr class="my-4 border-gray-300 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Location: <span class="font-medium text-blue-500">{{ $event->lokasi }}</span></p>

                    <div class="mt-6">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Volunteers</h4>
                        <ol class="list-inside list-decimal">
                            @foreach ($relawans as $relawan)
                                <li class="text-gray-600 dark:text-gray-400">{{ $relawan->nama_lengkap }}</li>
                            @endforeach
                        </ol>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('relawan.daftar', ['event' => $event->id_event]) }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-500 transition duration-300">
                            Daftar sebagai Relawan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
