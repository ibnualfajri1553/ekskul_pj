@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Daftar Ekstrakurikuler</h2>

    {{-- Form Pencarian --}}
    <form action="{{ route('siswa.lihat_ekskul.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                   placeholder="Cari nama ekskul...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </div>
    </form>

    {{-- Tabel --}}
    @if ($ekskul->isEmpty())
        <div class="alert alert-warning">Tidak ada data ekstrakurikuler ditemukan.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Ekskul</th>
                        <th>Pembina</th>
                        <th>Pelatih</th>
                        <th>Visi & Misi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekskul as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nama_eskul }}</td>
                            <td>{{ $item->pembina->nama_pembina ?? '-' }}</td>
                            <td>{{ $item->pelatih->nama_pelatih ?? '-' }}</td>
                            <td>
                                <strong>Visi:</strong> {{ $item->visi ?? '-' }}<br>
                                <strong>Misi:</strong> {{ $item->misi ?? '-' }}
                            </td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
