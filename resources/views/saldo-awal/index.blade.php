@extends('layouts.admin')

@section('title', 'Saldo Awal')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('saldo-awal.create') }}" class="btn btn-success">+ TAMBAH AKUN</a>

        <form action="{{ route('saldo-awal.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="🔍 Cari akun..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary ms-2">Search</button>
            @if(request('search'))
                <a href="{{ route('saldo-awal.index') }}" class="btn btn-outline-danger ms-2">Reset</a>
            @endif
        </form>
    </div>

    @if (request('search'))
        <div class="alert alert-info">
            Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong>
        </div>
    @endif

    <h4 class="mt-4">Daftar Saldo Awal</h4>
     <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                    <td>{{ $item->akun->kode ?? '-' }} - {{ $item->akun->nama ?? '-' }}</td>
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
