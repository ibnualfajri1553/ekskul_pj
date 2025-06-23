@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-bold mb-3 text-primary">Tambah Pendaftaran Siswa ke Ekskul</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.siswa_ekskul.store') }}" method="POST" class="bg-white shadow-sm p-4 rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ekskul</label>
            <select name="id_eskul" class="form-select" required>
                <option value="">-- Pilih Ekskul --</option>
                @foreach ($ekskul as $e)
                    <option value="{{ $e->id_eskul }}">{{ $e->nama_eskul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Contoh: Aktif / Tidak Aktif" />
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('admin.siswa_ekskul.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
