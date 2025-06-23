@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Edit Inventory</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 small">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.inventory.update', ['id_inventaris' => $inventaris->id_inventaris]) }}" method="POST"
        class="bg-white shadow-sm p-4 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control"
                value="{{ old('nama_barang', $inventaris->nama_barang) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $inventaris->jumlah) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kondisi</label>
            <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi', $inventaris->kondisi) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kegiatan Terkait</label>
            <select name="id_kegiatan" class="form-select" required>
                <option value="">-- Pilih Kegiatan --</option>
                @foreach ($kegiatan as $k)
                <option value="{{ $k->id_kegiatan }}"
                    {{ old('id_kegiatan', $inventaris->id_kegiatan) == $k->id_kegiatan ? 'selected' : '' }}>
                    {{ $k->nama_kegiatan }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check2-circle me-1"></i> Update
            </button>
            <a href="{{ route('admin.inventory.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
