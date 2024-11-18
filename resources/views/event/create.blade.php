<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Event Baru') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-white-800 py-12 px-6">
        <div class="max-w-3xl mx-auto bg-gray-700 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-100 mb-6">Buat Event Baru</h2>
            
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Host ID (Auto set to Auth User) -->
                <div class="mb-4">
                    <input type="hidden" name="host" value="{{ auth()->id() }}">
                </div>

                <!-- Nama Event -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-200">Nama Event</label>
                    <input type="text" name="nama" id="nama" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('nama') border-red-500 @enderror" placeholder="Masukkan nama event" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tags -->
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-200">Tags</label>
                    <select name="tags" id="tags" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('tags') border-red-500 @enderror">
                        <option value="kemanusiaan">Kemanusiaan</option>
                        <option value="lingkungan">Lingkungan</option>
                        <option value="olahraga">Olahraga</option>
                    </select>
                </div>

                <!-- Lokasi -->
                <div class="mb-4">
                    <label for="lokasi" class="block text-sm font-medium text-gray-200">Lokasi Event</label>
                    <input type="text" name="lokasi" id="lokasi" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('lokasi') border-red-500 @enderror" placeholder="Masukkan lokasi event" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Mulai -->
                <div class="mb-4">
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-200">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('tanggal_mulai') border-red-500 @enderror" value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div class="mb-4">
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-200">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('tanggal_selesai') border-red-500 @enderror" value="{{ old('tanggal_selesai') }}">
                    @error('tanggal_selesai')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Event Image -->
                <div class="mb-4">
                    <label for="event_image" class="block text-sm font-medium text-gray-200">Upload Gambar Event</label>
                    <input type="file" name="event_image[]" id="event_image" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('event_image') border-red-500 @enderror" multiple>
                    @error('event_image')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Detail Event -->
                <div class="mb-4">
                    <label for="event_detail" class="block text-sm font-medium text-gray-200">Detail Event</label>
                    <textarea name="event_detail" id="event_detail" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('event_detail') border-red-500 @enderror" rows="5" placeholder="Masukkan detail event">{{ old('event_detail') }}</textarea>
                    @error('event_detail')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Requirements -->
                <div class="mb-4">
                    <label for="requirement" class="block text-sm font-medium text-gray-200">Kebutuhan Event</label>
                    <textarea name="requirement" id="requirement" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('requirement') border-red-500 @enderror" rows="5" placeholder="Masukkan kebutuhan event">{{ old('requirement') }}</textarea>
                    @error('requirement')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Target Donasi -->
                <div class="mb-4">
                    <label for="target_donasi" class="block text-sm font-medium text-gray-200">Target Donasi</label>
                    <input type="number" name="target_donasi" id="target_donasi" class="mt-1 block w-full px-4 py-2 text-gray-800 bg-gray-200 rounded-md @error('target_donasi') border-red-500 @enderror" placeholder="Masukkan target donasi" value="{{ old('target_donasi') }}">
                    @error('target_donasi')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Simpan Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
