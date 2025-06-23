@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Keuangan</h2>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.keuangan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Keuangan
        </a>
    </div>

    @if ($keuangan->isEmpty())
        <div class="alert alert-warning">Belum ada data keuangan yang tercatat.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-striped table-bordered align-middle text-nowrap bg-white">
                <thead class="table-primary text-center align-middle">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Ekstrakurikuler</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Transaksi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keuangan as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->ekstrakurikuler->nama_eskul ?? '-' }}</td>
                            <td>{{ $item->anggaran->kegiatan->nama_kegiatan ?? '-' }}</td>
                            <td>{{ $item->jenis_transaksi }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_terima)->format('d-m-Y') }}</td>
                            <td class="text-end">Rp {{ number_format($item->jumlah_anggaran, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.keuangan.edit', $item->id_keuangan) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="bi bi-pencil-square">Edit</i>
                                </a>
                                <form action="{{ route('admin.keuangan.destroy', $item->id_keuangan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash-fill">Hapus</i>
                                    </button>
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
