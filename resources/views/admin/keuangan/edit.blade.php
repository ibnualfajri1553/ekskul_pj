@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Edit Data Keuangan</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.keuangan.update', $keuangan->id_keuangan) }}" method="POST" class="shadow-sm p-4 rounded bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_eskul" class="form-label">Ekstrakurikuler</label>
            <select name="id_eskul" id="id_eskul" class="form-select" required>
                <option value="">-- Pilih Ekstrakurikuler --</option>
                @foreach ($ekskul as $item)
                    <option value="{{ $item->id_eskul }}" {{ $item->id_eskul == $keuangan->id_eskul ? 'selected' : '' }}>
                        {{ $item->nama_eskul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_anggaran" class="form-label">Kegiatan</label>
            <select name="id_anggaran" id="id_anggaran" class="form-select" required>
                <option value="">-- Pilih Kegiatan --</option>
                @foreach ($anggaran as $item)
                    <option value="{{ $item->id_anggaran }}" {{ $item->id_anggaran == $keuangan->id_anggaran ? 'selected' : '' }}>
                        {{ $item->kegiatan->nama_kegiatan ?? 'Tanpa Nama Kegiatan' }} - Rp {{ number_format($item->anggaran_total, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
            <input type="text" name="jenis_transaksi" id="jenis_transaksi" class="form-control" value="{{ $keuangan->jenis_transaksi }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
            <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control" value="{{ $keuangan->tanggal_terima }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_anggaran" class="form-label">Jumlah Anggaran</label>
            <input type="number" name="jumlah_anggaran" id="jumlah_anggaran" class="form-control" value="{{ $keuangan->jumlah_anggaran }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $keuangan->keterangan }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.keuangan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
