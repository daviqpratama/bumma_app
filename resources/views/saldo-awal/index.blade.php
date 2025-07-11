@extends('layouts.admin')

@section('title', 'Saldo Awal')

@section('content')
<div class="container">

    <!-- Tombol & Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        @if (!isset($editItem))
            <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#formSaldoAwal" aria-expanded="false" aria-controls="formSaldoAwal">
                + NAMA AKUN
            </button>
        @endif

        <!-- 🔍 Form Search -->
        <form action="{{ route('saldo-awal.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="🔍 Cari akun..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary ms-2">Search</button>
        </form>
    </div>

    <!-- FORM: Tambah (Collapse) atau Edit -->
    @if (isset($editItem))
        {{-- FORM EDIT --}}
        <div class="card card-body mb-4">
            <h3>Edit Saldo Awal</h3>
            <form action="{{ route('saldo-awal.update', $editItem->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="akun">Nama Akun</label>
                    <input type="text" name="akun" class="form-control" value="{{ old('akun', $editItem->akun) }}" required>
                </div>
                <div class="mb-3">
                    <label for="debit">Debit</label>
                    <input type="number" name="debit" class="form-control" value="{{ old('debit', $editItem->debit) }}" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="kredit">Kredit</label>
                    <input type="number" name="kredit" class="form-control" value="{{ old('kredit', $editItem->kredit) }}" step="0.01">
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('saldo-awal.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @else
        {{-- FORM TAMBAH --}}
        <div class="collapse mb-4" id="formSaldoAwal">
            <div class="card card-body">
                <h3>Input Saldo Awal</h3>
                <form action="{{ route('saldo-awal.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="akun">Nama Akun</label>
                        <input type="text" name="akun" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="debit">Debit</label>
                        <input type="number" name="debit" class="form-control" value="0" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="kredit">Kredit</label>
                        <input type="number" name="kredit" class="form-control" value="0" step="0.01">
                    </div>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    @endif

    <!-- Tabel -->
    <h4 class="mt-4">Daftar Saldo Awal</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->akun }}</td>
                    <td>Rp {{ number_format($item->debit, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->kredit, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('saldo-awal.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('saldo-awal.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
