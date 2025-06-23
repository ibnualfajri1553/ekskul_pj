@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold mb-4">Edit Ekstrakurikuler</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id_eskul) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Ekskul</label>
                <input type="text" name="nama_eskul" class="form-control" value="{{ old('nama_eskul', $ekstrakurikuler->nama_eskul) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pembina</label>
                <select name="id_pembina" class="form-select">
                    <option value="">-- Pilih Pembina --</option>
                    @foreach ($pembina as $item)
                        <option value="{{ $item->id }}" {{ $ekstrakurikuler->id_pembina == $item->id ? 'selected' : '' }}>{{ $item->nama_pembina }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pelatih</label>
                <select name="id_pelatih" class="form-select">
                    <option value="">-- Pilih Pelatih --</option>
                    @foreach ($pelatih as $item)
                        <option value="{{ $item->id }}" {{ $ekstrakurikuler->id_pelatih == $item->id ? 'selected' : '' }}>{{ $item->nama_pelatih }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label class="form-label">Visi</label>
                <textarea name="visi" class="form-control" rows="2">{{ old('visi', $ekstrakurikuler->visi) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label">Misi</label>
                <textarea name="misi" class="form-control" rows="2">{{ old('misi', $ekstrakurikuler->misi) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan', $ekstrakurikuler->keterangan) }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save me-1"></i> Update
            </button>
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
