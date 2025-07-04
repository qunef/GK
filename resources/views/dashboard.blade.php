<x-app-layout>
    {{-- Notifikasi akan muncul di sini --}}
    <div id="notification" class="hidden fixed top-20 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg z-50 transition-transform transform translate-x-full"></div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- =============================================== --}}
            {{--               MANAJEMEN PROGRAM                --}}
            {{-- =============================================== --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-blue-800">Manajemen Program</h3>
                    
                    {{-- Form Tambah Program --}}
                    <form id="form-tambah-program" class="mb-8 p-4 border rounded-lg bg-gray-50">
                        @csrf
                        <h4 class="text-lg font-semibold mb-2">Tambah/Edit Program</h4>
                        <input type="hidden" id="program_id" name="program_id">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" class="border-gray-300 rounded-md" required>
                            <input type="number" id="harga_baru" name="harga_baru" placeholder="Harga Baru (cth: 650000)" class="border-gray-300 rounded-md" required>
                            <input type="number" id="harga_lama" name="harga_lama" placeholder="Harga Lama (Opsional)" class="border-gray-300 rounded-md">
                            <textarea id="fitur" name="fitur" rows="4" placeholder="Fitur (satu per baris)" class="md:col-span-2 border-gray-300 rounded-md" required></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" id="btn-submit-program" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Tambah Program</button>
                            <button type="button" id="btn-cancel-edit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 hidden">Batal Edit</button>
                        </div>
                    </form>

                    {{-- Tabel Daftar Program --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left">Nama Kelas</th>
                                    <th class="px-4 py-2 text-left">Harga</th>
                                    <th class="px-4 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="program-table-body">
                                @foreach($programs as $program)
                                <tr id="program-row-{{ $program->id }}">
                                    <td class="border px-4 py-2 nama-kelas-text">{{ $program->nama_kelas }}</td>
                                    <td class="border px-4 py-2 harga-baru-text">Rp{{ number_format($program->harga_baru) }}</td>
                                    <td class="border px-4 py-2 flex gap-2">
                                        <button class="btn-edit-program bg-yellow-500 text-white py-1 px-3 rounded text-sm" data-id="{{ $program->id }}">Edit</button>
                                        <button class="btn-delete-program bg-red-500 text-white py-1 px-3 rounded text-sm" data-id="{{ $program->id }}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- =============================================== --}}
            {{--              MANAJEMEN TESTIMONI               --}}
            {{-- =============================================== --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-blue-800">Manajemen Testimoni</h3>

                    {{-- Form Tambah Testimoni --}}
                    <form id="form-tambah-testimoni" enctype="multipart/form-data" class="mb-8 p-4 border rounded-lg bg-gray-50">
                        @csrf
                        <h4 class="text-lg font-semibold mb-2">Tambah Testimoni Baru</h4>
                        <input type="file" name="gambar" class="w-full border p-2 rounded-md" required>
                        <button type="submit" class="mt-4 bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Upload Testimoni</button>
                    </form>
                    
                    {{-- Galeri Testimoni --}}
                    <div id="testimonial-gallery" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach($testimonials as $testimonial)
                        <div id="testimonial-card-{{ $testimonial->id }}" class="relative group">
                            <img src="{{ asset('storage/' . $testimonial->gambar) }}" class="rounded-lg shadow-md w-full h-auto">
                            <button class="btn-delete-testimoni absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity" data-id="{{ $testimonial->id }}">X</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

{{-- =============================================== --}}
{{--              BAGIAN JAVASCRIPT                 --}}
{{-- =============================================== --}}
@push('scripts')
<script>
$(document).ready(function() {
    
    // SETUP CSRF TOKEN
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // FUNGSI NOTIFIKASI
    function showNotification(message, isSuccess = true) {
        $('#notification').text(message)
            .removeClass(isSuccess ? 'bg-red-500' : 'bg-green-500')
            .addClass(isSuccess ? 'bg-green-500' : 'bg-red-500')
            .removeClass('translate-x-full')
            .fadeIn();
        setTimeout(() => {
            $('#notification').addClass('translate-x-full').fadeOut();
        }, 3000);
    }

    // ===================================
    // ========== CRUD PROGRAM ===========
    // ===================================

    // SUBMIT FORM (CREATE & UPDATE)
    $('#form-tambah-program').on('submit', function(e) {
        e.preventDefault();
        let programId = $('#program_id').val();
        let url = programId ? `/admin/programs/${programId}` : "{{ route('programs.store') }}";
        let method = programId ? 'PUT' : 'POST';

        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function(response) {
                showNotification(response.message);
                
                // Refresh halaman untuk cara termudah (atau DOM manipulation untuk advanced)
                location.reload(); 
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = "Terjadi kesalahan:\n";
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + "\n";
                });
                showNotification(errorMessage, false);
            }
        });
    });

    // TOMBOL EDIT
    $(document).on('click', '.btn-edit-program', function() {
        let id = $(this).data('id');
        
        // Ambil data program dari server untuk mengisi form
        $.get(`/admin/programs/${id}/edit`, function(data) {
            $('#program_id').val(data.id);
            $('#nama_kelas').val(data.nama_kelas);
            $('#harga_baru').val(data.harga_baru);
            $('#harga_lama').val(data.harga_lama);
            $('#fitur').val(JSON.parse(data.fitur).join('\n'));

            $('#btn-submit-program').text('Update Program');
            $('#btn-cancel-edit').removeClass('hidden');
            
            // Scroll ke atas ke arah form
            $('html, body').animate({ scrollTop: $('#form-tambah-program').offset().top - 100 }, 500);
        });
    });

    // TOMBOL BATAL EDIT
    $('#btn-cancel-edit').on('click', function() {
        $('#form-tambah-program')[0].reset();
        $('#program_id').val('');
        $('#btn-submit-program').text('Tambah Program');
        $(this).addClass('hidden');
    });

    // TOMBOL HAPUS
    $(document).on('click', '.btn-delete-program', function() {
        if (!confirm('Anda yakin ingin menghapus program ini?')) return;

        let id = $(this).data('id');
        let row = $(`#program-row-${id}`);

        $.ajax({
            url: `/admin/programs/${id}`,
            type: 'DELETE',
            success: function(response) {
                showNotification(response.message);
                row.fadeOut(400, function() { $(this).remove(); });
            },
            error: function() {
                showNotification('Gagal menghapus program.', false);
            }
        });
    });


    // ===================================
    // ======== CRUD TESTIMONI ===========
    // ===================================

    // CREATE TESTIMONI
    $('#form-tambah-testimoni').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('testimonials.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                showNotification(response.message);
                
                // Tambahkan gambar baru ke galeri tanpa refresh
                let newImageHtml = `
                    <div id="testimonial-card-${response.data.id}" class="relative group">
                        <img src="/storage/${response.data.gambar}" class="rounded-lg shadow-md w-full h-auto">
                        <button class="btn-delete-testimoni absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100" data-id="${response.data.id}">X</button>
                    </div>`;
                $('#testimonial-gallery').append(newImageHtml);
                $('#form-tambah-testimoni')[0].reset();
            },
            error: function() {
                showNotification('Gagal mengupload testimoni.', false);
            }
        });
    });

    // DELETE TESTIMONI
    $(document).on('click', '.btn-delete-testimoni', function() {
        if (!confirm('Anda yakin ingin menghapus testimoni ini?')) return;

        let id = $(this).data('id');
        let card = $(`#testimonial-card-${id}`);

        $.ajax({
            url: `/admin/testimonials/${id}`,
            type: 'DELETE',
            success: function(response) {
                showNotification(response.message);
                card.fadeOut(400, function() { $(this).remove(); });
            },
            error: function() {
                showNotification('Gagal menghapus testimoni.', false);
            }
        });
    });

});
</script>
@endpush
</x-app-layout>