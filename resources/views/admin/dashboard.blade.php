@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-primary">Dashboard Admin</h2>
            <p class="text-muted">Selamat datang kembali, {{ Auth::user()->name }}. Kelola sistem ekstrakurikuler SMPN 13 Banjarmasin melalui panel ini.</p>
        </div>
    </div>

    {{-- Menu Navigasi Kunci --}}
    <div class="row mt-5 g-4">
        <div class="col-md-3">
            <a href="#" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manajemen Ekskul</h5>
                        <p class="card-text small">Kelola data ekstrakurikuler</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="pembina" class="text-decoration-none">
                <div class="card text-white bg-success shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Pembina</h5>
                        <p class="card-text small">Lihat dan atur pembina</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" class="text-decoration-none">
                <div class="card text-white bg-info shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Keuangan</h5>
                        <p class="card-text small">Lacak pengeluaran & pemasukan</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" class="text-decoration-none">
                <div class="card text-white bg-danger shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laporan</h5>
                        <p class="card-text small">Cetak & lihat laporan ekskul</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
