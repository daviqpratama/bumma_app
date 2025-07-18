@extends('layouts.admin')

@section('title', 'Edit Saldo Awal')

@section('content')
<div class="container">
    <h3>Edit Saldo Awal</h3>

    <form action="{{ route('saldo-awal.update', $editItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="akuns_id">Nama Akun</label>
            <select name="akuns_id" id="akuns_id" class="form-control" required>
                <option value="">-- Pilih Akun --</option>
                @foreach ($akuns as $akun)
                    <option value="{{ $akun->id }}" {{ $akun->id == $editItem->akuns_id ? 'selected' : '' }}>
                        {{ $akun->kode }} - {{ $akun->nama }}
                    </option>
                @endforeach
            </select>
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
