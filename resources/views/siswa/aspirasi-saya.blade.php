<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Saya · Siswa</title>
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

        /* ===== SIDEBAR SISWA ===== */
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

        .btn-create {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 8px 18px rgba(89, 54, 138, 0.2);
        }

        /* summary chips */
        .summary-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 2rem;
        }

        .summary-chip {
            background: white;
            padding: 0.7rem 1.5rem;
            border-radius: 60px;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
        }

        .chip-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot-pending {
            background: var(--warning);
        }

        .dot-proses {
            background: var(--info);
        }

        .dot-selesai {
            background: var(--success);
        }

        .dot-ditolak {
            background: var(--danger);
        }

        .chip-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-soft);
        }

        .chip-value {
            font-weight: 800;
            color: #2d1b48;
        }

        /* card tabel */
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
            font-weight: 700;
            color: #2d1b48;
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
            padding: 1rem 0.5rem;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--text-light);
            text-transform: uppercase;
            border-bottom: 2px solid #f0e8ff;
        }

        td {
            padding: 1rem 0.5rem;
            border-bottom: 1px solid #f3edff;
            font-size: 0.9rem;
        }

        .category-tag {
            background: #f1ebff;
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge {
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-size: 0.65rem;
            font-weight: 700;
        }

        .badge.pending {
            background: #fff3e0;
            color: #b45b0a;
        }

        .badge.proses {
            background: #e3efff;
            color: #1d4ed8;
        }

        .badge.selesai {
            background: #e0f9f0;
            color: #0b6e4f;
        }

        .badge.ditolak {
            background: #fee9e9;
            color: #b91c1c;
        }

        .badge.rendah {
            background: #e0f9f0;
            color: #0b6e4f;
        }

        .badge.sedang {
            background: #fff3e0;
            color: #b45b0a;
        }

        .badge.tinggi {
            background: #fee9e9;
            color: #b91c1c;
        }

        .action-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #b09dc9;
        }

        .action-btn:hover {
            color: #7a5c9e;
        }

        /* detail panel */
        .detail-panel {
            background: #faf8ff;
            padding: 1.5rem;
            border-radius: 24px;
            margin: 0.5rem 0;
            border: 1px solid #e6dcf5;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .detail-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .detail-value {
            font-weight: 600;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .lampiran-list {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .lampiran-item {
            background: white;
            border: 1px solid #dccdfa;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-size: 0.75rem;
            text-decoration: none;
            color: #4a3370;
            transition: 0.2s;
        }

        .lampiran-item:hover {
            background: #f3edff;
            border-color: #7a5c9e;
        }

        .lampiran-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 18px;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            transition: 0.2s;
        }

        .lampiran-img:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 3rem;
        }

        .empty-emoji {
            font-size: 4rem;
            opacity: 0.5;
        }

        .empty-btn {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 60px;
            text-decoration: none;
            display: inline-block;
            margin-top: 1.5rem;
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
                <p>Siswa · {{ auth()->user()->kelas }}</p>
            </div>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('dasboard.siswa') }}"><span class="nav-icon"><i
                            data-lucide="layout-dashboard"></i></span> Dashboard</a>
            </li>
            <li class="nav-item"><a href="{{ route('aspirasi.create') }}"><span class="nav-icon"><i
                            data-lucide="pencil-line"></i></span> Buat
                    Aspirasi</a></li>
            <li class="nav-item"><a href="{{ route('aspirasi.saya') }}" class="active"><span class="nav-icon"><i
                            data-lucide="list"></i></span>
                    Aspirasi Saya</a></li>
            <li class="nav-item"><a href="{{ route('notifikasi') }}"><span class="nav-icon"><i
                            data-lucide="bell"></i></span> Notifikasi</a>
            </li>
            <li class="nav-item"><a href="{{ route('profil') }}"><span class="nav-icon"><i
                            data-lucide="user"></i></span> Profil</a></li>
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
        <div class="top-bar">
            <div class="page-title">
                <h1>Aspirasi Saya</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Aspirasi Saya</div>
            </div>
            <a href="#" class="btn-create"><i data-lucide="plus"
                    style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> Buat Aspirasi</a>
        </div>

        <!-- summary chips -->
        <div class="summary-row">
            <div class="summary-chip"><span class="chip-dot" style="background:#7a5c9e;"></span><span
                    class="chip-label">Total</span><span class="chip-value">{{ $aspirasis->count() }}</span></div>
            <div class="summary-chip"><span class="chip-dot dot-pending"></span><span
                    class="chip-label">Pending</span><span
                    class="chip-value">{{ $aspirasis->where('status', 'pending')->count() }}</span></div>
            <div class="summary-chip"><span class="chip-dot dot-proses"></span><span
                    class="chip-label">Diproses</span><span
                    class="chip-value">{{ $aspirasis->where('status', 'proses')->count() }}</span></div>
            <div class="summary-chip"><span class="chip-dot dot-selesai"></span><span
                    class="chip-label">Selesai</span><span
                    class="chip-value">{{ $aspirasis->where('status', 'selesai')->count() }}</span></div>
            <div class="summary-chip"><span class="chip-dot dot-ditolak"></span><span
                    class="chip-label">Ditolak</span><span
                    class="chip-value">{{ $aspirasis->where('status', 'ditolak')->count() }}</span></div>
        </div>

        <!-- tabel aspirasi -->
        <div class="table-card">
            <div class="table-header">
                <h3>Daftar Aspirasi</h3>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Prioritas</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aspirasis as $aspirasi)
                            <tr>
                                <td><strong>{{ $aspirasi->judul }}</strong></td>
                                <td><span class="category-tag">{{ $aspirasi->kategori->nama }}</span></td>
                                <td>{{ $aspirasi->lokasi }}</td>
                                <td><span
                                        class="badge {{ $aspirasi->prioritas }}">{{ strtoupper($aspirasi->prioritas) }}</span>
                                </td>
                                <td><span class="badge {{ $aspirasi->status }}">{{ strtoupper($aspirasi->status) }}</span>
                                </td>
                                <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                                <td><button class="action-btn" onclick="toggleDetail('detail{{ $aspirasi->id }}')"><i
                                            data-lucide="eye" style="width:1.1rem;height:1.1rem;"></i></button></td>
                            </tr>
                            <!-- detail row -->
                            <tr id="detail{{ $aspirasi->id }}" style="display: none;">
                                <td colspan="7">
                                    <div class="detail-panel">
                                        <div class="detail-grid">
                                            <div class="detail-item"><span class="detail-label">Kategori</span><span
                                                    class="detail-value">{{ $aspirasi->kategori->nama }}</span></div>
                                            <div class="detail-item"><span class="detail-label">Lokasi</span><span
                                                    class="detail-value">{{ $aspirasi->lokasi }}</span></div>
                                            <div class="detail-item"><span class="detail-label">Prioritas</span><span
                                                    class="detail-value">{{ ucfirst($aspirasi->prioritas) }}</span></div>
                                            <div class="detail-item"><span class="detail-label">Dibuat</span><span
                                                    class="detail-value">{{ $aspirasi->created_at->format('d M Y, H:i') }}</span>
                                            </div>
                                            <div class="detail-item full-width"><span
                                                    class="detail-label">Deskripsi</span><span
                                                    class="detail-value">{{ $aspirasi->deskripsi }}</span>
                                            </div>
                                            @if($aspirasi->lampiran)
                                                <div class="detail-item full-width">
                                                    <span class="detail-label">Lampiran</span>
                                                    <div class="lampiran-list">
                                                        @foreach($aspirasi->lampiran as $path)
                                                            <div
                                                                style="display: flex; flex-direction: column; gap: 0.5rem; align-items: center;">
                                                                <a href="{{ asset('storage/' . $path) }}" target="_blank">
                                                                    <img src="{{ asset('storage/' . $path) }}" class="lampiran-img"
                                                                        alt="Lampiran">
                                                                </a>
                                                                <a href="{{ asset('storage/' . $path) }}" target="_blank"
                                                                    class="lampiran-item"><i data-lucide="paperclip"
                                                                        style="width:0.75rem;height:0.75rem;display:inline;vertical-align:middle;"></i>
                                                                    Buka</a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            @if($aspirasi->feedbacks->count() > 0)
                                                <div class="detail-item full-width" style="margin-top: 1rem;">
                                                    <span class="detail-label"
                                                        style="color: var(--soft-purple); border-bottom: 1px solid #e6dcf5; padding-bottom: 5px; margin-bottom: 5px;">Tanggapan
                                                        Admin</span>
                                                    @foreach($aspirasi->feedbacks as $feedback)
                                                        <div
                                                            style="background: white; padding: 10px; border-radius: 12px; border: 1px solid #e6dcf5; margin-bottom: 5px;">
                                                            <p style="font-size: 0.85rem; margin-bottom: 3px;">
                                                                <strong>{{ $feedback->admin->name ?? 'Admin' }}</strong> <span
                                                                    style="font-size: 0.7rem; color: #888;">({{ $feedback->created_at->format('d M Y, H:i') }})</span>
                                                            </p>
                                                            <p style="font-size: 0.9rem;">{{ $feedback->tanggapan }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center" style="text-align: center; padding: 2rem;">Belum ada
                                    aspirasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($aspirasis->isEmpty())
            <!-- empty state -->
            <div class="empty-state">
                <div class="empty-emoji"><i data-lucide="inbox" style="width:3rem;height:3rem;"></i></div>
                <h3>Belum ada aspirasi</h3>
                <p>Kamu belum membuat aspirasi apapun. Yuk sampaikan aspirasimu!</p>
                <a href="{{ route('aspirasi.create') }}" class="empty-btn"><i data-lucide="pencil-line"
                        style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> Buat Aspirasi
                    Pertama</a>
            </div>
        @endif
    </main>

    <script>
        function toggleDetail(id) {
            const row = document.getElementById(id);
            if (row) {
                row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
            }
        }
    </script>
    <script>lucide.createIcons();</script>
</body>

</html>