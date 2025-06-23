@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">wTambah Siswa Baru</h2>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.siswa.store') }}" method="POST" class="bg-white p-5 shadow rounded-3">
        @csrf

        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="form-label">NIS Siswa</label>
                <input type="text" name="nis_siswa" class="form-control" value="{{ old('nis_siswa') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nomer_telpon" class="form-control" value="{{ old('nomer_telpon') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
