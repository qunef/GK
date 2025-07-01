<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Program Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('programs.store') }}">
                        @csrf

                        <div>
                            <label for="nama_kelas" class="block font-medium text-sm text-gray-700">Nama Kelas</label>
                            <input id="nama_kelas" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="nama_kelas" value="{{ old('nama_kelas') }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="fitur" class="block font-medium text-sm text-gray-700">Fitur (satu fitur per baris)</label>
                            <textarea id="fitur" name="fitur" rows="8" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('fitur') }}</textarea>
                        </div>
                        
                        <div class="mt-4">
                            <label for="harga_baru" class="block font-medium text-sm text-gray-700">Harga Baru (hanya angka, cth: 650000)</label>
                            <input id="harga_baru" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="harga_baru" value="{{ old('harga_baru') }}" required />
                        </div>
                        
                        <div class="mt-4">
                            <label for="harga_lama" class="block font-medium text-sm text-gray-700">Harga Lama (Coret - opsional)</label>
                            <input id="harga_lama" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="harga_lama" value="{{ old('harga_lama') }}" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan Program
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>