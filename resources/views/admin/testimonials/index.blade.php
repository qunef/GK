<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Testimoni</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('testimonials.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Testimoni</a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
                @endif

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @forelse($testimonials as $testimonial)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $testimonial->gambar) }}" alt="Testimoni" class="w-full h-auto rounded-lg shadow-md">
                            <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?');" class="absolute top-1 right-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded-full p-1 text-xs">❌</button>
                            </form>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500">Belum ada testimoni.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>