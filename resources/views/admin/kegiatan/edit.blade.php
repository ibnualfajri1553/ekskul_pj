@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Edit Kegiatan</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kegiatan.update', $kegiatan->id_kegiatan) }}" method="POST" class="shadow-sm bg-white rounded p-4">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Ekstrakurikuler</label>
            <select name="id_eskul" class="form-select" required>
                <option value="">-- Pilih Ekskul --</option>
                @foreach ($ekskul as $item)
                    <option value="{{ $item->id_eskul }}" {{ $kegiatan->id_eskul == $item->id_eskul ? 'selected' : '' }}>
                        {{ $item->nama_eskul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ $kegiatan->nama_kegiatan }}" required>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ $kegiatan->tanggal_mulai }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ $kegiatan->tanggal_selesai }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $kegiatan->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save me-1"></i> Perbarui
        </button>
        <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
