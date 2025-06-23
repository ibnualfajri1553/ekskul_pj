@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Kegiatan Ekstrakurikuler</h2>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    

    {{-- Tombol Tambah --}}
    <div class="d-flex gap-2 mb-3">
       <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kegiatan
        </a>
        <a href="{{ route('admin.kegiatan.laporan.download') }}" class="btn btn-danger mb-3">
            <i class="bi bi-plus-circle me-1"></i> Download PDF
        </a>
    </div>

    @if ($kegiatan->isEmpty())
        <div class="alert alert-warning">Belum ada data kegiatan.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Ekskul</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Keterangan</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nama_kegiatan }}</td>
                            <td>{{ $item->ekstrakurikuler->nama_eskul ?? '-' }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.kegiatan.edit', $item->id_kegiatan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.kegiatan.destroy', $item->id_kegiatan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
