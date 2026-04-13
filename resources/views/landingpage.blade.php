<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing · lapor sekolah</title>
    <!-- Font modern yang clean -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f6f3fe;
            color: #1e1029;
            line-height: 1.5;
            scroll-behavior: smooth;
        }

        /* warna ungu yang calm tapi striking */
        :root {
            --purple-deep: #3b2b5c;
            --purple-soft: #7a5c9e;
            --purple-light: #cbb8ff;
            --purple-bg: #f1ebff;
            --purple-glow: rgba(123, 92, 158, 0.2);
            --card-white: #ffffff;
            --shadow-sm: 0 15px 30px -10px rgba(59, 43, 92, 0.15);
            --shadow-hover: 0 25px 40px -12px rgba(59, 43, 92, 0.25);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            width: 100%;
        }

        .logo {
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            background: linear-gradient(145deg, #2d1b48, #62458b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 36px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #2d1b48;
            font-weight: 500;
            font-size: 1rem;
            transition: 0.2s;
            border-bottom: 2px solid transparent;
            padding-bottom: 4px;
        }

        .nav-links a:hover {
            border-bottom-color: #7a5c9e;
            color: #3b2b5c;
        }

        .btn-outline {
            display: inline-flex !important; 
            align-items: center;
            justify-content: center;
            background: transparent;
            border: 2px solid #7a5c9e !important;
            color: #3b2b5c !important;
            padding: 8px 24px !important; 
            border-radius: 50px !important; 
            font-weight: 600;
            text-decoration: none !important;
            height: 40px; 
            transition: 0.25s;
        }

        .btn-outline:hover {
            background: #7a5c9e;
            color: white;
            border-color: #7a5c9e;
        }

        /* hero minimalis tapi kuat */
        .hero {
            padding: 40px 0 70px;
        }

        .hero-grid {
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .hero-text {
            flex: 1 1 350px;
        }

        .badge {
            background: #e1d3ff;
            color: #3b2b5c;
            display: inline-block;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            border: 1px solid #d2befa;
        }

        .hero-text h1 {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.1;
            color: #2a173f;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            background: linear-gradient(130deg, #5f4090, #936dd2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text p {
            font-size: 1.2rem;
            color: #4b3a60;
            max-width: 500px;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #3b2b5c;
            color: white;
            padding: 14px 36px;
            border-radius: 100px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            box-shadow: 0 10px 20px rgba(59, 43, 92, 0.25);
            transition: all 0.25s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: #4f3880;
            transform: translateY(-3px);
            box-shadow: 0 20px 30px rgba(90, 60, 140, 0.3);
        }

        .btn-ghost {
            background: transparent;
            border: 1.5px solid #b59de0;
            color: #2f1d47;
            padding: 14px 32px;
            border-radius: 100px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-ghost:hover {
            background: #f0e8ff;
            border-color: #7a5c9e;
        }

        .hero-visual {
            flex: 1 1 300px;
            background: #d9c9ff;
            border-radius: 38% 62% 41% 59% / 53% 44% 56% 47%;
            min-height: 340px;
            background: linear-gradient(145deg, #b59de0, #e6d9ff);
            box-shadow: 40px 40px 60px rgba(90, 60, 140, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b2b5c;
            font-size: 5rem;
            font-weight: 300;
        }

        /* statistik simpel */
        .stats-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            background: var(--card-white);
            padding: 30px 40px;
            border-radius: 48px;
            box-shadow: var(--shadow-sm);
            margin: 30px 0 60px;
        }

        .stat-item {
            text-align: center;
            flex: 1 1 120px;
        }

        .stat-num {
            font-size: 2.4rem;
            font-weight: 800;
            color: #2f1d47;
            line-height: 1;
        }

        .stat-label {
            color: #6b5490;
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
        }

        /* fitur */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #271a37;
            margin-bottom: 15px;
            text-align: center;
        }

        .section-desc {
            text-align: center;
            color: #5b4875;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 50px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
            margin: 60px 0;
        }

        .feature-card {
            background: var(--card-white);
            padding: 32px 24px;
            border-radius: 32px;
            box-shadow: var(--shadow-sm);
            transition: 0.25s ease;
        }

        .feature-card:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-hover);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            background: #f0e8ff;
            width: 65px;
            height: 65px;
            display: grid;
            place-items: center;
            border-radius: 25px;
            color: #482e72;
        }

        .feature-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .role-emoji svg {
            width: 1.8rem;
            height: 1.8rem;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #2b193f;
        }

        .feature-card p {
            color: #5a4b6e;
            font-weight: 400;
        }

        /* peran (dua kolom) */
        .roles-wrap {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 60px 0;
        }

        .role-card {
            background: white;
            flex: 1 1 280px;
            border-radius: 32px;
            padding: 32px 28px;
            box-shadow: var(--shadow-sm);
            border: 1px solid #e3d5ff;
        }

        .role-emoji {
            background: #cbb8ff;
            width: 70px;
            height: 70px;
            font-size: 2.4rem;
            display: grid;
            place-items: center;
            border-radius: 30px;
            margin-bottom: 25px;
        }

        .role-card h3 {
            font-size: 1.7rem;
            font-weight: 700;
            color: #2d1b48;
            margin-bottom: 10px;
        }

        .role-feature-list {
            list-style: none;
            margin-top: 20px;
        }

        .role-feature-list li {
            margin: 12px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #43355b;
        }

        .role-feature-list li::before {
            content: "✦";
            color: #7a5c9e;
            font-weight: 600;
        }

        /* langkah simpel */
        .steps {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 60px 0;
        }

        .step-item {
            background: white;
            padding: 24px 28px;
            border-radius: 100px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1 1 180px;
            border: 1px solid #dccdfa;
        }

        .step-num {
            background: #3b2b5c;
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 60px;
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 1.4rem;
        }

        /* CTA */
        .cta-box {
            background: linear-gradient(135deg, #2d1b48 0%, #543d7a 100%);
            color: white;
            border-radius: 60px;
            padding: 70px 40px;
            text-align: center;
            margin: 70px 0;
        }

        .cta-box h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .cta-box p {
            font-size: 1.2rem;
            max-width: 500px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .btn-white {
            background: white;
            color: #2d1b48;
            border: none;
            padding: 16px 48px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
            transition: 0.25s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-white:hover {
            background: #efe6ff;
            transform: scale(1.02) translateY(-3px);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.3);
        }

        /* footer minimal */
        .footer {
            padding: 40px 0 20px;
            border-top: 2px solid #e2d3ff;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-col p {
            color: #584671;
            max-width: 260px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin: 10px 0;
        }

        .footer-links a {
            text-decoration: none;
            color: #3a2954;
            font-weight: 500;
        }

        .footer-links a:hover {
            color: #7a5c9e;
        }

        .copyright {
            text-align: center;
            padding: 30px 0 0;
            color: #685580;
            font-size: 0.9rem;
        }

        /* mobile */
        @media (max-width: 700px) {
            .nav-links {
                display: none;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .stats-row {
                flex-direction: column;
                gap: 25px;
                padding: 30px 20px;
            }

            .cta-box {
                padding: 50px 20px;
            }

            .cta-box h2 {
                font-size: 2rem;
            }

            .step-item {
                border-radius: 60px;
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- header simple (dengan logo image) -->
        <nav class="navbar">
            <a href="/" class="logo" style="text-decoration: none;">
                <img src="/img/logo.png" alt="Logo Edukra" style="height: 60px; width: auto; object-fit: contain;">
            </a> <!-- ganti ✨ jadi logo gambar -->
            <div class="nav-links">
                <a href="#">Beranda</a>
                <a href="#fitur">Fitur</a>
                <a href="#peran">Peran</a>
                <a href="#cara">Panduan</a>
                <a href="/login" class="btn-outline">Masuk</a>
            </div>
        </nav>

        <!-- hero singkat -->
        <div class="hero" id="beranda">
            <div class="hero-grid">
                <div class="hero-text">
                    <span class="badge"><i data-lucide="megaphone"
                            style="width:0.85rem;height:0.85rem;display:inline;vertical-align:middle;"></i> platform
                        aspirasi sekolah</span>
                    <h1>Lapor fasilitas <span>sekarang,</span> respon cepat</h1>
                    <p>Kursi patah, AC rusak, atau atap bocor? Cukup foto dan lapor. Pantau terus progres perbaikannya.
                    </p>
                    <div class="hero-buttons">
                        <a href="/login" class="btn-primary"><i data-lucide="sparkles"
                                style="width:1rem;height:1rem;"></i> Buat laporan</a>
                        <a href="#" class="btn-ghost">Cara kerja</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <i data-lucide="heart" style="width:5rem;height:5rem;color:#3b2b5c;"></i>
                </div>
            </div>
        </div>

        <!-- stats kecil -->
        <div class="stats-row">
            <div class="stat-item"><span class="stat-num">500+</span> <span class="stat-label">laporan selesai</span>
            </div>
            <div class="stat-item"><span class="stat-num">1.2k</span> <span class="stat-label">siswa aktif</span></div>
            <div class="stat-item"><span class="stat-num">24j</span> <span class="stat-label">respon awal</span></div>
            <div class="stat-item"><span class="stat-num">95%</span> <span class="stat-label">puas</span></div>
        </div>

        <!-- fitur -->
        <div id="fitur">
            <h2 class="section-title">fitur simpel, dampak maksimal</h2>
            <p class="section-desc">gak pake ribet — semua yang kamu butuh buat lapor dan mantau</p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i data-lucide="smartphone"></i></div>
                    <h3>Lapor 30 detik</h3>
                    <p>Foto + deskripsi, langsung terkirim ke petugas.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i data-lucide="refresh-cw"></i></div>
                    <h3>Lacak status</h3>
                    <p>Tahap “dilihat, diproses, selesai” realtime.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i data-lucide="bell"></i></div>
                    <h3>Notifikasi</h3>
                    <p>Dapet notif tiap ada update dari admin.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i data-lucide="bar-chart-2"></i></div>
                    <h3>Data tren</h3>
                    <p>Sekolah lihat kerusakan paling sering.</p>
                </div>
            </div>
        </div>

        <!-- peran (siswa & admin) -->
        <div id="peran">
            <h2 class="section-title">dua peran, satu tujuan</h2>
            <p class="section-desc">siswa lapor — admin tindak lanjut</p>
            <div class="roles-wrap">
                <div class="role-card">
                    <div class="role-emoji"><i data-lucide="graduation-cap"></i></div>
                    <h3>Siswa</h3>
                    <p>mata dan telinga sekolah. lapor kalau ada fasilitas kurang baik.</p>
                    <ul class="role-feature-list">
                        <li>upload foto bukti</li>
                        <li>isi kategori & lokasi</li>
                        <li>terima konfirmasi</li>
                    </ul>
                </div>
                <div class="role-card">
                    <div class="role-emoji"><i data-lucide="shield"></i></div>
                    <h3>Admin / petugas</h3>
                    <p>kelola laporan, assign tim, update status.</p>
                    <ul class="role-feature-list">
                        <li>dashboard semua laporan</li>
                        <li>ubah status (proses/selesai)</li>
                        <li>komentar & solusi</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- cara kerja (steps simpel) -->
        <div id="cara">
            <h2 class="section-title">gimana caranya?</h2>
            <p class="section-desc">cukup 4 langkah, dari lapor sampai kelar</p>
            <div class="steps">
                <div class="step-item"><span class="step-num">1</span> Login / daftar</div>
                <div class="step-item"><span class="step-num">2</span> Isi & foto</div>
                <div class="step-item"><span class="step-num">3</span> Kirim laporan</div>
                <div class="step-item"><span class="step-num">4</span> Pantau progres</div>
            </div>
        </div>

        <!-- cta ungu -->
        <div class="cta-box">
            <h2>Ayo bikin sekolah makin nyaman</h2>
            <p>Ribuan siswa sudah lapor. Kapan kamu?</p>
            <a href="/login" class="btn-white"><i data-lucide="sparkles"
                    style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Mulai sekarang —
                Gratis</a>
        </div>

        <!-- footer super simple (tanpa nama merek) -->
        <div class="footer">
            <div class="footer-col" style="display: flex; flex-direction: column;">
                <a href="/" class="logo" style="margin-bottom: 1rem; text-decoration: none;">
                    <img src="/img/logo.png" alt="Logo Edukra" style="height: 40px; width: auto; object-fit: contain;">
                </a> <!-- hanya logo gambar -->
                <p>platform pengaduan sarpras sekolah — transparan dan cepat.</p>
            </div>
            <div class="footer-col">
                <ul class="footer-links">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#fitur">Fitur</a></li>
                    <li><a href="#peran">Peran</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <ul class="footer-links">
                    <li><a href="/login">Masuk</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <p><i data-lucide="mail" style="width:0.85rem;height:0.85rem;display:inline;vertical-align:middle;"></i>
                    hello@sekolah.id<br><i data-lucide="map-pin"
                        style="width:0.85rem;height:0.85rem;display:inline;vertical-align:middle;"></i> Jl. Merdeka
                    No.45</p>
            </div>
        </div>
        <div class="copyright">
            © 2026 — dibuat dengan <i data-lucide="heart"
                style="width:0.85rem;height:0.85rem;display:inline;vertical-align:middle;color:#7a5c9e;"></i> buat
            sekolah indonesia
        </div>
    </div>

    <!-- sedikit interaksi smooth -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
    <script>lucide.createIcons();</script>

</body>

</html>