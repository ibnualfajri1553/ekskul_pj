@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Edit Anggaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.anggaran.update', $anggaran->id_anggaran) }}" method="POST" class="bg-white shadow-sm p-4 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kegiatan</label>
            <select name="id_kegiatan" class="form-select" required>
                <option value="">-- Pilih Kegiatan --</option>
                @foreach ($kegiatan as $item)
                    <option value="{{ $item->id_kegiatan }}" {{ old('id_kegiatan', $anggaran->id_kegiatan) == $item->id_kegiatan ? 'selected' : '' }}>
                        {{ $item->nama_kegiatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Anggaran</label>
            <input type="number" name="anggaran_total" class="form-control" value="{{ old('anggaran_total', $anggaran->anggaran_total) }}" required>
        </div>

        <select name="tahun_anggaran" class="form-select" required>
    <option value="">-- Pilih Tahun --</option>
    @for ($year = date('Y'); $year >= date('Y') - 4; $year--)
        <option value="{{ $year }}" {{ old('tahun_anggaran', $anggaran->tahun_anggaran ?? '') == $year ? 'selected' : '' }}>
            {{ $year }}
        </option>
    @endfor
</select>


        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan', $anggaran->keterangan) }}</textarea>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check2-circle me-1"></i> Update
            </button>
            <a href="{{ route('admin.anggaran.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
