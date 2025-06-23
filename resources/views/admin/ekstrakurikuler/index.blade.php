@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Ekstrakurikuler</h2>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Ekskul
        </a>
       <a href="{{ route('admin.ekstrakurikuler.laporan.download') }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf me-1"></i> Download PDF
        </a>
    </div>

    @if ($ekskul->isEmpty())
        <div class="alert alert-warning">Belum ada data ekstrakurikuler.</div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Ekskul</th>
                        <th>Pembina</th>
                        <th>Pelatih</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Keterangan</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekskul as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nama_eskul }}</td>
                            <td>{{ $item->pembina->nama_pembina ?? '-' }}</td>
                            <td>{{ $item->pelatih->nama_pelatih ?? '-' }}</td>
                            <td>{{ $item->visi }}</td>
                            <td>{{ $item->misi }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.ekstrakurikuler.edit', $item->id_eskul) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id_eskul) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
