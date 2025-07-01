<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Testimoni Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="gambar" class="block font-medium text-sm text-gray-700">Pilih Gambar Testimoni</label>
                        <input id="gambar" type="file" name="gambar" class="block mt-1 w-full" required>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>