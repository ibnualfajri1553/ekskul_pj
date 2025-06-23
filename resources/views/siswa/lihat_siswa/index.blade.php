@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-success mb-4">Daftar Siswa</h2>

    {{-- Form Pencarian --}}
    <form action="{{ route('siswa.lihat_siswa.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                   placeholder="Cari nama siswa...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-success w-100">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </div>
    </form>

    {{-- Tabel --}}
    @if ($siswa->isEmpty())
        <div class="alert alert-warning">Tidak ada data siswa ditemukan.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-success text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nis_siswa }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
