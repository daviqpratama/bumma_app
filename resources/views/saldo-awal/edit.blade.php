@extends('layouts.admin')

@section('title', 'Edit Saldo Awal')

@section('content')
<div class="container">
    <h3>Edit Saldo Awal</h3>

    <form action="{{ route('saldo-awal.update', $editItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="akun">Nama Akun</label>
            <input type="text" name="akun" class="form-control"
                value="{{ old('akun', $editItem->akun) }}" required>
        </div>
        <div class="mb-3">
            <label for="debit">Debit</label>
            <input type="number" name="debit" class="form-control" step="0.01"
                value="{{ old('debit', $editItem->debit) }}">
        </div>
        <div class="mb-3">
            <label for="kredit">Kredit</label>
            <input type="number" name="kredit" class="form-control" step="0.01"
                value="{{ old('kredit', $editItem->kredit) }}">
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('saldo-awal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
