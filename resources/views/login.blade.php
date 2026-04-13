<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk · platform sekolah</title>
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
            --bg-light: #f6f3fe;
            --card-bg: rgba(255, 255, 255, 0.9);
            --text-dark: #1e1029;
            --text-soft: #5b4875;
            --shadow: 0 25px 50px -12px rgba(59, 43, 92, 0.3);
            --radius-card: 40px;
            --radius-field: 30px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #f1ebff 0%, #e6d9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
        }

        /* background subtle */
        .bg-orb {
            position: fixed;
            width: 400px;
            height: 400px;
            background: #d2befa;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.25;
            z-index: 0;
        }

        .orb1 {
            top: -100px;
            left: -100px;
        }

        .orb2 {
            bottom: -100px;
            right: -100px;
            background: #b59de0;
        }

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 480px;
        }

        /* card utama — simpel, glossy, ungu soft */
        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-card);
            padding: 2.8rem 2.2rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        /* header */
        .header-icon {
            font-size: 3.2rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(130deg, #3b2b5c, #6e4f9e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .login-sub {
            text-align: center;
            color: var(--text-soft);
            font-size: 1rem;
            margin-bottom: 2.5rem;
        }

        /* tabs halus */
        .tab-row {
            display: flex;
            gap: 8px;
            background: #ede7ff;
            padding: 6px;
            border-radius: 70px;
            margin-bottom: 2.2rem;
        }

        .tab-btn {
            flex: 1;
            border: none;
            background: transparent;
            padding: 0.9rem 0.5rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.95rem;
            color: #4f3d70;
            cursor: pointer;
            transition: 0.25s;
            font-family: 'Inter', sans-serif;
        }

        .tab-btn.active {
            background: white;
            color: #2d1b48;
            box-shadow: 0 8px 18px -6px rgba(90, 60, 140, 0.25);
        }

        /* panel */
        .panel {
            display: none;
            animation: fade 0.3s ease;
        }

        .panel.active {
            display: block;
        }

        @keyframes fade {
            from {
                opacity: 0.3;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* form */
        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #392d52;
            margin-bottom: 6px;
            display: block;
            letter-spacing: 0.2px;
        }

        .field {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #a28fc0;
            pointer-events: none;
        }

        .field-icon svg {
            width: 1.1rem;
            height: 1.1rem;
        }

        .header-icon svg {
            width: 2.5rem;
            height: 2.5rem;
            color: #5f4090;
        }

        .toggle-eye svg {
            width: 1.1rem;
            height: 1.1rem;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e3d5ff;
            border-radius: 50px;
            font-size: 0.95rem;
            background: white;
            transition: 0.2s;
            font-family: 'Inter', sans-serif;
            color: #1e1029;
        }

        .field input:focus,
        .field select:focus {
            outline: none;
            border-color: #7a5c9e;
            box-shadow: 0 0 0 4px rgba(122, 92, 158, 0.15);
        }

        .field input::placeholder {
            color: #b7a5d3;
            font-weight: 400;
        }

        .toggle-eye {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #8d79af;
            padding: 4px;
        }

        /* row checkbox + lupa */
        .row-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.8rem 0;
            flex-wrap: wrap;
            gap: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #4d3a6b;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .remember input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #6e4f9e;
        }

        .forgot-link {
            color: #5f4090;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* tombol masuk */
        .btn-login {
            background: linear-gradient(145deg, #3b2b5c, #5f4090);
            color: white;
            border: none;
            width: 100%;
            padding: 1.1rem;
            border-radius: 60px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            box-shadow: 0 18px 28px -12px rgba(59, 43, 92, 0.4);
            transition: all 0.25s;
            margin-bottom: 1.2rem;
        }

        .btn-login:hover {
            background: linear-gradient(145deg, #4b3770, #7651b3);
            transform: scale(1.02) translateY(-2px);
            box-shadow: 0 25px 35px -10px #4d3779;
        }

        /* link balik */
        .back-home {
            text-align: center;
            margin-top: 1.2rem;
        }

        .back-home a {
            color: #6a4f96;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-home a:hover {
            color: #392d52;
        }

        /* alert sederhana */
        .alert {
            padding: 1rem 1.2rem;
            border-radius: 60px;
            margin-bottom: 1.8rem;
            font-size: 0.9rem;
            font-weight: 500;
            background: #f2ebff;
            border: 1px solid #cbb8ff;
            color: #392d52;
        }

        /* responsif */
        @media (max-width: 500px) {
            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-title {
                font-size: 1.7rem;
            }

            .tab-btn {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <!-- background blur -->
    <div class="bg-orb orb1"></div>
    <div class="bg-orb orb2"></div>

    <div class="login-container">
        <div class="login-card">

            <!-- icon & headline -->
            <div class="header-icon"><i data-lucide="lock-keyhole"></i></div>
            <h1 class="login-title">masuk dulu, yuk</h1>
            <div class="login-sub">pilih peranmu buat lanjut</div>

            <!-- alert dummy (bisa diaktifkan kalau perlu) -->
            <!-- <div class="alert">selamat datang kembali!</div> -->
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert" style="color: #991b1b; background: #fef2f2; border-color: #fecaca;">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <!-- tab siswa / admin -->
            <div class="tab-row" id="tabContainer">
                <button class="tab-btn active" data-tab="siswa"><i data-lucide="graduation-cap"
                        style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> siswa</button>
                <button class="tab-btn" data-tab="admin"><i data-lucide="shield"
                        style="width:0.9rem;height:0.9rem;display:inline;vertical-align:middle;"></i> admin</button>
            </div>

            <!-- FORM SISWA -->
            <div class="panel active" id="panel-siswa">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <label class="input-label">NIS / username</label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="user"></i></span>
                            <input type="text" name="nis" placeholder="cth: 2024123" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="input-label">password</label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="lock"></i></span>
                            <input type="password" name="password" placeholder="••••••••" id="passSiswa" required>
                            <button class="toggle-eye" type="button" onclick="togglePass('passSiswa', this)"><i
                                    data-lucide="eye"></i></button>
                        </div>
                    </div>

                    <div class="row-flex">
                        <label class="remember">
                            <input type="checkbox" name="remember"> <span>ingat saya</span>
                        </label>
                        <a href="#" class="forgot-link">lupa password?</a>
                    </div>

                    <button class="btn-login" type="submit">masuk sebagai siswa →</button>
                </form>
            </div>

            <!-- FORM ADMIN (tanpa pilih role) -->
            <div class="panel" id="panel-admin">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <label class="input-label">email</label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="mail"></i></span>
                            <input type="email" name="email" placeholder="admin@sekolah.id" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="input-label">password</label>
                        <div class="field">
                            <span class="field-icon"><i data-lucide="lock"></i></span>
                            <input type="password" name="password" placeholder="••••••••" id="passAdmin" required>
                            <button class="toggle-eye" type="button" onclick="togglePass('passAdmin', this)"><i
                                    data-lucide="eye"></i></button>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="admin">

                    <div class="row-flex">
                        <label class="remember">
                            <input type="checkbox" name="remember"> <span>ingat saya</span>
                        </label>
                        <a href="#" class="forgot-link">lupa password?</a>
                    </div>

                    <button class="btn-login" type="submit">masuk sebagai admin →</button>
                </form>
            </div>

            <!-- link ke beranda -->
            <div class="back-home">
                <a href="{{ route('landingpage') }}">← kembali ke beranda</a>
            </div>

        </div>
    </div>

    <script>
        // switch tab
        const tabs = document.querySelectorAll('.tab-btn');
        const panels = {
            siswa: document.getElementById('panel-siswa'),
            admin: document.getElementById('panel-admin')
        };

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // update active tab
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // show panel
                const target = tab.dataset.tab; // 'siswa' or 'admin'
                Object.values(panels).forEach(p => p.classList.remove('active'));
                if (target === 'siswa') panels.siswa.classList.add('active');
                else panels.admin.classList.add('active');
            });
        });

        // toggle password visibility
        function togglePass(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i data-lucide="eye-off"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i data-lucide="eye"></i>';
            }
            lucide.createIcons();
        }

        // prevent form submit refresh (demo only) dihapus karena sudah online ke database
    </script>
    <script>lucide.createIcons();</script>
</body>

</html>