<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Welcome to Dashboard, ') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-blue-800">Manajemen Program</h3>

                    <form action="{{ route('programs.store') }}" method="POST" class="mb-8 p-4 border rounded-lg">
                        @csrf
                        <h4 class="text-lg font-semibold mb-2">Tambah Program Baru</h4>
                        <div class="space-y-4">
                            <div>
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" name="nama_kelas" id="nama_kelas" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label for="harga_baru">Harga (contoh: 650000)</label>
                                <input type="number" name="harga_baru" id="harga_baru" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label for="fitur">Fitur (satu per baris)</label>
                                <textarea name="fitur" id="fitur" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                            </div>
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Tambah Program</button>
                        </div>
                    </form>

                    <h4 class="text-lg font-semibold mb-2">Daftar Program</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($programs as $index => $program)
                                <tr>
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $program->nama_kelas }}</td>
                                    <td class="px-6 py-4">Rp{{ number_format($program->harga_baru) }}</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('programs.edit', $program) }}" class="bg-blue-500 text-white py-1 px-3 rounded text-sm">Edit</a>
                                        <form action="{{ route('programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-yellow-500 text-white py-1 px-3 rounded text-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">Tidak ada data program.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-blue-800">Manajemen Testimoni</h3>

                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 p-4 border rounded-lg">
                        @csrf
                        <h4 class="text-lg font-semibold mb-2">Tambah Testimoni Baru</h4>
                         <div>
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="w-full" required>
                        </div>
                        <button type="submit" class="mt-4 bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Tambah Testimoni</button>
                    </form>

                    <h4 class="text-lg font-semibold mb-2">Daftar Testimoni</h4>
                    <div class="overflow-x-auto">
                       <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                 @forelse($testimonials as $index => $testimonial)
                                 <tr>
                                     <td class="px-6 py-4">{{ $index + 1 }}</td>
                                     <td class="px-6 py-4">
                                         <img src="{{ asset('storage/' . $testimonial->gambar) }}" alt="Testimoni" class="h-16 w-auto rounded">
                                     </td>
                                     <td class="px-6 py-4">
                                        <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-yellow-500 text-white py-1 px-3 rounded text-sm">Hapus</button>
                                        </form>
                                     </td>
                                 </tr>
                                 @empty
                                 <tr>
                                    <td colspan="3" class="text-center py-4">Tidak ada data testimoni.</td>
                                 </tr>
                                 @endforelse
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>