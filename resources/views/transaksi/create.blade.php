@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <div class="card border-success shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Transaksi</h5>
        </div>

        <div class="card-body">
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Jika belum ada akun --}}
            @if ($akuns->isEmpty())
                <div class="alert alert-warning">Belum ada data akun. Silakan tambahkan akun terlebih dahulu.</div>
            @endif

            {{-- Form --}}
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
                </div>

                <div class="mb-3">
                    <label for="akun_debit" class="form-label">Akun Debit</label>
                    <select name="akun_debit" class="form-select" required>
                        <option value="">-- Pilih Akun Debit --</option>
                        @foreach ($akuns as $akun)
                            <option value="{{ $akun->id }}" {{ old('akun_debit') == $akun->id ? 'selected' : '' }}>
                                {{ $akun->kode }} - {{ $akun->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nominal_debit" class="form-label">Nominal Debit</label>
                    <input type="number" name="nominal_debit" class="form-control" value="{{ old('nominal_debit') }}" required>
                </div>

                <div class="mb-3">
                    <label for="akun_kredit" class="form-label">Akun Kredit</label>
                    <select name="akun_kredit" class="form-select" required>
                        <option value="">-- Pilih Akun Kredit --</option>
                        @foreach ($akuns as $akun)
                            <option value="{{ $akun->id }}" {{ old('akun_kredit') == $akun->id ? 'selected' : '' }}>
                                {{ $akun->kode }} - {{ $akun->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nominal_kredit" class="form-label">Nominal Kredit</label>
                    <input type="number" name="nominal_kredit" class="form-control" value="{{ old('nominal_kredit') }}" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
