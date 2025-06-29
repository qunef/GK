<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIAT Kedinasan - Program Persiapan Seleksi Sekolah Kedinasan Terbaik</title>
    @vite('resources/css/custom.css')
    
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">🎓</div>
            <ul class="nav-links">
                <li><a href="#home">Homepage</a></li>
                <li><a href="#fitur">Fitur lengkap</a></li>
                <li><a href="#tryout">Try Out</a></li>
            </ul>
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
            <div class="program-card">
                <div class="program-title">Kelas PLATINUM</div>
                <ul class="program-features">
                    <li>Bimbingan Sampai Pengumuman Tes Akhir Kedinasan 2025</li>
                    <li>Bimbingan Online Via Zoom Sampai Lebih Dari 300 Sesi Sampai Selesai Tahapan Tes</li>
                    <li>Materi Sesuai dengan Kisi kisi terbaru + Pembahasan</li>
                    <li>Ruang Diskusi ke Alamat Medsos yang sudah tersedia (free ongkir)</li>
                    <li>File Materi Setiap Selesai Sesi Bimbingan Dalam Bentuk PDF dan Video Rekaman</li>
                    <li>TO SKD Mandiri</li>
                    <li>Try Out SKD Bersama Rutin Terjadwal dan Pembahasan Tuntas</li>
                    <li>Layanan Konsultasi Akademik dan Kedinasan</li>
                    <li>Bonus Fasilitas Tes Kedinasan Tahap Lanjut</li>
                </ul>
                <div class="price">
                    <div class="price-old">Rp1.500.000,00</div>
                    <div class="price-current">Rp650.000,00</div>
                </div>
                <div style="text-align: center;">
                    <a href="#daftar" class="btn-primary">Daftar Hari Ini</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Testimoni</h2>
            <p class="testimonial-text">Berikut testimoni beberapa peserta yang berhasil menyelesaikan mimpinya lolos seleksi masuk sekolah kedinasan impian</p>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Testimoni Peserta</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Nurdiaf Saifudin</div>
                            <div style="font-size: 0.8rem;">STMKG</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Testimoni Peserta</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Nurdiaf Saifudin</div>
                            <div style="font-size: 0.8rem;">STMKG</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Testimoni Peserta</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Nurdiaf Saifudin</div>
                            <div style="font-size: 0.8rem;">STMKG</div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 style="text-align: center; color: #1e40af; margin-bottom: 2rem;">lolos dengan Nilai yang Memuaskan</h3>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Hasil Nilai Tinggi</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Hasil Test Memuaskan</div>
                            <div style="font-size: 0.8rem;">Lolos STMKG</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Hasil Nilai Tinggi</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Hasil Test Memuaskan</div>
                            <div style="font-size: 0.8rem;">Lolos STMKG</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-image">
                        <div>
                            <div style="font-size: 2rem; margin-bottom: 1rem;">👨‍🎓</div>
                            <div>Hasil Nilai Tinggi</div>
                            <div style="font-size: 0.9rem; margin-top: 0.5rem;">Hasil Test Memuaskan</div>
                            <div style="font-size: 0.8rem;">Lolos STMKG</div>
                        </div>
                    </div>
                </div>
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
    </script>
</body>
</html>