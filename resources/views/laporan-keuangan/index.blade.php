@extends('layouts.admin') {{-- Ganti dari layouts.app ke layouts.admin --}}

@section('title', 'Laporan Keuangan')

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <a href="{{ route('laporan-keuangan.sisa-hasil-usaha') }}" class="card h-100 text-center text-dark text-decoration-none shadow-sm border-0">
            <div class="card-body">
                <div class="fs-1 mb-2">💵</div>
                <h5 class="card-title">Laporan Sisa Hasil Usaha</h5>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('laporan-keuangan.posisi-keuangan') }}" class="card h-100 text-center text-dark text-decoration-none shadow-sm border-0">
            <div class="card-body">
                <div class="fs-1 mb-2">⚓</div>
                <h5 class="card-title">Laporan Posisi Keuangan</h5>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('laporan-keuangan.perubahan-ekuitas') }}" class="card h-100 text-center text-dark text-decoration-none shadow-sm border-0">
            <div class="card-body">
                <div class="fs-1 mb-2">📃</div>
                <h5 class="card-title">Laporan Perubahan Ekuitas</h5>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('laporan-keuangan.arus-kas') }}" class="card h-100 text-center text-dark text-decoration-none shadow-sm border-0">
            <div class="card-body">
                <div class="fs-1 mb-2">📲</div>
                <h5 class="card-title">Laporan Arus Kas</h5>
            </div>
        </a>
    </div>
</div>
@endsection
