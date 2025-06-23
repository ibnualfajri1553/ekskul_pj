@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Siswa Ekstrakurikuler</h2>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah & PDF --}}
<div class="d-flex gap-2 mb-3">
    <a href="{{ route('admin.siswa_ekskul.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah Pendaftaran
    </a>
    
    <a href="{{ route('admin.siswa_ekskul.laporan.download') }}" class="btn btn-danger">
        <i class="bi bi-file-earmark-pdf me-1"></i> Download PDF
    </a>
</div>


    @if ($data->isEmpty())
        <div class="alert alert-warning">Belum ada data pendaftaran siswa ke ekskul.</div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Ekskul</th>
                        <th>Status</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->siswa->nama_siswa }}</td>
                            <td>{{ $item->ekskul->nama_eskul }}</td>
                            <td class="text-center">{{ $item->status ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.siswa_ekskul.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.siswa_ekskul.destroy', $item->id) }}" method="POST" class="d-inline"
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
