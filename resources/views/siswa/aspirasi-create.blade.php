<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Aspirasi · Siswa</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* ============================================================
           RESET & CSS VARIABLES
           ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --deep-purple: #2d1b48;
            --soft-purple: #7a5c9e;
            --light-purple: #cbb8ff;
            --purple-bg: #f3edff;
            --card-bg: #ffffff;
            --text-dark: #1e1029;
            --text-soft: #5b4875;
            --text-light: #8f7aa9;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --danger: #ef4444;
            --shadow-sm: 0 10px 25px -8px rgba(59, 43, 92, 0.12);
            --shadow-md: 0 20px 35px -12px rgba(59, 43, 92, 0.2);
            --radius-card: 28px;
            --radius-element: 18px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f4ff;
            color: var(--text-dark);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
        }

        /* ============================================================
           SIDEBAR
           ============================================================ */
        .sidebar {
            width: 260px;
            background: linear-gradient(175deg, #2d1b48 0%, #452d66 100%);
            color: white;
            padding: 2rem 1.2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            border-radius: 0 40px 40px 0;
            box-shadow: 10px 0 40px rgba(45, 27, 72, 0.25);
        }

        /* -- Logo -- */
        .logo-area {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .logo-icon {
            background: rgba(255, 255, 255, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* -- User Card -- */
        .user-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 1.2rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            margin-bottom: 1rem;
        }

        .user-avatar {
            background: #b59de0;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.3rem;
            color: #2d1b48;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info h4 {
            font-size: 0.95rem;
            font-weight: 700;
        }

        .user-info p {
            font-size: 0.75rem;
            opacity: 0.7;
        }

        /* -- Nav Menu -- */
        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            flex: 1;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            border-radius: 50px;
            transition: 0.2s;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .nav-item a:hover,
        .nav-item a.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .nav-icon {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        .nav-icon svg,
        .logo-icon svg,
        .header-icon svg,
        .field-icon svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .header-icon svg {
            width: 1.8rem;
            height: 1.8rem;
        }

        /* -- Tombol Logout -- */
        .logout-btn {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.9rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 1rem;
        }

        /* ============================================================
           MAIN CONTENT AREA
           ============================================================ */
        .main {
            flex: 1;
            padding: 2rem 2.5rem;
            max-width: calc(100% - 260px);
            overflow-y: auto;
        }

        /* -- Top Bar & Breadcrumb -- */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title h1 {
            font-size: 1.9rem;
            font-weight: 800;
            color: #2a173f;
            letter-spacing: -0.5px;
        }

        .page-title .breadcrumb {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-top: 0.2rem;
        }

        .page-title .breadcrumb a {
            color: var(--soft-purple);
            text-decoration: none;
        }

        /* ============================================================
           FORM CARD (Container Utama Form)
           ============================================================ */
        .form-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 2.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
        }

        /* -- Form Header (Icon + Judul) -- */
        .form-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f3edff;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(145deg, #5b3f86, #7a5c9e);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .header-text h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d1b48;
        }

        .header-text p {
            color: var(--text-soft);
            font-size: 0.9rem;
        }

        /* ============================================================
           FORM ELEMENTS (Input, Select, Textarea, Label)
           ============================================================ */

        /* -- Grid Layout untuk Input -- */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
            margin-bottom: 1.2rem;
        }

        /* -- Input Group (Wrapper per field) -- */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            margin-bottom: 1.2rem;
        }

        .input-group.full {
            grid-column: 1 / -1;
        }

        /* -- Label -- */
        .input-group label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-soft);
            display: flex;
            align-items: center;
            gap: 0.2rem;
        }

        /* -- Tanda Wajib (*) -- */
        .required {
            color: var(--danger);
            font-size: 0.9rem;
        }

        /* -- Field Container (Icon + Input) -- */
        .field {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 1rem;
            top: 1rem;
            color: #b09dc9;
            font-size: 1.1rem;
            pointer-events: none;
        }

        /* -- Input / Select / Textarea -- */
        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            border: 2px solid #ede4ff;
            border-radius: 30px;
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            transition: 0.2s;
        }

        /* -- Textarea khusus -- */
        .field textarea {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
            border-radius: 20px;
        }

        /* -- Focus State -- */
        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            outline: none;
            border-color: var(--soft-purple);
            box-shadow: 0 0 0 3px rgba(122, 92, 158, 0.1);
        }

        /* ============================================================
           PRIORITY CARDS (Radio Button Prioritas)
           ============================================================ */
        .priority-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin: 1.2rem auto 2rem;
            max-width: 650px;
        }

        @media (min-width: 600px) {
            .priority-grid {
                margin-left: auto;
                margin-right: auto;
            }
        }

        .priority-option {
            position: relative;
        }

        .priority-option input {
            position: absolute;
            opacity: 0;
        }

        .priority-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.3rem;
            padding: 1.2rem 0.5rem;
            border: 2px solid #ede4ff;
            border-radius: 24px;
            background: white;
            cursor: pointer;
            transition: 0.15s;
        }

        /* -- Checked State: Rendah (hijau) -- */
        .priority-option input[value="rendah"]:checked+.priority-card {
            border-color: var(--success);
            background: #e0f9f0;
            box-shadow: 0 6px 12px rgba(16, 185, 129, 0.1);
        }

        /* -- Checked State: Sedang (kuning) -- */
        .priority-option input[value="sedang"]:checked+.priority-card {
            border-color: var(--warning);
            background: #fff3e0;
            box-shadow: 0 6px 12px rgba(245, 158, 11, 0.1);
        }

        /* -- Checked State: Tinggi (merah) -- */
        .priority-option input[value="tinggi"]:checked+.priority-card {
            border-color: var(--danger);
            background: #fee9e9;
            box-shadow: 0 6px 12px rgba(239, 68, 68, 0.1);
        }

        .priority-option input:checked+.priority-card .priority-title {
            color: var(--text-dark);
        }

        .priority-emoji {
            font-size: 2rem;
        }

        .priority-title {
            font-weight: 700;
            font-size: 0.8rem;
        }

        .priority-desc {
            font-size: 0.65rem;
            color: var(--text-light);
        }

        /* ============================================================
           FILE UPLOAD ZONE
           ============================================================ */
        .file-zone {
            border: 2px dashed #cbb8ff;
            border-radius: 30px;
            padding: 2rem;
            text-align: center;
            background: #faf8ff;
            position: relative;
            margin: 1rem 0;
        }

        .file-zone input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .upload-title {
            font-weight: 700;
            color: #2d1b48;
        }

        .upload-hint {
            font-size: 0.75rem;
            color: var(--text-light);
        }

        /* -- Daftar File yang Dipilih -- */
        .file-list {
            list-style: none;
            margin-top: 1rem;
        }

        .file-item {
            background: #f3edff;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ============================================================
           TOMBOL AKSI (Submit & Kembali)
           ============================================================ */
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f3edff;
        }

        /* -- Base Button -- */
        .btn {
            padding: 0.8rem 2rem;
            border-radius: 60px;
            font-weight: 700;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* -- Tombol Kirim (Primary) -- */
        .btn-primary {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            box-shadow: 0 10px 18px rgba(89, 54, 138, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 25px rgba(89, 54, 138, 0.3);
        }

        /* -- Tombol Kembali (Secondary) -- */
        .btn-secondary {
            background: #f1ebff;
            color: #4a3370;
        }

        /* ============================================================
           ALERT / PESAN ERROR
           ============================================================ */
        .alert {
            background: #fee9e9;
            color: #b91c1c;
            padding: 1rem 1.5rem;
            border-radius: 60px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        /* ============================================================
           RESPONSIVE (max-width: 1000px)
           ============================================================ */
        @media (max-width: 1000px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-radius: 0 0 40px 40px;
                padding: 1.5rem;
            }

            .main {
                max-width: 100%;
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .priority-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================================
         SIDEBAR NAVIGASI
         ============================================================ -->
    <aside class="sidebar">

        <!-- Logo -->
        <div class="logo-area">
            <div class="logo-icon"><i data-lucide="clipboard-list"></i></div>
        </div>

        <!-- User Card (Avatar + Nama + Kelas) -->
        <div class="user-card">
            <div class="user-avatar">
                @if(auth()->user()->foto)
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Avatar">
                @else
                    {{ substr(auth()->user()->name, 0, 1) }}
                @endif
            </div>
            <div class="user-info">
                <h4>{{ auth()->user()->name }}</h4>
                <p>Siswa · {{ auth()->user()->kelas }}</p>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard.siswa') }}">
                    <span class="nav-icon"><i data-lucide="layout-dashboard"></i></span> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('aspirasi.create') }}" class="active">
                    <span class="nav-icon"><i data-lucide="pencil-line"></i></span> Buat Aspirasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('aspirasi.saya') }}">
                    <span class="nav-icon"><i data-lucide="list"></i></span> Aspirasi Saya
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('notifikasi') }}">
                    <span class="nav-icon"><i data-lucide="bell"></i></span> Notifikasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profil') }}">
                    <span class="nav-icon"><i data-lucide="user"></i></span> Profil
                </a>
            </li>
        </ul>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: auto;">
            @csrf
            <button type="submit" class="logout-btn" style="width: 100%;">
                <span><i data-lucide="log-out"></i></span> Keluar
            </button>
        </form>

    </aside>

    <!-- ============================================================
         MAIN CONTENT
         ============================================================ -->
    <main class="main">

        <!-- Top Bar (Judul Halaman + Breadcrumb) -->
        <div class="top-bar">
            <div class="page-title">
                <h1>Buat Aspirasi</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Buat Aspirasi</div>
            </div>
        </div>

        <!-- Alert Error Validasi -->
        @if ($errors->any())
            <div class="alert" style="flex-direction: column; align-items: flex-start;">
                <strong><i data-lucide="alert-triangle" style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Terdapat kesalahan:</strong>
                <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ========================================================
             FORM ASPIRASI
             ======================================================== -->
        <div class="form-card">

            <!-- Header Form -->
            <div class="form-header">
                <div class="header-icon"><i data-lucide="pencil-line"></i></div>
                <div class="header-text">
                    <h2>Form Aspirasi</h2>
                    <p>Sampaikan aspirasimu untuk kemajuan sekolah</p>
                </div>
            </div>

            <form action="{{ route('aspirasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- ============================
                     Input: Judul & Kategori
                     ============================ -->
                <div class="form-grid">

                    <!-- Input Judul Aspirasi -->
                    <div class="input-group">
                        <label>Judul Aspirasi <span class="required">*</span></label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="pin"></i></span>
                            <input type="text" name="judul" placeholder="Contoh: AC ruang kelas rusak"
                                value="{{ old('judul') }}" required>
                        </div>
                    </div>

                    <!-- Select Kategori -->
                    <div class="input-group">
                        <label>Kategori <span class="required">*</span></label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="folder"></i></span>
                            <select name="kategori_id" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <!-- ============================
                     Input: Lokasi
                     ============================ -->
                <div class="input-group full">
                    <label>Lokasi <span class="required">*</span></label>
                    <div class="field">
                        <span class="field-icon"><i data-lucide="map-pin"></i></span>
                        <input type="text" name="lokasi" placeholder="Contoh: Ruang XI IPA 2, Lantai 2"
                            value="{{ old('lokasi') }}" required>
                    </div>
                </div>

                <!-- ============================
                     Radio: Tingkat Prioritas
                     ============================ -->
                <div class="input-group full">
                    <label>Tingkat Prioritas <span class="required">*</span></label>
                    <div class="priority-grid">

                        <!-- Prioritas: Rendah -->
                        <label class="priority-option">
                            <input type="radio" name="prioritas" value="rendah"
                                {{ old('prioritas', 'rendah') === 'rendah' ? 'checked' : '' }} required>
                            <div class="priority-card">
                                <span class="priority-emoji"><i data-lucide="circle" style="width:1rem;height:1rem;color:#10b981;"></i></span>
                                <span class="priority-title">Rendah</span>
                                <span class="priority-desc">Tidak mendesak</span>
                            </div>
                        </label>

                        <!-- Prioritas: Sedang -->
                        <label class="priority-option">
                            <input type="radio" name="prioritas" value="sedang"
                                {{ old('prioritas') === 'sedang' ? 'checked' : '' }}>
                            <div class="priority-card">
                                <span class="priority-emoji"><i data-lucide="circle" style="width:1rem;height:1rem;color:#f59e0b;"></i></span>
                                <span class="priority-title">Sedang</span>
                                <span class="priority-desc">Perlu ditangani</span>
                            </div>
                        </label>

                        <!-- Prioritas: Tinggi -->
                        <label class="priority-option">
                            <input type="radio" name="prioritas" value="tinggi"
                                {{ old('prioritas') === 'tinggi' ? 'checked' : '' }}>
                            <div class="priority-card">
                                <span class="priority-emoji"><i data-lucide="circle" style="width:1rem;height:1rem;color:#ef4444;"></i></span>
                                <span class="priority-title">Tinggi</span>
                                <span class="priority-desc">Sangat mendesak</span>
                            </div>
                        </label>

                    </div>
                </div>

                <!-- ============================
                     Textarea: Deskripsi
                     ============================ -->
                <div class="input-group full">
                    <label>Deskripsi <span class="required">*</span></label>
                    <div class="field">
                        <span class="field-icon"><i data-lucide="file-text"></i></span>
                        <textarea name="deskripsi" placeholder="Jelaskan secara detail..."
                            required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <div style="font-size:0.7rem; color:var(--text-light); margin-top:0.3rem;">Minimal 20 karakter</div>
                </div>

                <!-- ============================
                     File Upload: Lampiran
                     ============================ -->
                <div class="input-group full">
                    <label>Lampiran (opsional)</label>
                    <div class="file-zone" id="fileDrop">
                        <input type="file" name="lampiran[]" id="fileInput" multiple accept=".jpg,.jpeg,.png">
                        <div class="upload-icon"><i data-lucide="upload" style="width:2rem;height:2rem;color:var(--soft-purple);"></i></div>
                        <div class="upload-title">Seret file atau klik untuk unggah</div>
                        <div class="upload-hint">Format: JPG, JPEG, PNG • Maks 5MB</div>
                    </div>
                    <ul class="file-list" id="fileList"></ul>
                </div>

                <!-- ============================
                     Tombol Aksi: Kembali & Kirim
                     ============================ -->
                <div class="form-actions">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('dashboard.siswa') }}" class="btn btn-secondary">← Kembali</a>

                    <!-- Tombol Kirim Aspirasi -->
                    <button type="submit" class="btn btn-primary">Kirim Aspirasi →</button>
                </div>

            </form>
        </div>

    </main>

    <!-- ============================================================
         JAVASCRIPT: File Preview
         ============================================================ -->
    <script>
        lucide.createIcons();

        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                fileList.innerHTML = '';
                Array.from(this.files).forEach(file => {
                    const li = document.createElement('li');
                    li.className = 'file-item';
                    li.innerHTML = `<i data-lucide="paperclip" style="width:0.75rem;height:0.75rem;display:inline;vertical-align:middle;"></i> ${file.name} (${(file.size / 1024).toFixed(0)} KB)`;
                    fileList.appendChild(li);
                });
                lucide.createIcons();
            });
        }
    </script>

</body>

</html>