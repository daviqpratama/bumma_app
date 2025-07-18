@extends('layouts.admin')

@section('title', 'Laporan Sisa Hasil Usaha')

@section('content')
<div class="card shadow rounded">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">BUMMA</h5>
        <h6 class="mb-0">LAPORAN SISA HASIL USAHA</h6>
        <small class="mb-0">PERIODE {{ $tahun }}</small>
    </div>
    <div class="card-body">
        <h6><strong>Pendapatan:</strong></h6>
        <ul>
            @forelse ($pendapatanAkuns as $akun)
                <li>{{ $akun->nama_akun ?? $akun->nama }} ................................ Rp {{ number_format($akun->jumlah, 0, ',', '.') }}</li>
            @empty
                <li>Tidak ada data pendapatan.</li>
            @endforelse
        </ul>
        <p><strong>Jumlah Pendapatan ......................................... Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></p>

        <h6><strong>Beban:</strong></h6>
        <ul>
            @forelse ($bebanAkuns as $akun)
                <li>{{ $akun->nama_akun ?? $akun->nama }} ................................ Rp {{ number_format($akun->jumlah, 0, ',', '.') }}</li>
            @empty
                <li>Tidak ada data beban.</li>
            @endforelse
        </ul>
        <p><strong>Jumlah Beban ......................................... Rp {{ number_format($totalBeban, 0, ',', '.') }}</strong></p>

        <p><strong>Laba/Rugi Sebelum Pajak ............................. Rp {{ number_format($labaSebelumPajak, 0, ',', '.') }}</strong></p>
    </div>
</div>
@endsection
