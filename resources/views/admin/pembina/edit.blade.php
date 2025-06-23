@extends('layouts.app')

@section('content')
<h4 class="fw-bold mb-4">Edit Data Pembina</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pembina.update', $pembina->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">NIP</label>
            <input type="text" name="nip_pembina" class="form-control" value="{{ old('nip_pembina', $pembina->nip_pembina) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nama Pembina</label>
            <input type="text" name="nama_pembina" class="form-control" value="{{ old('nama_pembina', $pembina->nama_pembina) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="L" {{ $pembina->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $pembina->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomer_telpon" class="form-control" value="{{ old('nomer_telpon', $pembina->nomer_telpon) }}" required>
        </div>

        <div class="col-12">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pembina->alamat) }}</textarea>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Update</button>
        <a href="{{ route('admin.pembina.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
</form>
@endsection
