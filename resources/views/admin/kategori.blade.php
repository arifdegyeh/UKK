<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori · Admin Sekolah</title>
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

        /* ===== SIDEBAR (sama seperti sebelumnya) ===== */
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
        .logo-icon svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

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

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 2rem 2.5rem;
            max-width: calc(100% - 260px);
            overflow-y: auto;
        }

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

        /* card form */
        .form-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d1b48;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 2fr auto;
            gap: 1rem;
            align-items: end;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .input-group label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-light);
        }

        .input-group input,
        .input-group textarea {
            padding: 0.8rem 1.2rem;
            border: 2px solid #ede4ff;
            border-radius: 30px;
            font-size: 0.9rem;
            background: white;
            transition: 0.2s;
        }

        .input-group input:focus,
        .input-group textarea:focus {
            outline: none;
            border-color: var(--soft-purple);
            box-shadow: 0 0 0 4px rgba(122, 92, 158, 0.1);
        }

        .btn-save {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
            box-shadow: 0 10px 20px rgba(89, 54, 138, 0.2);
        }

        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 25px rgba(89, 54, 138, 0.3);
        }

        /* tabel card */
        .table-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .table-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d1b48;
        }

        .total-badge {
            background: #f1ebff;
            color: #4a3370;
            padding: 0.4rem 1.2rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 1rem 0.5rem 1rem 0;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #f0e8ff;
        }

        td {
            padding: 1rem 0.5rem 1rem 0;
            border-bottom: 1px solid #f6f0ff;
            font-size: 0.95rem;
        }

        .category-badge {
            background: #f1ebff;
            padding: 0.3rem 1.2rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #4a3370;
            display: inline-block;
        }

        .count-chip {
            background: #e6dcf5;
            color: #3a2660;
            padding: 0.2rem 1rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .action-group {
            display: flex;
            gap: 0.3rem;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 12px;
            background: transparent;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.15s;
            color: #8d79af;
        }

        .btn-icon:hover {
            background: #f3edff;
            color: #4f3d70;
            transform: scale(1.05);
        }

        /* modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 40px;
            padding: 2.5rem;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 30px 60px rgba(45, 27, 72, 0.3);
        }

        .modal-content h3 {
            font-size: 1.3rem;
            margin-bottom: 1.8rem;
            color: #2d1b48;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-cancel {
            background: #f1ebff;
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-update {
            background: #2d1b48;
            color: white;
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-light);
        }

        .empty-emoji {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* responsif */
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
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo-area">
            <div class="logo-icon"><i data-lucide="clipboard-list"></i></div>
        </div>
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
                <p>Administrator</p>
            </div>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('dasboard') }}"><span class="nav-icon"><i
                            data-lucide="layout-dashboard"></i></span> Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.aspirasi') }}"><span class="nav-icon"><i
                            data-lucide="lightbulb"></i></span> Aspirasi</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.users') }}"><span class="nav-icon"><i
                            data-lucide="users"></i></span> Pengguna</a></li>
            <li class="nav-item"><a href="{{ route('admin.kategori') }}" class="active"><span class="nav-icon"><i
                            data-lucide="list"></i></span>
                    Kategori</a></li>
            <li class="nav-item"><a href="{{ route('admin.laporan') }}"><span class="nav-icon"><i
                            data-lucide="bar-chart-2"></i></span> Laporan</a>
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: auto;">
            @csrf
            <button type="submit" class="logout-btn" style="width: 100%;">
                <span><i data-lucide="log-out"></i></span> Keluar
            </button>
        </form>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <!-- top bar -->
        <div class="top-bar">
            <div class="page-title">
                <h1>Kelola Kategori</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Kategori</div>
            </div>
        </div>

        <!-- form tambah kategori -->
        <div class="form-card">
            <div class="form-title">
                <span><i data-lucide="plus"
                        style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i></span> Tambah Kategori
                Baru
            </div>

            @if(session('success'))
                <div style="background: #e0f9f0; padding: 1rem; border-radius: 12px; color: #0b6e4f; margin-bottom: 1rem;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="input-group">
                        <label>Nama kategori</label>
                        <input type="text" name="nama" placeholder="contoh: Sarana Kelas" required>
                    </div>
                    <div class="input-group">
                        <label>Deskripsi (opsional)</label>
                        <input type="text" name="deskripsi" placeholder="misal: meja, kursi, AC">
                    </div>
                    <button type="submit" class="btn-save"><i data-lucide="save"
                            style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i>
                        Simpan</button>
                </div>
            </form>
        </div>

        <!-- tabel kategori -->
        <div class="table-card">
            <div class="table-header">
                <h3>Daftar Kategori</h3>
                <span class="total-badge">{{ $kategoris->count() }} kategori</span>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Jumlah aspirasi</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategoris as $kategori)
                            <tr>
                                <td><span class="category-badge">{{ $kategori->nama }}</span></td>
                                <td>{{ $kategori->deskripsi ?? '—' }}</td>
                                <td><span class="count-chip">{{ $kategori->aspirasis_count }} aspirasi</span></td>
                                <td>{{ $kategori->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="action-group">
                                        <button class="btn-icon"
                                            onclick="openModal({{ $kategori->id }}, '{{ $kategori->nama }}', '{{ $kategori->deskripsi }}')"><i
                                                data-lucide="pencil" style="width:0.9rem;height:0.9rem;"></i></button>
                                        <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus kategori ini? Semua aspirasi di dalamnya juga akan terhapus.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-icon"><i data-lucide="trash-2"
                                                    style="width:0.9rem;height:0.9rem;"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-emoji"><i data-lucide="inbox" style="width:3rem;height:3rem;"></i>
                                        </div>
                                        <h4>Belum ada kategori</h4>
                                        <p>Tambahkan kategori baru menggunakan form di atas.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- empty state jika kosong (tidak dipakai karena ada data) 
            <div class="empty-state">
                <div class="empty-emoji"><i data-lucide="inbox" style="width:3rem;height:3rem;"></i></div>
                <h4>Belum ada kategori</h4>
                <p>Tambahkan kategori baru menggunakan form di atas.</p>
            </div>
            -->
        </div>
    </main>

    <!-- Modal Edit (hidden by default) -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h3><i data-lucide="pencil" style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Edit
                Kategori</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group" style="margin-bottom: 1.2rem;">
                    <label>Nama kategori</label>
                    <input type="text" name="nama" id="editNama" required>
                </div>
                <div class="input-group" style="margin-bottom: 1.2rem;">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" id="editDeskripsi">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-update">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, nama, deskripsi) {
            document.getElementById('editNama').value = nama;
            document.getElementById('editDeskripsi').value = deskripsi === 'null' ? '' : deskripsi;

            // Set action URL dynamically
            const form = document.getElementById('editForm');
            form.action = `/admin/kategori/${id}`;

            document.getElementById('editModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        // klik di luar modal untuk tutup
        document.getElementById('editModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });
    </script>
    <script>lucide.createIcons();</script>
</body>

</html>