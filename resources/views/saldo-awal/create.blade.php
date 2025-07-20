@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Saldo Awal</h2>

    <form action="{{ route('saldo-awal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="akuns_id" class="form-label">Nama Akun</label>
            <select name="akuns_id" id="akuns_id" class="form-control" required>
                <option value="">-- Pilih Akun --</option>
                @foreach ($akuns as $akun)
                    <option value="{{ $akun->id }}">{{ $akun->kode }} - {{ $akun->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="debit" class="form-label">Debit</label>
            <input type="number" name="debit" id="debit" class="form-control" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="kredit" class="form-label">Kredit</label>
            <input type="number" name="kredit" id="kredit" class="form-control" step="0.01" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
