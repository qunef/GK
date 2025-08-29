<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giat Kedinasan - Program Persiapan Seleksi Sekolah Kedinasan Terbaik</title>
    @vite('resources/css/custom.css')
    @php
        $imageWidth = 450;
        $testimonialCount = $testimonials->count();
        $animationDuration = $testimonialCount * 5; // Durasi animasi (misal: 5 detik per gambar)
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/logo2.png') }}">
    <style>
        .slide-track {
            animation: scroll {{ $animationDuration }}s linear infinite;
            display: flex;
            /* Lebar dihitung dinamis: (lebar gambar) x (jumlah testimoni x 2) */
            width: calc({{ $imageWidth }}px * {{ $testimonialCount * 2 }});
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            /* Mundur sejauh jumlah gambar asli x lebar per gambar */
            100% { transform: translateX(calc(-{{ $imageWidth }}px * {{ $testimonialCount }})); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="mini-logo">
                <img src="{{ Vite::asset('resources/img/logo2.png') }}" alt="logo2" class="logo-mini">
            </div>
            <ul class="nav-links">
                <li><a href="#hero">Homepage</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle">E-Learning</a>
                    <ul class="dropdown-menu">
                        <li><a href="https://learning.giatkedinasan.com/" target="_blank">SKD</a></li>
                        <li><a href="https://psikotes.giatkedinasan.com/" target="_blank">Psikotes</a></li>
                    </ul>
                </li>
                <li><a href="https://toskd.giatkedinasan.com/" target="_blank">Try Out SKD Bersama</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle">Latihan</a>
                    <ul class="dropdown-menu">
                        <li><a href="https://toskd.giatkedinasan.com/" target="_blank">SKD</a></li>
                        <li><a href="https://stan.giatkedinasan.com/" target="_blank">TPA/TBI STAN</a></li>
                        <li><a href="https://stis.giatkedinasan.com/" target="_blank">Matematika STIS</a></li>
                        <li><a href="https://stmkg.giatkedinasan.com/" target="_blank">SKB STMKG</a></li>
                    </ul>
                </li>
                
            </ul>
            <button class="hamburger" id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="hero-content">
            <div class="logo-section">
                <img src="{{ Vite::asset('resources/img/logo1.png') }}" alt="logo" class="logo-image">
            </div>
            <div class="hero-text">
                <h1>Program<br>Persiapan Seleksi Sekolah<br>Kedinasan Terbaik</h1>
                <p>Bimbingan persiapan sekolah kedinasan dengan fasilitas lengkap <br> <i>Sudah terbukti banyak meloloskan peserta ke berbagai sekolah kedinasan</i><br><i class="kampus">(PKN STAN | STIS | IPDN | STIN | STMKG | POLTEKPIN | KEMENHUB |SSN)</i></p>
                <a href="#program-section" class="btn-primary">Daftar sekarang</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="why-choose">
        <div class="container">
            <h2 class="section-title">Mengapa harus memilih Program Belajar Giat Kedinasan?</h2>
            <div class="carousel-container">
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        @if($features->isEmpty())
                            <p class="no_feature">Belum ada fitur yang ditambahkan.</p>
                        @else
                            @foreach($features as $feature)
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <img src="{{ asset('storage/' . $feature->gambar) }}" alt="{{ $feature->judul }}" style="width: 50px; height: 50px;">
                                    </div>
                                    <h3>{{ $feature->judul }}</h3>
                                    <p>{{ $feature->deskripsi }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <button class="carousel-nav prev" onclick="moveCarousel(-1)">❮</button>
                <button class="carousel-nav next" onclick="moveCarousel(1)">❯</button>
                <div class="carousel-dots" id="carouselDots"></div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="program-section" class="program-section">
        <div class="container">
            <h2 class="section-title">Program yang Tersedia</h2>

            @if($programs->isEmpty())
                <p style="text-align: center;">Saat ini belum ada program yang tersedia.</p>
            @else
                @foreach($programs as $program)
                    <div class="program-card" style="margin-bottom: 2rem;"> 
                        <div class="program-period"> Periode {{$program->periode_kelas}}</div>
                        <div class="program-title">{{ $program->nama_kelas }}</div>
                        <div class="program-content">
                            <div class="program-image">
                                @if($program->gambar)
                                    <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->nama_kelas }}" style="width: 100%; height: auto; border-radius: 8px;"> 
                                @endif
                            </div>
                            <ul class="program-features">
                                @foreach(json_decode($program->fitur) as $fitur)
                                    <li>{{ $fitur }}</li>
                                @endforeach
                            </ul>   
                        </div>
                        <div class="price">
                            @if($program->harga_lama)
                                <div class="price-old">Rp{{ number_format($program->harga_lama, 0, ',', '.') }},00</div>
                            @endif
                            <div class="price-current">Rp{{ number_format($program->harga_baru, 0, ',', '.') }},00</div>
                        </div>
                        <div style="text-align: center;">
                            <a href="https://api.whatsapp.com/send?phone=6281919181251&text=Hallo%20ka%2C%20Saya%20ingin%20mendaftar%20dalam%20program%20persiapan%20tes%20sekolah%20kedinasan%202026" target="_blank" class="btn-primary">Daftar Hari Ini</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Testimoni</h2>
            <p class="testimonial-text">Berikut testimoni beberapa peserta yang berhasil menyelesaikan mimpinya lolos seleksi masuk sekolah kedinasan impian.</p>
        </div>
        
        {{-- Ini adalah container untuk slider --}}
        <div class="testimonial-slider">
            <div class="slide-track">
                {{-- Tampilkan semua gambar testimoni --}}
                @foreach($testimonials as $testimonial)
                    <div class="slide">
                        <img src="{{ asset('storage/' . $testimonial->gambar) }}" alt="Testimoni Siswa">
                    </div>
                @endforeach

                {{-- DUPLIKAT: Tampilkan lagi semua gambar untuk efek looping tak terbatas --}}
                @foreach($testimonials as $testimonial)
                    <div class="slide">
                        <img src="{{ asset('storage/' . $testimonial->gambar) }}" alt="Testimoni Siswa">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Dapatkan Update Info Terbaru</h2>
            <div class="cta-buttons">
                <a href="https://www.facebook.com/groups/469099712774952/?ref=share&mibextid=NSMWBT" target="_blank" class="btn-facebook">
                    <svg class="facebook-icon" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 2.03998C6.5 2.03998 2 6.52998 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.84998C10.44 7.33998 11.93 5.95998 14.22 5.95998C15.31 5.95998 16.45 6.14998 16.45 6.14998V8.61998H15.19C13.95 8.61998 13.56 9.38998 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C15.9164 21.5878 18.0622 20.3855 19.6099 18.57C21.1576 16.7546 22.0054 14.4456 22 12.06C22 6.52998 17.5 2.03998 12 2.03998Z"></path> </g></svg>
                    Join Grup Facebook
                </a>
                <a href="https://api.whatsapp.com/send?phone=6281919181251&text=Hallo%20ka%2C%20Saya%20ingin%20bergabung%20dalam%20grup%20WA%20terbaru%20persiapan%20seleksi%20sekolah%20kedinasan" target="_blank" class="btn-whatsapp">
                    <svg class="whatsapp-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp [#128]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="#ffffff"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"> </path> </g> </g> </g> </g></svg>
                    Join Grup Whatsapp
                </a>
            </div>
            <p class="cta-description">Gabung grup dan dapatkan update info terbaru gratis</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>© 2025 Giat Kedinasan. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Bagian Carousel "Why Choose"
        const track = document.getElementById('carouselTrack');
        const cards = document.querySelectorAll('.feature-card');
        const totalSlides = cards.length;
        const dotsContainer = document.getElementById('carouselDots');

        if (cards.length > 0) {
            let currentSlide = 0;

            // Create dots
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.className = 'dot';
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
            const dots = document.querySelectorAll('.dot');

            function updateCarousel() {
                // Cek jika cards[0] ada sebelum mengakses offsetWidth
                if (!cards[0]) return;
                const slideWidth = cards[0].offsetWidth + 32; // width + gap
                track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
                
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }

            function moveCarousel(direction) {
                currentSlide += direction;
                
                // Logika loop agar tidak mentok
                if (currentSlide >= totalSlides) {
                    currentSlide = 0;
                } else if (currentSlide < 0) {
                    currentSlide = totalSlides - 1;
                }
                updateCarousel();
            }

            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                updateCarousel();
            }

            // Touch/Swipe support untuk mobile
            let startX = 0;
            let endX = 0;

            track.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });

            track.addEventListener('touchend', (e) => {
                endX = e.changedTouches[0].clientX;
                const diffX = startX - endX;
                
                if (Math.abs(diffX) > 50) { // Minimum swipe distance
                    if (diffX > 0) {
                        moveCarousel(1); // Swipe left
                    } else {
                        moveCarousel(-1); // Swipe right
                    }
                }
            });

            // Update carousel saat ukuran window berubah
            window.addEventListener('resize', updateCarousel);
        }


        // Hamburger Menu JS
        const hamburger = document.getElementById('hamburger-menu');
        const navLinks = document.querySelector('.nav-links');

        if (hamburger && navLinks) {
            hamburger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                hamburger.classList.toggle('active');
            });
        }

        // Dropdown Menu JS
        const dropdowns = document.querySelectorAll('.nav-item.dropdown');
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            if (toggle) {
                toggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    dropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('dropdown-active');
                        }
                    });
                    dropdown.classList.toggle('dropdown-active');
                });
            }
        });

        window.addEventListener('click', function(event) {
            if (!event.target.closest('.nav-item.dropdown')) {
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('dropdown-active');
                });
            }
        });
    </script>
</body>
</html>