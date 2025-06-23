@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Anggaran</h2>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.anggaran.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Anggaran
    </a>

    @if ($anggaran->isEmpty())
        <div class="alert alert-warning">Belum ada data anggaran.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Total Anggaran</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggaran as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->kegiatan->nama_kegiatan ?? '-' }}</td>
                            <td>Rp {{ number_format($item->anggaran_total, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $item->tahun_anggaran }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.anggaran.edit', $item->id_anggaran) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.anggaran.destroy', $item->id_anggaran) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
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
