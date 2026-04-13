<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa · Sekolahku</title>
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
        .logo-icon svg,
        .quick-icon svg,
        .stat-emoji svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .stat-emoji svg {
            width: 1.8rem;
            height: 1.8rem;
            color: var(--soft-purple);
        }

        .quick-icon svg {
            width: 1.1rem;
            height: 1.1rem;
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

        /* welcome banner */
        .welcome-block {
            background: linear-gradient(115deg, #dacdff, #f0e5ff);
            border-radius: 40px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(122, 92, 158, 0.2);
        }

        .welcome-text h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d1b48;
        }

        .welcome-text p {
            color: #5b4875;
        }

        .welcome-emoji {
            font-size: 3.5rem;
        }

        /* stat cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 1.5rem 1rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
        }

        .stat-emoji {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d1b48;
        }

        /* grid konten */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: var(--radius-card);
            padding: 1.8rem;
            box-shadow: var(--shadow-sm);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .card-header h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #2d1b48;
        }

        .card-link {
            color: var(--soft-purple);
            font-weight: 600;
            font-size: 0.8rem;
            text-decoration: none;
        }

        /* tabel */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.8rem 0.5rem;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--text-light);
            border-bottom: 2px solid #f0e8ff;
        }

        td {
            padding: 0.8rem 0.5rem;
            border-bottom: 1px solid #f3edff;
            font-size: 0.9rem;
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

        .category-tag {
            background: #f1ebff;
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* quick actions */
        .quick-list {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem;
            background: #f9f5ff;
            border-radius: 22px;
            transition: 0.2s;
            text-decoration: none;
            color: inherit;
        }

        .quick-item:hover {
            background: white;
            border: 1px solid #cbb8ff;
            transform: translateX(4px);
        }

        .quick-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(145deg, #5b3f86, #7a5c9e);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
        }

        .quick-text h4 {
            font-size: 0.95rem;
            font-weight: 700;
        }

        .quick-text span {
            font-size: 0.7rem;
            color: var(--text-light);
        }

        /* tips card */
        .tips-list {
            list-style: none;
        }

        .tips-list li {
            display: flex;
            gap: 0.5rem;
            padding: 0.6rem 0;
            border-bottom: 1px solid #f3edff;
            font-size: 0.85rem;
        }

        .tips-list li:last-child {
            border-bottom: none;
        }

        .check {
            color: var(--success);
            font-weight: 700;
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--text-light);
        }

        .empty-emoji {
            font-size: 3rem;
            opacity: 0.5;
        }

        .btn-empty {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 60px;
            font-weight: 600;
            margin-top: 1rem;
            display: inline-block;
            text-decoration: none;
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR SISWA -->
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
            <li class="nav-item"><a href="{{ route('dasboard.siswa') }}" class="active"><span class="nav-icon"><i
                            data-lucide="layout-dashboard"></i></span>
                    Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('aspirasi.create') }}"><span class="nav-icon"><i
                            data-lucide="pencil-line"></i></span> Buat
                    Aspirasi</a></li>
            <li class="nav-item"><a href="{{ route('aspirasi.saya') }}"><span class="nav-icon"><i
                            data-lucide="list"></i></span> Aspirasi
                    Saya</a></li>
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

    <!-- MAIN CONTENT -->
    <main class="main">
        <!-- top bar -->
        <div class="top-bar">
            <div class="page-title">
                <h1>Dashboard Siswa</h1>
                <div class="breadcrumb">Beranda / Dashboard</div>
            </div>
        </div>

        <!-- welcome banner -->
        <div class="welcome-block">
            <div class="welcome-text">
                <h2>Halo, {{ explode(' ', auth()->user()->name)[0] }}!</h2>
                <p>Sampaikan aspirasimu untuk sekolah yang lebih baik.</p>
            </div>
            <div class="welcome-emoji"><i data-lucide="sparkles"
                    style="width:2.5rem;height:2.5rem;color:var(--soft-purple);"></i></div>
        </div>

        <!-- stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="clipboard-list"></i></div>
                <div class="stat-label">Total</div>
                <div class="stat-value">{{ $totalAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="clock"></i></div>
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="loader"></i></div>
                <div class="stat-label">Diproses</div>
                <div class="stat-value">{{ $prosesAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="check-circle"></i></div>
                <div class="stat-label">Selesai</div>
                <div class="stat-value">{{ $selesaiAspirasi }}</div>
            </div>
        </div>

        <!-- grid 2 kolom -->
        <div class="dashboard-grid">
            <!-- kiri: tabel aspirasi terbaru -->
            <div class="card">
                <div class="card-header">
                    <h3>Aspirasi Terbaru</h3>
                    <a href="#" class="card-link">Lihat semua →</a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Prioritas</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aspirasiTerbaru as $aspirasi)
                                <tr>
                                    <td><strong>{{ $aspirasi->judul }}</strong></td>
                                    <td><span class="category-tag">{{ $aspirasi->kategori->nama }}</span></td>
                                    <td><span
                                            class="badge {{ $aspirasi->prioritas }}">{{ strtoupper($aspirasi->prioritas) }}</span>
                                    </td>
                                    <td><span class="badge {{ $aspirasi->status }}">{{ ucfirst($aspirasi->status) }}</span>
                                    </td>
                                    <td>{{ $aspirasi->created_at->format('d M') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 1rem;">Belum ada aspirasi terbaru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- kanan: aksi cepat + tips -->
            <div style="display:flex; flex-direction:column; gap:1.5rem;">
                <!-- quick actions -->
                <div class="card">
                    <div class="card-header">
                        <h3>Aksi Cepat</h3>
                    </div>
                    <div class="quick-list">
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="pencil-line"></i></div>
                            <div class="quick-text">
                                <h4>Buat Aspirasi Baru</h4><span>Sampaikan ide/saran</span>
                            </div>
                        </a>
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="list"></i></div>
                            <div class="quick-text">
                                <h4>Lihat Aspirasi Saya</h4><span>Pantau status</span>
                            </div>
                        </a>
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="bell"></i></div>
                            <div class="quick-text">
                                <h4>Notifikasi</h4><span>3 pemberitahuan baru</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- tips card -->
                <div class="card" style="background: #f9f5ff;">
                    <div class="card-header">
                        <h3><i data-lucide="lightbulb"
                                style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Tips</h3>
                    </div>
                    <ul class="tips-list">
                        <li><span class="check">✓</span> Tulis judul yang jelas</li>
                        <li><span class="check">✓</span> Sertakan lokasi spesifik</li>
                        <li><span class="check">✓</span> Lampirkan foto jika perlu</li>
                        <li><span class="check">✓</span> Gunakan bahasa sopan</li>
                    </ul>
                </div>
            </div>
        </div>

        @if($totalAspirasi == 0)
            <!-- empty state jika tidak ada aspirasi -->
            <div class="empty-state">
                <div class="empty-emoji"><i data-lucide="inbox" style="width:3rem;height:3rem;"></i></div>
                <h4>Belum ada aspirasi</h4>
                <p>Yuk buat aspirasi pertamamu!</p>
                <a href="{{ route('aspirasi.create') }}" class="btn-empty"><i data-lucide="plus"
                        style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> Buat Aspirasi</a>
            </div>
        @endif
    </main>
    <script>lucide.createIcons();</script>
</body>

</html>