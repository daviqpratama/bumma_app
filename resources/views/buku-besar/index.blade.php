@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Buku Besar</h1>

    {{-- Filter --}}
    <form method="GET" action="{{ route('buku-besar.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="akun_id" class="form-label">Filter Akun</label>
            <select name="akun_id" id="akun_id" class="form-select">
                <option value="">-- Semua Akun --</option>
                @foreach ($daftarAkun as $akun)
                    <option value="{{ $akun->id }}" {{ request('akun_id') == $akun->id ? 'selected' : '' }}>
                        {{ $akun->kode }} - {{ $akun->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="tanggal" class="form-label">Sampai Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ request('tanggal') }}">
        </div>

        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('buku-besar.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Tabel --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Akun</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->akun->kode ?? '-' }} - {{ $item->akun->nama ?? '-' }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>Rp{{ number_format($item->debit, 2, ',', '.') }}</td>
                    <td>Rp{{ number_format($item->kredit, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $transaksis->links() }}
    </div>
</div>
@endsection
