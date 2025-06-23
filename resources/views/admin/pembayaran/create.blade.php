@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold text-primary mb-4">Tambah Pembayaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pembayaran.store') }}" method="POST" class="shadow-sm bg-white p-4 rounded">
        @csrf

        <div class="mb-3">
            <label for="id_keuangan" class="form-label fw-semibold">Kegiatan / Keuangan</label>
            <select name="id_keuangan" id="id_keuangan" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach ($keuangan as $item)
                    <option value="{{ $item->id_keuangan }}">
                        {{ $item->ekstrakurikuler->nama_eskul ?? '-' }} - 
                        {{ $item->anggaran->kegiatan->nama_kegiatan ?? '-' }} 
                        (Saldo: Rp {{ number_format($item->jumlah_anggaran, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label fw-semibold">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_pembayaran" class="form-label fw-semibold">Jumlah Pembayaran</label>
            <input type="number" name="jumlah_pembayaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label fw-semibold">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" placeholder="Contoh: Transfer, Tunai" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Batal
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
