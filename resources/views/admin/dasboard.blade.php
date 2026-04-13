<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard · admin sekolah</title>
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

        /* ===== SIDEBAR ===== */
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
        .stat-icon svg,
        .activity-icon svg,
        .quick-icon svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .stat-icon svg {
            width: 1.4rem;
            height: 1.4rem;
        }

        .activity-icon svg {
            width: 1.1rem;
            height: 1.1rem;
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

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 2rem 2.5rem;
            max-width: calc(100% - 260px);
            overflow-y: auto;
        }

        /* top bar */
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

        .top-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .search-wrap {
            position: relative;
        }

        .search-wrap input {
            padding: 0.8rem 1rem 0.8rem 2.7rem;
            border: 2px solid #e6dcf5;
            border-radius: 60px;
            font-size: 0.9rem;
            width: 250px;
            background: white;
            transition: 0.2s;
        }

        .search-wrap input:focus {
            outline: none;
            border-color: var(--soft-purple);
            box-shadow: 0 0 0 4px rgba(122, 92, 158, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #b7a5d3;
        }

        .notif-bell {
            background: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: var(--shadow-sm);
            border: 2px solid #f0e8ff;
            cursor: pointer;
            position: relative;
        }

        .notif-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--danger);
            color: white;
            font-size: 0.65rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
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
            box-shadow: var(--shadow-sm);
        }

        .welcome-text h2 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #2d1b48;
        }

        .welcome-text p {
            color: #5b4875;
        }

        .welcome-emoji {
            font-size: 4rem;
            filter: drop-shadow(0 8px 12px rgba(90, 60, 140, 0.3));
        }

        /* stat cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: var(--radius-card);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: 0.25s;
            border: 1px solid #f0e8ff;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--light-purple);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: #f3edff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #5b3f86;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: #2a173f;
            line-height: 1;
            margin-top: 0.3rem;
        }

        /* 2 kolom utama */
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
            border: 1px solid #f0e8ff;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .card-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d1b48;
        }

        .card-link {
            color: var(--soft-purple);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
        }

        /* tabel mini */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.8rem 0.5rem 0.8rem 0;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border-bottom: 2px solid #f0e8ff;
        }

        td {
            padding: 0.8rem 0.5rem 0.8rem 0;
            border-bottom: 1px solid #f6f0ff;
            font-size: 0.9rem;
        }

        .badge {
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
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

        .category-tag {
            background: #f1ebff;
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #4a3370;
        }

        /* activity feed */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            gap: 0.8rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f3edff;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 44px;
            height: 44px;
            background: #f3edff;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #5b3f86;
        }

        .activity-desc h4 {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .activity-desc p {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .activity-time {
            font-size: 0.7rem;
            color: #b09dc9;
            margin-top: 0.15rem;
        }

        /* quick actions */
        .quick-grid {
            display: grid;
            gap: 0.7rem;
        }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem;
            background: #f9f5ff;
            border-radius: 24px;
            transition: 0.2s;
            text-decoration: none;
            color: inherit;
            border: 1px solid transparent;
        }

        .quick-item:hover {
            border-color: var(--light-purple);
            background: white;
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
            font-size: 1.1rem;
            color: white;
        }

        .quick-text h4 {
            font-size: 0.95rem;
            font-weight: 700;
        }

        .quick-text span {
            font-size: 0.75rem;
            color: var(--text-light);
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 2.5rem 1rem;
            color: var(--text-light);
        }

        .empty-emoji {
            font-size: 3rem;
            margin-bottom: 0.8rem;
            opacity: 0.4;
        }

        /* mobile */
        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
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

            .welcome-block {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 500px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrap input {
                width: 100%;
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
            <li class="nav-item"><a href="{{ route('dasboard') }}" class="active"><span class="nav-icon"><i data-lucide="layout-dashboard"></i></span>
                    Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.aspirasi') }}"><span class="nav-icon"><i data-lucide="lightbulb"></i></span> Aspirasi</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.users') }}"><span class="nav-icon"><i data-lucide="users"></i></span> Pengguna</a></li>
            <li class="nav-item"><a href="{{ route('admin.kategori') }}"><span class="nav-icon"><i data-lucide="list"></i></span> Kategori</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.laporan') }}"><span class="nav-icon"><i data-lucide="bar-chart-2"></i></span> Laporan</a>
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
                <h1>Dashboard</h1>
                <div class="breadcrumb">Beranda / Dashboard admin</div>
            </div>
            <div class="top-actions">
                <div class="search-wrap">
                    <span class="search-icon"><i data-lucide="search" style="width:0.9rem;height:0.9rem;"></i></span>
                    <input type="text" placeholder="Cari...">
                </div>
                <div class="notif-bell">
                    <i data-lucide="bell" style="width:1.2rem;height:1.2rem;"></i>
                    <span class="notif-badge">3</span>
                </div>
            </div>
        </div>

        <!-- welcome banner -->
        <div class="welcome-block">
            <div class="welcome-text">
                <h2>Halo, {{ explode(' ', auth()->user()->name)[0] }}!</h2>
                <p>Ada {{ $pendingAspirasi }} aspirasi baru (pending) yang perlu dicek. Yuk kelola sekarang.</p>
            </div>
            <div class="welcome-emoji"><i data-lucide="sparkles" style="width:2.5rem;height:2.5rem;color:var(--soft-purple);"></i></div>
        </div>

        <!-- stat cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i data-lucide="mail"></i></div>
                </div>
                <div class="stat-label">Total aspirasi</div>
                <div class="stat-value">{{ $totalAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i data-lucide="clock"></i></div>
                </div>
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i data-lucide="loader"></i></div>
                </div>
                <div class="stat-label">Diproses</div>
                <div class="stat-value">{{ $prosesAspirasi }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i data-lucide="check-circle"></i></div>
                </div>
                <div class="stat-label">Selesai</div>
                <div class="stat-value">{{ $selesaiAspirasi }}</div>
            </div>
        </div>

        <!-- grid 2 kolom -->
        <div class="dashboard-grid">
            <!-- kiri: tabel aspirasi terbaru -->
            <div class="card">
                <div class="card-header">
                    <h3>Aspirasi terbaru</h3>
                    <a href="#" class="card-link">Lihat semua →</a>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aspirasiTerbaru as $aspirasi)
                                <tr>
                                    <td>{{ $aspirasi->judul }}</td>
                                    <td><span class="category-tag">{{ $aspirasi->kategori->nama }}</span></td>
                                    <td><span class="badge {{ $aspirasi->status }}">{{ $aspirasi->status }}</span></td>
                                    <td>{{ $aspirasi->created_at->format('d M') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 1rem;">Belum ada aspirasi terbaru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- kanan: aktivitas + aksi cepat -->
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- aktivitas -->
                <div class="card">
                    <div class="card-header">
                        <h3>Aktivitas terbaru</h3>
                    </div>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon"><i data-lucide="lightbulb"></i></div>
                            <div class="activity-desc">
                                <h4>Aspirasi baru</h4>
                                <p>AC rusak · oleh Andi</p>
                                <span class="activity-time">10 menit lalu</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon"><i data-lucide="loader"></i></div>
                            <div class="activity-desc">
                                <h4>Status diperbarui</h4>
                                <p>Kursi patah → diproses</p>
                                <span class="activity-time">1 jam lalu</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon"><i data-lucide="check-circle"></i></div>
                            <div class="activity-desc">
                                <h4>Laporan selesai</h4>
                                <p>Toilet bocor telah diperbaiki</p>
                                <span class="activity-time">3 jam lalu</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- aksi cepat -->
                <div class="card">
                    <div class="card-header">
                        <h3>Aksi cepat</h3>
                    </div>
                    <div class="quick-grid">
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="lightbulb"></i></div>
                            <div class="quick-text">
                                <h4>Kelola aspirasi</h4>
                                <span>Lihat & proses laporan</span>
                            </div>
                        </a>
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="list"></i></div>
                            <div class="quick-text">
                                <h4>Kategori</h4>
                                <span>Atur daftar kategori</span>
                            </div>
                        </a>
                        <a href="#" class="quick-item">
                            <div class="quick-icon"><i data-lucide="users"></i></div>
                            <div class="quick-text">
                                <h4>Manajemen user</h4>
                                <span>Tambah / edit pengguna</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- empty state demo (hidden) 
        <div class="empty-state">
            <div class="empty-emoji"><i data-lucide="inbox" style="width:3rem;height:3rem;"></i></div>
            <h4>Belum ada aspirasi</h4>
            <p>Data akan muncul di sini.</p>
        </div>
        -->
    </main>
    <script>lucide.createIcons();</script>
</body>

</html>