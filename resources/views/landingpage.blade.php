<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIAT Kedinasan - Program Persiapan Seleksi Sekolah Kedinasan Terbaik</title>
    @vite('resources/css/custom.css')
    @php
        // Definisikan variabel di sini agar mudah diubah
        $imageWidth = 450; // Lebar per gambar dalam px
        $testimonialCount = $testimonials->count();
        $animationDuration = $testimonialCount * 5; // Durasi animasi (misal: 5 detik per gambar)
    @endphp

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
            <div class="logo">🎓</div>
            <ul class="nav-links">
                <li><a href="">Homepage</a></li>
                <li><a href="https://toskd.giatkedinasan.com/" target="_blank" rel="noopener noreferrer">Try Out</a></li>
                <li><a href="https://learning.giatkedinasan.com/" target="_blank" rel="noopener noreferrer">E-Learning</a></li>
            </ul>
            <button class="hamburger" id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="logo-section">
                <h2>GIAT</h2>
                <p>KEDINASAN</p>
            </div>
            <div class="hero-text">
                <h1>Program<br>Persiapan Seleksi Sekolah<br>Kedinasan Terbaik</h1>
                <p>Sistem pembelajaran online terbaik dengan pendekatan yang tepat sasaran untuk membantu peserta tes berbagai sekolah kedinasan Polri & TNI yang sudah teruji dan terpercaya sejak 2019.</p>
                <a href="#daftar" class="btn-primary">Daftar sekarang</a>
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
                        <div class="feature-card">
                            <div class="feature-icon">📹</div>
                            <h3>Bimbingan Online Tatap Muka</h3>
                            <p>Bimbingan Online tatap muka via zoom dengan dibimbing oleh Tutor yang berpengalaman dalam seleksi kedinasan</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">📚</div>
                            <h3>Materi Pembelajaran Lengkap</h3>
                            <p>Materi pembelajaran yang disusun berdasarkan kisi-kisi terbaru dan pengalaman kelulusan tahun sebelumnya</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">🎯</div>
                            <h3>Try Out Berkualitas</h3>
                            <p>Try Out rutin dengan sistem penilaian yang akurat dan pembahasan mendalam dari tutor berpengalaman</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">💬</div>
                            <h3>Konsultasi 24/7</h3>
                            <p>Layanan konsultasi akademik dan kedinasan yang siap membantu kapan saja Anda membutuhkan</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">👥</div>
                            <h3>Komunitas Belajar</h3>
                            <p>Bergabung dengan komunitas pejuang kedinasan dari seluruh Indonesia untuk saling memotivasi</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">🏆</div>
                            <h3>Track Record Terbaik</h3>
                            <p>Sudah membantu ribuan siswa lolos seleksi kedinasan dengan tingkat kelulusan yang tinggi sejak 2019</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-nav prev" onclick="moveCarousel(-1)">❮</button>
                <button class="carousel-nav next" onclick="moveCarousel(1)">❯</button>
                <div class="carousel-dots" id="carouselDots"></div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="program-section">
        <div class="container">
            <h2 class="section-title">Program yang Tersedia</h2>

            @if($programs->isEmpty())
                <p style="text-align: center;">Saat ini belum ada program yang tersedia.</p>
            @else
                @foreach($programs as $program)
                    <div class="program-card" style="margin-bottom: 2rem;"> 
                        <div class="program-period"> {{$program->periode_kelas}}</div>
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
                            <a href="#daftar" class="btn-primary">Daftar Hari Ini</a>
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
                <a href="#" class="btn-facebook">📘 Join Grup Facebook</a>
                <a href="#" class="btn-whatsapp">📱 Join Grup Whatsapp</a>
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
        let currentSlide = 0;
        const track = document.getElementById('carouselTrack');
        const cards = document.querySelectorAll('.feature-card');
        const totalSlides = cards.length;
        const dotsContainer = document.getElementById('carouselDots');
        let isAutoPlaying = true;
        let autoPlayInterval;

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
            const slideWidth = cards[0].offsetWidth + 32; // width + gap
            track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function moveCarousel(direction) {
            stopAutoPlay();
            currentSlide += direction;
            
            if (currentSlide >= totalSlides) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            }
            
            updateCarousel();
            startAutoPlay();
        }

        function goToSlide(slideIndex) {
            stopAutoPlay();
            currentSlide = slideIndex;
            updateCarousel();
            startAutoPlay();
        }

        function autoPlay() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }

        function startAutoPlay() {
            if (isAutoPlaying) {
                autoPlayInterval = setInterval(autoPlay, 4000);
            }
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        // Pause auto-play on hover
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.addEventListener('mouseenter', stopAutoPlay);
        carouselContainer.addEventListener('mouseleave', startAutoPlay);

        // Touch/Swipe support for mobile
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
                    moveCarousel(1); // Swipe left - next slide
                } else {
                    moveCarousel(-1); // Swipe right - previous slide
                }
            }
        });

        // Start auto-play
        startAutoPlay();

        // Handle window resize
        window.addEventListener('resize', updateCarousel);

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