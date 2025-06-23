@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-success">Dashboard Siswa</h2>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}. Silakan akses menu di bawah ini.</p>
        </div>
    </div>

    {{-- Menu Utama --}}
    <div class="row g-4">
        <div class="col-md-3">
            <a href="/siswa/dashboard" class="text-decoration-none">
                <div class="card text-white bg-success shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">Dashboard</h5>
                        <p class="card-text small">Beranda utama siswa</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('siswa.lihat_siswa.index') }}" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">Lihat Siswa</h5>
                        <p class="card-text small">Daftar siswa ekskul</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('siswa.lihat_ekskul.index') }}" class="text-decoration-none">
                <div class="card text-white bg-info shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">Lihat Ekskul</h5>
                        <p class="card-text small">Lihat semua ekstrakurikuler</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('siswa.lihat_kegiatan.index') }}" class="text-decoration-none">
                <div class="card text-white bg-warning shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">Lihat Kegiatan</h5>
                        <p class="card-text small">Riwayat dan agenda kegiatan</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
