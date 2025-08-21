<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Giat Kedinasan</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/logo2.png') }}">
    {{-- Memuat CSS Kustom Anda Langsung --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-gray-100">

    {{-- =============================================== --}}
    {{--                  HEADER DASHBOARD               --}}
    {{-- =============================================== --}}
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">GK Dashboard</a>
            </div>
            <div class="nav-links">
                <a href="/" target="_blank">Lihat Landing Page</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div>
            <button class="hamburger" id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    {{-- Notifikasi akan muncul di sini --}}
    <div id="notification" class="hidden fixed top-20 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg z-50"></div>

    {{-- =============================================== --}}
    {{--                  KONTEN UTAMA DASHBOARD         --}}
    {{-- =============================================== --}}
    <main class="py-12" style="padding-top: 100px;"> {{-- Beri padding atas agar tidak tertutup header --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            <div class="dashboard-section">
                <h3 class="section-heading">Manajemen Program</h3>
                <form id="form-tambah-program" class="crud-form">
                    @csrf
                    <h4 class="form-title">Tambah/Edit Program</h4>
                    <input type="hidden" id="program_id" name="program_id">
                    <div class="form-grid">
                        <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" required>
                        <input type="text" id="periode_kelas" name="periode_kelas" placeholder="Periode Kelas (cth: Januari 2025)" required>
                        <input type="number" id="harga_baru" name="harga_baru" placeholder="Harga Baru (cth: 650000)" required>
                        <input type="number" id="harga_lama" name="harga_lama" placeholder="Harga Lama (Opsional)">
                        <div class="md:col-span-2">
                            <label for="gambar">Gambar Program (Opsional)</label>
                            <input type="file" id="gambar" name="gambar"> {{-- INPUT BARU --}}
                        </div>
                        <textarea id="fitur" name="fitur" rows="4" placeholder="Fitur (satu per baris)" class="md:col-span-2" required></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" id="btn-submit-program" class="btn-tambah">Simpan Program</button>
                        <button type="button" id="btn-cancel-edit" class="btn-edit hidden">Batal Edit</button>
                    </div>
                </form>
                <div class="overflow-x-auto">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Kelas</th>
                                    <th>Periode</th>
                                    <th>Fitur</th>
                                    <th>Harga Baru</th>
                                    <th>Harga Lama (Opsional)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="program-table-body">
                                @if($programs->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada program.</td>
                                    </tr>
                                @endif
                                @foreach($programs as $program)
                                    <tr id="program-row-{{ $program->id }}">
                                        <td>
                                            <img src="{{ asset('storage/' . $program->gambar) }}" class="table-image" alt="Gambar Program">
                                        </td>
                                        <td>{{ $program->nama_kelas }}</td>
                                        <td>{{ $program->periode_kelas }}</td>
                                        <td>
                                            @php
                                                $fiturList = json_decode($program->fitur ?? '[]');
                                            @endphp
                                            <ul class="list-disc pl-5">
                                                @foreach($fiturList as $fitur)
                                                    <li>{{ $fitur }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>Rp{{ number_format($program->harga_baru) }}</td>
                                        <td>
                                            @if($program->harga_lama)
                                                Rp{{ number_format($program->harga_lama) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn-edit" data-id="{{ $program->id }}">Edit</button>
                                            <button class="btn-delete-program btn-hapus" data-id="{{ $program->id }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dashboard-section">
                <h3 class="section-heading">Manajemen Testimoni</h3>
                <form id="form-tambah-testimoni" enctype="multipart/form-data" class="crud-form">
                    @csrf
                    <h4 class="form-title">Tambah Testimoni Baru</h4>
                    <input type="file" name="gambar" required>
                    <button type="submit" class="btn-tambah mt-4">Upload Testimoni</button>
                </form>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Gambar Testimoni</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($testimonials->isEmpty())
                                <tr>
                                    <td colspan="2" class="text-center">Belum ada testimoni.</td>
                                </tr>
                            @endif
                            @foreach($testimonials as $testimonial)
                                <tr id="testimonial-row-{{ $testimonial->id }}">
                                    <td>
                                        <img src="{{ asset('storage/' . $testimonial->gambar) }}" alt="Testimoni" class="testimonial-image-item">
                                    </td>
                                    <td>
                                        <button class="btn-delete-testimoni btn-hapus" data-id="{{ $testimonial->id }}">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
    
    {{-- =============================================== --}}
    {{--                     FOOTER                        --}}
    {{-- =============================================== --}}
    <footer class="footer" style="margin-top: 3rem;">
        <p>© 2025 Giat Kedinasan. All Rights Reserved.</p>
    </footer>

    {{-- =============================================== --}}
    {{--              BAGIAN JAVASCRIPT                 --}}
    {{-- =============================================== --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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

        // ==================
        // === CRUD PROGRAM ===
        // ==================
        $('#form-tambah-program').on('submit', function(e) {
            e.preventDefault();
            let programId = $('#program_id').val();
            let url = programId ? `/admin/programs/${programId}` : "{{ route('programs.store') }}";
            let method = programId ? 'PUT' : 'POST';

            // Gunakan FormData untuk mengirim file
            let formData = new FormData(this);
            if (programId) {
                formData.append('_method', 'PUT'); // Tambahkan method spoofing untuk update
            }   

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                
                success: function(response) {
                    showNotification(response.message);
                    location.reload(); 
                },
                error: function(xhr) { showNotification('Terjadi kesalahan.', false); }
            });
        });

        $(document).on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            $.get(`/admin/programs/${id}/edit`, function(data) {
                $('#program_id').val(data.id);
                $('#nama_kelas').val(data.nama_kelas);
                $('#harga_baru').val(data.harga_baru);
                $('#harga_lama').val(data.harga_lama);
                $('#fitur').val(JSON.parse(data.fitur || '[]').join('\n'));
                $('#periode_kelas').val(data.periode_kelas);
                if (data.gambar) {
                    $('#current-image-preview').html(`<img src="/storage/${data.gambar}" class="h-20 w-auto rounded mt-2">`);
                } else {
                    $('#current-image-preview').html('');
                }
                $('#btn-submit-program').text('Update Program');
                $('#btn-cancel-edit').removeClass('hidden');
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
        });
        $('#btn-cancel-edit').on('click', function() {
            $('#form-tambah-program')[0].reset();
            $('#program_id').val('');
            $('#btn-submit-program').text('Tambah Program');
            $(this).addClass('hidden');
        });
        $(document).on('click', '.btn-delete-program', function() {
            if (!confirm('Anda yakin?')) return;
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/programs/${id}`, type: 'DELETE',
                success: function(response) {
                    showNotification(response.message);
                    location.reload();
                }
            });
        });

        // ======================
        // === CRUD TESTIMONI ===
        // ======================
        $('#form-tambah-testimoni').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('testimonials.store') }}", type: 'POST', data: new FormData(this),
                contentType: false, processData: false,
                success: function(response) {
                    showNotification(response.message);
                    location.reload(); // <<< DIUBAH MENJADI RELOAD
                },
                error: function(xhr) {
                    showNotification('Gagal mengupload testimoni.', false);
                }
            });
        });
        $(document).on('click', '.btn-delete-testimoni', function() {
                if (!confirm('Anda yakin?')) return;
                let id = $(this).data('id');
                $.ajax({
                    url: `/admin/testimonials/${id}`, type: 'DELETE',
                    success: function(response) {
                        showNotification(response.message);
                        location.reload();
                    }
                });
            });
        });

        // humbergur untuk navbar
        const hamburger = document.getElementById('hamburger-menu');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    </script>
</body>
</html>