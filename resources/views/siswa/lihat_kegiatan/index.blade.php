@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Daftar Kegiatan Ekstrakurikuler</h2>

    {{-- Form Pencarian --}}
    <form action="{{ route('siswa.lihat_kegiatan.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                   placeholder="Cari nama kegiatan...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </div>
    </form>

    {{-- Tabel --}}
    @if ($kegiatan->isEmpty())
        <div class="alert alert-warning">Tidak ada data kegiatan ditemukan.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Ekskul</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nama_kegiatan }}</td>
                            <td>{{ $item->ekstrakurikuler->nama_eskul ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
