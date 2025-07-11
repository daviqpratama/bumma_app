@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Saldo Awal</h2>

    <form action="{{ route('saldo-awal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="akun">Nama Akun</label>
            <input type="text" name="akun" id="akun" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="debit">Debit</label>
            <input type="number" name="debit" id="debit" class="form-control">
        </div>

        <div class="mb-3">
            <label for="kredit">Kredit</label>
            <input type="number" name="kredit" id="kredit" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
