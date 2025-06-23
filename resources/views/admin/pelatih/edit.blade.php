@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold mb-4">Edit Pelatih</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pelatih.update', $pelatih->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Pelatih</label>
                <input type="text" name="nama_pelatih" class="form-control" value="{{ old('nama_pelatih', $pelatih->nama_pelatih) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="L" {{ $pelatih->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pelatih->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Telepon</label>
                <input type="text" name="nomer_telpon" class="form-control" value="{{ old('nomer_telpon', $pelatih->nomer_telpon) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pelatih->alamat) }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save me-1"></i> Update
            </button>
            <a href="{{ route('admin.pelatih.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
