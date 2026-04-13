<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Users · Admin</title>
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

        /* ===== SIDEBAR (sama) ===== */
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
        .stat-icon svg {
            width: 1em;
            height: 1em;
        }

        .logo-icon svg {
            width: 1.4em;
            height: 1.4em;
        }

        .stat-icon svg {
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

        /* stat cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8ff;
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: #2d1b48;
        }

        /* form tambah */
        .form-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: 1rem;
            font-weight: 700;
            color: #2d1b48;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .input-group label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-light);
            letter-spacing: 0.3px;
        }

        .input-group input {
            padding: 0.7rem 1rem;
            border: 2px solid #ede4ff;
            border-radius: 30px;
            font-size: 0.9rem;
            background: white;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--soft-purple);
            box-shadow: 0 0 0 3px rgba(122, 92, 158, 0.1);
        }

        .btn-save {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 1rem;
            box-shadow: 0 10px 18px rgba(89, 54, 138, 0.2);
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
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.6rem 1rem 0.6rem 2.4rem;
            border: 2px solid #ede4ff;
            border-radius: 60px;
            width: 250px;
        }

        .search-icon {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: #b09dc9;
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #b59de0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #2d1b48;
            overflow: hidden;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge {
            padding: 0.2rem 1rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge.aktif {
            background: #e0f9f0;
            color: #0b6e4f;
        }

        .badge.siswa {
            background: #e3efff;
            color: #1d4ed8;
        }

        .badge.admin {
            background: #f1ebff;
            color: #4a3370;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.08);
            color: #b91c1c;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            cursor: pointer;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-light);
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
            }

            .main {
                max-width: 100%;
                padding: 1.5rem;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo-area">
            <div class="logo-icon"><i data-lucide="users"></i></div>
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
            <li class="nav-item"><a href="{{ route('admin.users') }}" class="active"><span class="nav-icon"><i
                            data-lucide="users"></i></span>
                    Users</a></li>
            <li class="nav-item"><a href="{{ route('admin.kategori') }}"><span class="nav-icon"><i
                            data-lucide="list"></i></span> Kategori</a>
            </li>
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
                <h1>Manajemen Users</h1>
                <div class="breadcrumb"><a href="#">Dashboard</a> / Users</div>
            </div>
        </div>

        <!-- stat cards -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon"><i data-lucide="users"></i></div>
                <div class="stat-label">Total Users</div>
                <div class="stat-value">{{ $totalUsers }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i data-lucide="check-circle"></i></div>
                <div class="stat-label">Aktif</div>
                <div class="stat-value">{{ $activeUsers }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i data-lucide="user-plus"></i></div>
                <div class="stat-label">Baru (bulan ini)</div>
                <div class="stat-value">{{ $newUsers }}</div>
            </div>
        </div>

        <!-- form tambah siswa -->
        <div class="form-card">
            <div class="form-title"><i data-lucide="plus"
                    style="width:1rem;height:1rem;display:inline;vertical-align:middle;"></i> Tambah Siswa Baru</div>

            @if(session('success'))
                <div style="background: #e0f9f0; padding: 1rem; border-radius: 12px; color: #0b6e4f; margin-bottom: 1rem;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="background: #ffebe9; padding: 1rem; border-radius: 12px; color: #b91c1c; margin-bottom: 1rem;">
                    <ul style="margin: 0; padding-left: 1.5rem; font-size: 0.85rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="input-group">
                        <label>Nama lengkap *</label>
                        <input type="text" name="name" placeholder="Nama lengkap" required>
                    </div>
                    <div class="input-group">
                        <label>Email *</label>
                        <input type="email" name="email" placeholder="email@contoh.com" required>
                    </div>
                    <div class="input-group">
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="Min 6 karakter" required>
                    </div>
                    <div class="input-group">
                        <label>NIS</label>
                        <input type="text" name="nis" placeholder="Nomor induk">
                    </div>
                    <div class="input-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" placeholder="XII RPL 1">
                    </div>
                    <div class="input-group">
                        <label>No. telepon</label>
                        <input type="text" name="no_telepon" placeholder="08xxxx">
                    </div>
                </div>
                <div class="input-group" style="margin-bottom:1rem;">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Jl. ...">
                </div>
                <button type="submit" class="btn-save"><i data-lucide="save"
                        style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> Simpan
                    Siswa</button>
            </form>
        </div>

        <!-- tabel users -->
        <div class="table-card">
            <div class="table-header">
                <h3 style="font-weight:700;">Daftar Semua Users</h3>
                <div class="search-box">
                    <span class="search-icon"><i data-lucide="search" style="width:0.9rem;height:0.9rem;"></i></span>
                    <input type="text" placeholder="Cari user..." onkeyup="filterTable()">
                </div>
            </div>

            <div class="table-responsive">
                <table id="usersTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td style="vertical-align: middle;">
                                    <div class="user-info">
                                        <div class="avatar">
                                            @if($user->foto)
                                                <img src="{{ asset('storage/' . $user->foto) }}" alt="Avatar">
                                            @else
                                                {{ substr($user->name, 0, 1) }}
                                            @endif
                                        </div>
                                        <div><strong>{{ $user->name }}</strong></div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge {{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                                <td><span class="badge aktif">Aktif</span></td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete"><i data-lucide="trash-2"
                                                style="width:0.7rem;height:0.7rem;display:inline;vertical-align:middle;"></i>
                                            Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-emoji"><i data-lucide="users" style="width:3rem;height:3rem;"></i>
                                        </div>
                                        <h4>Belum ada user</h4>
                                        <p>Tambahkan user baru menggunakan form di atas.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- empty state jika kosong (tidak dipakai)
            <div class="empty-state">
                <div class="empty-emoji"><i data-lucide="users" style="width:3rem;height:3rem;"></i></div>
                <h4>Belum ada user</h4>
                <p>Tambahkan user baru menggunakan form di atas.</p>
            </div>
            -->
        </div>
    </main>

    <script>
        function filterTable() {
            const input = document.querySelector('.search-box input').value.toLowerCase();
            const rows = document.querySelectorAll('#usersTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }
    </script>
    <script>lucide.createIcons();</script>
</body>

</html>