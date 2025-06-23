@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-warning mb-4">Edit Data Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="shadow-sm bg-white rounded p-4">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">NIS Siswa</label>
                <input type="text" name="nis_siswa" class="form-control" value="{{ $siswa->nis_siswa }}" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nomer_telpon" class="form-control" value="{{ $siswa->nomer_telpon }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required>{{ $siswa->alamat }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-save me-1"></i> Perbarui
            </button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
