<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya · Siswa</title>
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
        .info-icon svg,
        .stat-emoji svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .info-icon svg {
            width: 1.1rem;
            height: 1.1rem;
        }

        .stat-emoji svg {
            width: 1.8rem;
            height: 1.8rem;
            color: var(--soft-purple);
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

        /* profile banner */
        .profile-banner {
            background: linear-gradient(115deg, #dacdff, #f0e5ff);
            border-radius: 40px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            border: 1px solid rgba(122, 92, 158, 0.2);
        }

        .profile-avatar {
            background: #7a5c9e;
            width: 100px;
            height: 100px;
            border-radius: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 800;
            color: white;
            box-shadow: 0 10px 20px rgba(89, 54, 138, 0.2);
            position: relative;
            overflow: hidden;
            border: 3px solid white;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-edit {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 0.7rem;
            padding: 4px 0;
            text-align: center;
            cursor: pointer;
            opacity: 0;
            transition: 0.2s;
            font-weight: 600;
        }

        .profile-avatar:hover .avatar-edit {
            opacity: 1;
        }

        .profile-name h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d1b48;
        }

        .profile-name p {
            color: #5b4875;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .badge-siswa {
            background: white;
            padding: 0.3rem 1rem;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #4a3370;
        }

        /* grid 2 kolom */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: var(--radius-card);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #2d1b48;
        }

        /* info rows */
        .info-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f3edff;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            background: #f3edff;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .info-value {
            font-weight: 600;
        }

        /* stat cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .stat-item {
            background: #f9f5ff;
            border-radius: 24px;
            padding: 1.5rem 1rem;
            text-align: center;
        }

        .stat-emoji {
            font-size: 2rem;
            margin-bottom: 0.3rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d1b48;
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--text-light);
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--text-light);
        }

        /* alert */
        .alert {
            background: #e0f9f0;
            color: #0b6e4f;
            padding: 1rem 1.5rem;
            border-radius: 60px;
            margin-bottom: 1.5rem;
            display: none;
            align-items: center;
            gap: 0.5rem;
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

            .profile-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .profile-banner {
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
            <div class="logo-icon"><i data-lucide="user"></i></div>
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
            <li class="nav-item"><a href="{{ route('aspirasi.saya') }}"><span class="nav-icon"><i
                            data-lucide="list"></i></span> Aspirasi
                    Saya</a></li>
            <li class="nav-item"><a href="{{ route('notifikasi') }}"><span class="nav-icon"><i
                            data-lucide="bell"></i></span> Notifikasi</a>
            </li>
            <li class="nav-item"><a href="{{ route('profil') }}" class="active"><span class="nav-icon"><i
                            data-lucide="user"></i></span>
                    Profil</a></li>
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
                <h1>Profil Saya</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Profil</div>
            </div>
        </div>

        <!-- alert -->
        <div class="alert" id="successAlert"><i data-lucide="check-circle"
                style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Profil berhasil diperbarui!
        </div>

        <!-- profile banner -->
        <div class="profile-banner">
            <div class="profile-avatar">
                @if($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Avatar">
                @else
                    {{ substr($user->name, 0, 1) }}
                @endif
            </div>
            <div class="profile-name">
                <h2>{{ $user->name }}</h2>
                <p><span class="badge-siswa"><i data-lucide="graduation-cap"
                            style="width:0.7rem;height:0.7rem;display:inline;vertical-align:middle;"></i> Siswa ·
                        {{ $user->kelas }}</span> <span><i data-lucide="mail"
                            style="width:0.7rem;height:0.7rem;display:inline;vertical-align:middle;"></i>
                        {{ $user->email }}</span></p>
            </div>
        </div>

        <!-- grid info + statistik -->
        <div class="profile-grid">
            <!-- kartu informasi pribadi -->
            <div class="card">
                <div class="card-header">
                    <span><i data-lucide="clipboard-list" style="width:1rem;height:1rem;"></i></span>
                    <h3>Informasi Pribadi</h3>
                </div>

                <!-- view mode -->
                <div id="infoView">
                    <div class="info-row">
                        <div class="info-icon"><i data-lucide="user"></i></div>
                        <div class="info-content">
                            <div class="info-label">Nama lengkap</div>
                            <div class="info-value">{{ $user->name }}</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i data-lucide="mail"></i></div>
                        <div class="info-content">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i data-lucide="graduation-cap"></i></div>
                        <div class="info-content">
                            <div class="info-label">Kelas</div>
                            <div class="info-value">{{ $user->kelas }}</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i data-lucide="hash"></i></div>
                        <div class="info-content">
                            <div class="info-label">NIS</div>
                            <div class="info-value">{{ $user->nis }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- kartu statistik -->
            <div class="card">
                <div class="card-header">
                    <span><i data-lucide="bar-chart-2" style="width:1rem;height:1rem;"></i></span>
                    <h3>Statistik Aspirasi</h3>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-emoji"><i data-lucide="clipboard-list"></i></div>
                        <div class="stat-value">{{ $totalAspirasi }}</div>
                        <div class="stat-label">Total</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-emoji"><i data-lucide="clock"></i></div>
                        <div class="stat-value">{{ $pendingAspirasi }}</div>
                        <div class="stat-label">Pending</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-emoji"><i data-lucide="loader"></i></div>
                        <div class="stat-value">{{ $prosesAspirasi }}</div>
                        <div class="stat-label">Diproses</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-emoji"><i data-lucide="check-circle"></i></div>
                        <div class="stat-value">{{ $selesaiAspirasi }}</div>
                        <div class="stat-label">Selesai</div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>lucide.createIcons();</script>
</body>

</html>