@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Saldo Awal</h2>

    <form action="{{ route('saldo-awal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="akun_id">Nama Akun</label>
            <select name="akun_id" id="akun_id" class="form-control" required>
                <option value="">-- Pilih Akun --</option>
                @foreach ($akuns as $akun)
                    <option value="{{ $akun->id }}">{{ $akun->kode }} - {{ $akun->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="debit">Debit</label>
            <input type="number" name="debit" id="debit" class="form-control" step="0.01">
        </div>

        <div class="mb-3">
            <label for="kredit">Kredit</label>
            <input type="number" name="kredit" id="kredit" class="form-control" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
