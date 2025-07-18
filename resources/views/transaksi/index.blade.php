@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi</h1>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div style="color: green; margin-bottom: 1em;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol Tambah --}}
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary" style="margin-bottom: 1em;">+ Tambah Transaksi</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr style="background-color: #f0f0f0;">
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Akun Debit</th>
                    <th>Nominal Debit</th>
                    <th>Akun Kredit</th>
                    <th>Nominal Kredit</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                        <td>{{ $transaksi->akunDebit->nama ?? '-' }}</td>
                        <td>Rp{{ number_format($transaksi->nominal_debit, 2, ',', '.') }}</td>
                        <td>{{ $transaksi->akunKredit->nama ?? '-' }}</td>
                        <td>Rp{{ number_format($transaksi->nominal_kredit, 2, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
