@extends('layouts.app')

@section('content')
<div class="p-4 rounded shadow-sm" style="background-color: #f7faef;">
    <h2 class="mb-4" style="color: #2e4d1f;"><strong>Buku Besar</strong></h2>

    <form method="GET" action="{{ route('buku-besar.index') }}" class="d-flex flex-wrap gap-2 align-items-center mb-4">
        <select name="akun" class="form-select" style="max-width: 180px; background-color: #e3f2d3;">
            <option value="">Pilih Akun</option>
            @foreach ($akunList as $akun)
                <option value="{{ $akun->id }}" {{ request('akun') == $akun->id ? 'selected' : '' }}>
                    {{ $akun->nama }}
                </option>
            @endforeach
        </select>

        <input type="date" name="tanggal" class="form-control" style="max-width: 200px; background-color: #e3f2d3;" value="{{ request('tanggal') }}">

        <button type="submit" class="btn" style="background-color: #4c6e36; color: white;">Terapkan Filter</button>

        <a href="{{ route('buku-besar.export.pdf', request()->all()) }}" class="btn btn-outline-success">Ekspor PDF</a>
        <a href="{{ route('buku-besar.export.excel', request()->all()) }}" class="btn btn-outline-success">Ekspor Excel</a>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-sm align-middle bg-white shadow-sm">
            <thead style="background-color: #deeacc;" class="text-center">
                <tr>
                    <th>Tanggal</th>
                    <th>No Ref</th>
                    <th>Deskripsi</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                @php $saldo = 0; @endphp
                @forelse ($transaksi as $t)
                    @php
                        $debit = $t->debit ?? 0;
                        $kredit = $t->kredit ?? 0;
                        $saldo += $debit - $kredit;
                    @endphp
                    <tr class="text-center">
                        <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y') }}</td>
                        <td>{{ $t->no_ref }}</td>
                        <td class="text-start">{{ $t->deskripsi }}</td>
                        <td>{{ $debit ? number_format($debit, 0, ',', '.') : '-' }}</td>
                        <td>{{ $kredit ? number_format($kredit, 0, ',', '.') : '-' }}</td>
                        <td>{{ number_format($saldo, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $transaksi->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
