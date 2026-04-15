<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi · Siswa</title>
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
        .notif-icon svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .notif-icon svg {
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

        /* header banner */
        .notif-header {
            background: linear-gradient(115deg, #dacdff, #f0e5ff);
            border-radius: 40px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(122, 92, 158, 0.2);
        }

        .header-text h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #2d1b48;
        }

        .header-text p {
            color: #5b4875;
        }

        .btn-mark {
            background: white;
            border: 2px solid #7a5c9e;
            color: #4a3370;
            padding: 0.7rem 1.5rem;
            border-radius: 60px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-mark:hover {
            background: #7a5c9e;
            color: white;
        }

        /* filter tabs */
        .filter-row {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: white;
            border: 2px solid #ede4ff;
            padding: 0.6rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            color: var(--text-soft);
            cursor: pointer;
            transition: 0.15s;
        }

        .filter-btn.active {
            background: #7a5c9e;
            border-color: #7a5c9e;
            color: white;
        }

        /* notif list */
        .notif-list {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .notif-item {
            background: white;
            border-radius: 30px;
            padding: 1.5rem;
            display: flex;
            gap: 1.2rem;
            align-items: flex-start;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
            transition: 0.15s;
            cursor: pointer;
        }

        .notif-item.unread {
            background: #faf8ff;
            border-left: 5px solid #7a5c9e;
        }

        .notif-icon {
            width: 50px;
            height: 50px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            flex-shrink: 0;
        }

        .notif-icon.pending {
            background: #fff3e0;
        }

        .notif-icon.proses {
            background: #e3efff;
        }

        .notif-icon.selesai {
            background: #e0f9f0;
        }

        .notif-icon.ditolak {
            background: #fee9e9;
        }

        .notif-content {
            flex: 1;
        }

        .notif-title {
            font-weight: 700;
            margin-bottom: 0.2rem;
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .notif-desc {
            color: var(--text-soft);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .notif-meta {
            display: flex;
            gap: 1rem;
            align-items: center;
            font-size: 0.75rem;
        }

        .status-badge {
            padding: 0.2rem 0.8rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.65rem;
        }

        .status-badge.pending {
            background: #fff3e0;
            color: #b45b0a;
        }

        .status-badge.proses {
            background: #e3efff;
            color: #1d4ed8;
        }

        .status-badge.selesai {
            background: #e0f9f0;
            color: #0b6e4f;
        }

        .status-badge.ditolak {
            background: #fee9e9;
            color: #b91c1c;
        }

        .notif-time {
            color: var(--text-light);
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            background: #7a5c9e;
            border-radius: 50%;
            margin-top: 0.5rem;
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 40px;
        }

        .empty-emoji {
            font-size: 4rem;
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

            .notif-header {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo-area">
            <div class="logo-icon"><i data-lucide="bell"></i></div>
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
            <li class="nav-item"><a href="{{ route('dashboard.siswa') }}"><span class="nav-icon"><i
                            data-lucide="layout-dashboard"></i></span> Dashboard</a>
            </li>
            <li class="nav-item"><a href="{{ route('aspirasi.create') }}"><span class="nav-icon"><i
                            data-lucide="pencil-line"></i></span> Buat
                    Aspirasi</a></li>
            <li class="nav-item"><a href="{{ route('aspirasi.saya') }}"><span class="nav-icon"><i
                            data-lucide="list"></i></span> Aspirasi
                    Saya</a></li>
            <li class="nav-item"><a href="{{ route('notifikasi') }}" class="active"><span class="nav-icon"><i
                            data-lucide="bell"></i></span>
                    Notifikasi</a></li>
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
                <h1>Notifikasi</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Notifikasi</div>
            </div>
        </div>

        <!-- header banner -->
        <div class="notif-header">
            <div class="header-text">
                <h2>Pusat Notifikasi</h2>
                <p>Pantau update status aspirasi dan pengaduanmu</p>
            </div>
            <button class="btn-mark" onclick="markAllRead()">✓ Tandai Semua Dibaca</button>
        </div>

        <!-- filter tabs -->
        <div class="filter-row">
            <button class="filter-btn active" onclick="filterNotif('all', this)">Semua <span
                    style="font-weight:800;">({{ $aspirasiList->count() }})</span></button>
            <button class="filter-btn" onclick="filterNotif('unread', this)">Pembaruan <span
                    style="font-weight:800;">({{ $aspirasiList->where('status', '!=', 'pending')->count() }})</span></button>
        </div>

        <!-- notif list -->
        <div class="notif-list" id="notifList">
            @forelse($aspirasiList as $aspirasi)
                <div class="notif-item {{ $aspirasi->status != 'pending' ? 'unread' : '' }}"
                    data-status="{{ $aspirasi->status != 'pending' ? 'unread' : 'read' }}">
                    <div class="notif-icon {{ $aspirasi->status }}">
                        @if($aspirasi->status == 'pending') <i data-lucide="clock" style="width:1.3rem;height:1.3rem;"></i>
                        @elseif($aspirasi->status == 'proses') <i data-lucide="loader"
                            style="width:1.3rem;height:1.3rem;"></i>
                        @elseif($aspirasi->status == 'selesai') <i data-lucide="check-circle"
                            style="width:1.3rem;height:1.3rem;"></i>
                        @else <i data-lucide="x-circle" style="width:1.3rem;height:1.3rem;"></i> @endif
                    </div>
                    <div class="notif-content">
                        <div class="notif-title">{{ $aspirasi->judul }} <span
                                class="status-badge {{ $aspirasi->status }}">{{ strtoupper($aspirasi->status) }}</span>
                        </div>
                        <div class="notif-desc">
                            @if($aspirasi->feedbacks->count() > 0)
                                Admin baru saja memberikan tanggapan:
                                "{{ Str::limit($aspirasi->feedbacks->last()->tanggapan, 50) }}"
                            @else
                                Status aspirasi kamu saat ini adalah {{ $aspirasi->status }}.
                            @endif
                        </div>
                        <div class="notif-meta"><span class="notif-time">{{ $aspirasi->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @if($aspirasi->status != 'pending')
                        <div class="unread-dot"></div>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-emoji"><i data-lucide="bell-off" style="width:3rem;height:3rem;"></i></div>
                    <h3>Belum ada notifikasi</h3>
                    <p>Kamu akan mendapat notifikasi saat ada update aspirasi.</p>
                </div>
            @endforelse
        </div>

        <!-- empty state (hidden) 
        <div class="empty-state">
            <div class="empty-emoji"><i data-lucide="bell-off" style="width:3rem;height:3rem;"></i></div>
            <h3>Belum ada notifikasi</h3>
            <p>Kamu akan mendapat notifikasi saat ada update aspirasi.</p>
        </div>
        -->
    </main>

    <script>
        function markRead(el) {
            if (el.classList.contains('unread')) {
                el.classList.remove('unread');
                el.dataset.status = 'read';
                const dot = el.querySelector('.unread-dot');
                if (dot) dot.remove();
                updateFilterCounts();
            }
        }

        function markAllRead() {
            document.querySelectorAll('.notif-item.unread').forEach(item => {
                item.classList.remove('unread');
                item.dataset.status = 'read';
                const dot = item.querySelector('.unread-dot');
                if (dot) dot.remove();
            });
            updateFilterCounts();
            alert('Semua notifikasi telah ditandai dibaca');
        }

        function filterNotif(type, btn) {
            // update active button
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // filter items
            document.querySelectorAll('.notif-item').forEach(item => {
                if (type === 'all') item.style.display = 'flex';
                else item.style.display = item.dataset.status === type ? 'flex' : 'none';
            });
        }

        function updateFilterCounts() {
            const all = document.querySelectorAll('.notif-item').length;
            const unread = document.querySelectorAll('.notif-item.unread').length;
            const read = all - unread;
            // update button text (simple)
            const btns = document.querySelectorAll('.filter-btn');
            btns[0].innerHTML = `Semua <span style="font-weight:800;">(${all})</span>`;
            btns[1].innerHTML = `Belum Dibaca <span style="font-weight:800;">(${unread})</span>`;
            btns[2].innerHTML = `Sudah Dibaca <span style="font-weight:800;">(${read})</span>`;
        }
    </script>
    <script>lucide.createIcons();</script>
</body>

</html>