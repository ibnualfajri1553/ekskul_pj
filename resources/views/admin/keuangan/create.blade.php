@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Keuangan</h1>

    <form action="{{ route('admin.keuangan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Ekstrakurikuler</label>
            <select name="id_eskul" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($ekskul as $e)
                <option value="{{ $e->id_eskul }}">{{ $e->nama_eskul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Anggaran</label>
            <select name="id_anggaran" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($anggaran as $a)
                <option value="{{ $a->id_anggaran }}">{{ $a->nama_anggaran }} (Rp {{ number_format($a->jumlah_anggaran, 0, ',', '.') }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Transaksi</label>
            <input type="text" name="jenis_transaksi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Terima</label>
            <input type="date" name="tanggal_terima" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.keuangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
