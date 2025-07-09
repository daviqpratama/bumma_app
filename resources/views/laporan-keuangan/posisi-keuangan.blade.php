@extends('layouts.admin')

@section('title', 'Laporan Posisi Keuangan')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white text-center">
        <strong>
            BUMMA <br>
            LAPORAN POSISI KEUANGAN <br>
            PERIODE 2025
        </strong>
    </div>
    <div class="card-body row">
        {{-- AKTIVA --}}
        <div class="col-md-6">
            <strong>AKTIVA</strong><br><br>
            @foreach ($aktiva as $kelompok => $items)
                <strong>{{ $kelompok }}</strong>
                <ul>
                    @foreach ($items as $item)
                        <li>{{ $item->nama_akun }} .................................................. Rp {{ number_format($item->saldo, 0, ',', '.') }}</li>
                    @endforeach
                </ul>
            @endforeach

            <strong>
                Jumlah Aktiva .................................... 
                Rp {{ number_format($aktiva->flatten()->sum('saldo'), 0, ',', '.') }}
            </strong>
        </div>

        {{-- PASIVA --}}
        <div class="col-md-6">
            <strong>PASIVA</strong><br><br>
            @foreach ($pasiva as $kelompok => $items)
                <strong>{{ $kelompok }}</strong>
                <ul>
                    @foreach ($items as $item)
                        <li>{{ $item->nama_akun }} .................................................. Rp {{ number_format($item->saldo, 0, ',', '.') }}</li>
                    @endforeach
                </ul>
            @endforeach

            <strong>
                Jumlah Pasiva .................................... 
                Rp {{ number_format($pasiva->flatten()->sum('saldo'), 0, ',', '.') }}
            </strong>
        </div>
    </div>
</div>
@endsection
