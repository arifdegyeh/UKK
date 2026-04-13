<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Statistik · Admin</title>
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
        .logo-icon svg,
        .stat-emoji svg,
        .summary-icon svg,
        .priority-icon svg {
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

        .summary-icon svg {
            width: 1.6rem;
            height: 1.6rem;
            color: var(--soft-purple);
        }

        .priority-icon svg {
            width: 1.4rem;
            height: 1.4rem;
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



        /* stat cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 1.5rem 0.8rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
        }

        .stat-emoji {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d1b48;
            line-height: 1.2;
        }

        /* chart grid */
        .chart-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
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
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #2d1b48;
        }

        /* bar chart */
        .bar-container {
            display: flex;
            align-items: flex-end;
            gap: 1rem;
            height: 180px;
            margin-top: 1rem;
        }

        .bar-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
        }

        .bar-fill {
            width: 100%;
            border-radius: 8px 8px 0 0;
            min-height: 8px;
            position: relative;
        }

        .bar-value {
            position: absolute;
            top: -22px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.75rem;
            font-weight: 700;
        }

        .bar-label {
            font-size: 0.7rem;
            color: var(--text-soft);
        }

        /* donut */
        .donut-wrapper {
            display: flex;
            align-items: center;
            gap: 2rem;
            justify-content: center;
        }

        .donut {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: conic-gradient(#f59e0b 0% 25%, #3b82f6 25% 45%, #10b981 45% 85%, #ef4444 85% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .donut-inner {
            width: 85px;
            height: 85px;
            background: white;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        .donut-inner .total {
            font-size: 1.4rem;
            font-weight: 800;
            color: #2d1b48;
            line-height: 1;
        }

        .donut-inner .label {
            font-size: 0.55rem;
            color: var(--text-light);
        }

        .donut-legend {
            list-style: none;
        }

        .donut-legend li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0.5rem 0;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 4px;
        }

        .legend-value {
            margin-left: auto;
            font-weight: 700;
        }

        /* priority list */
        .priority-list {
            list-style: none;
        }

        .priority-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f3edff;
        }

        .priority-icon {
            font-size: 1.6rem;
        }

        .priority-info {
            flex: 1;
        }

        .priority-info h4 {
            font-size: 0.9rem;
        }

        .progress-bar {
            height: 6px;
            background: #f0e8ff;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 0.2rem;
        }

        .progress-fill {
            height: 100%;
            border-radius: 10px;
        }

        .priority-count {
            font-weight: 800;
            color: #2d1b48;
        }

        /* summary grid */
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .summary-item {
            background: #f9f5ff;
            border-radius: 20px;
            padding: 1.2rem;
            text-align: center;
        }

        .summary-icon {
            font-size: 1.6rem;
        }

        .summary-label {
            font-size: 0.7rem;
            color: var(--text-light);
        }

        .summary-value {
            font-size: 1.3rem;
            font-weight: 800;
            color: #2d1b48;
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
            padding: 1rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-light);
            border-bottom: 2px solid #f0e8ff;
        }

        td {
            padding: 1rem 0.5rem;
            border-bottom: 1px solid #f3edff;
            font-size: 0.9rem;
        }

        .badge {
            padding: 0.2rem 1rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
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

        .category-tag {
            background: #f1ebff;
            padding: 0.2rem 1rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }



        /* responsif */
        @media (max-width: 1000px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-radius: 0 0 40px 40px;
            }

            .main {
                max-width: 100%;
                padding: 1.5rem;
            }

            .stats-row {
                grid-template-columns: repeat(3, 1fr);
            }

            .chart-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo-area">
            <div class="logo-icon"><i data-lucide="bar-chart-2"></i></div>
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
            <li class="nav-item"><a href="{{ route('admin.kategori') }}"><span class="nav-icon"><i
                            data-lucide="list"></i></span> Kategori</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.laporan') }}" class="active"><span class="nav-icon"><i
                            data-lucide="bar-chart-2"></i></span>
                    Laporan</a></li>
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
                <h1>Laporan & Statistik</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Laporan</div>
            </div>
        </div>

        <!-- stat cards (data dummy) -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="lightbulb"></i></div>
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
            <div class="stat-card">
                <div class="stat-emoji"><i data-lucide="x-circle"></i></div>
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">{{ $ditolakAspirasi }}</div>
            </div>
        </div>

        <!-- chart bar & donut -->
        <div class="chart-row">
            <!-- bar chart: per kategori -->
            <div class="card">
                <div class="card-header">
                    <h3><i data-lucide="bar-chart-2"
                            style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Aspirasi per
                        Kategori</h3>
                </div>
                <div class="bar-container">
                    @forelse($aspirasiByKategori as $item)
                        <div class="bar-item">
                            <div class="bar-fill"
                                style="height:{{ $totalAspirasi > 0 ? ($item->aspirasis_count / $totalAspirasi * 150) : 0 }}px; background:#7a5c9e;">
                                <span class="bar-value">{{ $item->aspirasis_count }}</span>
                            </div>
                            <span class="bar-label">{{ Str::limit($item->nama, 10) }}</span>
                        </div>
                    @empty
                        <p style="color:var(--text-light); font-size: 0.8rem; margin: auto;">Belum ada data per kategori</p>
                    @endforelse
                </div>
            </div>

            <!-- donut chart: status -->
            <div class="card">
                <div class="card-header">
                    <h3><i data-lucide="target"
                            style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Distribusi Status
                    </h3>
                </div>
                <div class="donut-wrapper">
                    <div class="donut-wrapper">
                        <div class="donut" style="background: conic-gradient(
                        #f59e0b 0% {{ $totalAspirasi > 0 ? ($pendingAspirasi / $totalAspirasi * 100) : 0 }}%, 
                        #3b82f6 {{ $totalAspirasi > 0 ? ($pendingAspirasi / $totalAspirasi * 100) : 0 }}% {{ $totalAspirasi > 0 ? (($pendingAspirasi + $prosesAspirasi) / $totalAspirasi * 100) : 0 }}%, 
                        #10b981 {{ $totalAspirasi > 0 ? (($pendingAspirasi + $prosesAspirasi) / $totalAspirasi * 100) : 0 }}% {{ $totalAspirasi > 0 ? (($pendingAspirasi + $prosesAspirasi + $selesaiAspirasi) / $totalAspirasi * 100) : 0 }}%, 
                        #ef4444 {{ $totalAspirasi > 0 ? (($pendingAspirasi + $prosesAspirasi + $selesaiAspirasi) / $totalAspirasi * 100) : 0 }}% 100%
                    );">
                            <div class="donut-inner">
                                <span class="total">{{ $totalAspirasi }}</span>
                                <span class="label">total</span>
                            </div>
                        </div>
                        <ul class="donut-legend">
                            <li><span class="legend-dot" style="background:#f59e0b;"></span> Pending <span
                                    class="legend-value">{{ $pendingAspirasi }}</span></li>
                            <li><span class="legend-dot" style="background:#3b82f6;"></span> Diproses <span
                                    class="legend-value">{{ $prosesAspirasi }}</span></li>
                            <li><span class="legend-dot" style="background:#10b981;"></span> Selesai <span
                                    class="legend-value">{{ $selesaiAspirasi }}</span></li>
                            <li><span class="legend-dot" style="background:#ef4444;"></span> Ditolak <span
                                    class="legend-value">{{ $ditolakAspirasi }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- prioritas + ringkasan -->
        <div class="chart-row">
            <!-- prioritas -->
            <div class="card">
                <div class="card-header">
                    <h3><i data-lucide="flame" style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i>
                        Berdasarkan Prioritas</h3>
                </div>
                <ul class="priority-list">
                    @forelse($aspirasiByPrioritas as $pri)
                        <li class="priority-item"><span class="priority-icon">
                                @if($pri->prioritas == 'tinggi') <i data-lucide="circle"
                                style="width:1rem;height:1rem;color:#ef4444;"></i> @elseif($pri->prioritas == 'sedang')
                                    <i data-lucide="circle" style="width:1rem;height:1rem;color:#f59e0b;"></i> @else <i
                                data-lucide="circle" style="width:1rem;height:1rem;color:#10b981;"></i> @endif
                            </span>
                            <div class="priority-info">
                                <h4>{{ ucfirst($pri->prioritas) }}</h4>
                                <div class="progress-bar">
                                    <div class="progress-fill"
                                        style="width:{{ $totalAspirasi > 0 ? ($pri->total / $totalAspirasi * 100) : 0 }}%; background:{{ $pri->prioritas == 'tinggi' ? '#ef4444' : ($pri->prioritas == 'sedang' ? '#f59e0b' : '#10b981') }};">
                                    </div>
                                </div>
                            </div><span class="priority-count">{{ $pri->total }}</span>
                        </li>
                    @empty
                        <p style="color:var(--text-light); font-size: 0.8rem; text-align: center;">Belum ada data prioritas
                        </p>
                    @endforelse
                </ul>
            </div>

            <!-- ringkasan -->
            <div class="card">
                <div class="card-header">
                    <h3><i data-lucide="clipboard-list"
                            style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Ringkasan</h3>
                </div>
                <div class="summary-grid">
                    <div class="summary-item">
                        <div class="summary-icon"><i data-lucide="users"></i></div>
                        <div class="summary-label">Siswa</div>
                        <div class="summary-value">{{ $totalSiswa }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-icon"><i data-lucide="lightbulb"></i></div>
                        <div class="summary-label">Aspirasi</div>
                        <div class="summary-value">{{ $totalAspirasi }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-icon"><i data-lucide="message-circle"></i></div>
                        <div class="summary-label">Feedback</div>
                        <div class="summary-value">{{ $totalFeedback }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-icon"><i data-lucide="folder"></i></div>
                        <div class="summary-label">Kategori</div>
                        <div class="summary-value">{{ $aspirasiByKategori->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tabel aspirasi terbaru -->
        <div class="card">
            <div class="card-header">
                <h3><i data-lucide="pencil-line"
                        style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Aspirasi Terbaru</h3>
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
                        @forelse($recentAspirasi as $aspirasi)
                            <tr>
                                <td><strong>{{ $aspirasi->judul }}</strong></td>
                                <td><span class="category-tag">{{ $aspirasi->kategori->nama }}</span></td>
                                <td><span
                                        class="badge {{ $aspirasi->prioritas }}">{{ strtoupper($aspirasi->prioritas) }}</span>
                                </td>
                                <td><span class="badge {{ $aspirasi->status }}">{{ ucfirst($aspirasi->status) }}</span></td>
                                <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--text-light); padding: 2rem;">Belum
                                    ada aspirasi terbaru</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>lucide.createIcons();</script>
</body>

</html>