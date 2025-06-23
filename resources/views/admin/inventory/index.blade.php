@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Inventory</h2>

    {{-- Alert jika ada pesan sukses --}}
    @if (session('success'))
    <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle me-1"></i> Tambah Inventory
        </a>
        <a href="{{ route('admin.inventory.laporan.download') }}" class="btn btn-danger mb-3">
            <i class="bi bi-file-earmark-pdf me-1"></i> Download PDF
        </a>
    </div>

    {{-- Tabel Inventaris --}}
    @if ($inventaris->isEmpty())
    <div class="alert alert-warning">Belum ada data inventory.</div>
    @else
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover bg-white align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Kegiatan</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventaris as $i => $item)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td class="text-center">{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->kegiatan->nama_kegiatan ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.inventory.edit', ['id_inventaris' => $item->id_inventaris]) }}"
                            class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.inventory.destroy', ['id_inventaris' => $item->id_inventaris]) }}"
                            method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
