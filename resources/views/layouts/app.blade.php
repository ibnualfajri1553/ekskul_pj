<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-layout {
            flex: 1;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #ddd;
        }
        .content-area {
            flex-grow: 1;
            padding: 30px;
        }
        .sidebar .nav-link.active {
            font-weight: bold;
            color: #0d6efd;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-4">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Sistem Informasi Ekstrakurikuler</span>

            @auth
                <div class="d-flex ms-auto align-items-center">
                    <span class="me-3 text-muted">Halo, {{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Layout Utama -->
    <div class="main-layout">
        <!-- Sidebar -->
        @auth
        <aside class="sidebar">
            <div class="logo-container">
                {{-- Ganti src berikut dengan logo asli kamu di public/images/logo.png --}}
                <img src="{{ asset('images/logo-smpn13.png') }}" alt="Logo SMPN 13">
                <p class="mt-2 fw-bold text-center small">SMPN 13 BANJARMASIN</p>
            </div>

            <nav class="nav flex-column">
                @if (Auth::user()->role === 'admin')
                    <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ url('admin/siswa') }}" class="nav-link">Siswa</a>
                    <a href="{{ url('admin/pembina') }}" class="nav-link">Pembina</a>
                    <a href="{{ url('admin/pelatih') }}" class="nav-link">Pelatih</a>
                    <a href="{{ url('admin/ekstrakurikuler') }}" class="nav-link">Ekstrakurikuler</a>
                    <a href="{{ url('admin/siswa-ekskul') }}" class="nav-link">Siswa Ekstrakurikuler</a>
                    <a href="{{ url('admin/kegiatan') }}" class="nav-link">Kegiatan</a>
                    <a href="{{ url('admin/inventory') }}" class="nav-link">Inventaris</a>
                    <a href="{{ url('admin/keuangan') }}" class="nav-link">Keuangan</a>
                    <a href="{{ url('admin/anggaran') }}" class="nav-link">Anggaran</a>
                    <a href="{{ url('admin/pembayaran') }}" class="nav-link">Pembayaran</a>
                    <a href="#" class="nav-link">Laporan</a>

                @elseif (Auth::user()->role === 'siswa')
                    <a href="/siswa/dashboard" class="nav-link {{ request()->is('siswa/dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('siswa.lihat_siswa.index') }}" class="nav-link">Lihat Siswa</a>
                    <a href="{{ route('siswa.lihat_ekskul.index') }}" class="nav-link">Lihat Ekskul</a>
                    <a href="{{ route('siswa.lihat_kegiatan.index') }}" class="nav-link">Lihat Kegiatan</a>
                @endif
            </nav>
        </aside>
        @endauth

        <!-- Konten -->
        <main class="content-area">
            @yield('content')
        </main>
    </div>

</body>
</html>
