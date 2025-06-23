@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Data Siswa</h2>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>

        <a href="{{ route('admin.siswa.laporan.download') }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf me-1"></i> Download PDF
        </a>
    </div>

    
    {{-- Tabel --}}
    @if ($siswa->isEmpty())
        <div class="alert alert-warning">
            Belum ada data siswa.
        </div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Telpon</th>
                        <th>Alamat</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nis_siswa }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->nomer_telpon }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.siswa.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('admin.siswa.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
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
