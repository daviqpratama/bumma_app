@extends('layouts.navigation')

@section('content')

{{-- CEK ROLE --}}
@if(auth()->user()->role === 'admin')

    {{-- === DASHBOARD UNTUK ADMIN === --}}
    <div class="container mt-5 pt-4">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">Selamat Datang Admin {{ auth()->user()->name }}</h1>
            <p class="lead text-secondary">Silakan kelola data keuangan dan laporan BUMMA</p>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-4 mb-5">
            <a href="{{ route('saldo-awal') }}" class="btn btn-warning px-4 py-2 shadow-sm">Saldo Awal</a>
            <a href="{{ route('jurnal-umum') }}" class="btn btn-warning px-4 py-2 shadow-sm">Jurnal Umum</a>
            <a href="{{ route('buku-besar.index') }}" class="btn btn-warning px-4 py-2 shadow-sm">Buku Besar</a>
            <a href="{{ route('neraca-saldo.index') }}" class="btn btn-warning px-4 py-2 shadow-sm">Neraca Saldo</a>
            <a href="{{ route('jurnal-penyesuaian.index') }}" class="btn btn-warning px-4 py-2 shadow-sm">Jurnal Penyesuaian</a>
            <a href="{{ route('laporan-keuangan') }}" class="btn btn-warning px-4 py-2 shadow-sm">Laporan Keuangan</a>
        </div>
    </div>

@elseif(auth()->user()->role === 'user')

    {{-- === DASHBOARD UNTUK USER === --}}
    <div class="container mt-5 pt-4">

        {{-- Greeting untuk user --}}
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">Selamat Datang {{ auth()->user()->name }}</h1>
            <p class="lead text-secondary">Terima kasih telah bergabung dengan BUMMA Papua.</p>
        </div>

        {{-- Gambar Besar Tengah --}}
        <div class="d-flex justify-content-center align-items-center mb-5" style="height: 75vh;">
            <img src="{{ asset('images/adat.jpg') }}"
                alt="Gambar Adat"
                style="max-width: 1100px; max-height: 600px; width: 100%; height: auto; border-radius: .375rem;">
        </div>

        {{-- Deskripsi Teks --}}
        <div class="text-center mx-auto mb-5" style="max-width: 680px; font-size: 1.2rem; color: #444; line-height: 1.6;">
            <p>Badan Usaha Milik Masyarakat Adat (BUMMA) Papua adalah sebuah entitas usaha yang dimiliki dan dikelola oleh komunitas adat dengan tujuan utama meningkatkan kesejahtraan masyarakat adat di Papua melalui pengelolaan sumber daya alam dan ekonomi berbasis kearifan lokal.</p>
            <p>BUMMA Mare dan Namblong dibentuk sebagai inisiatif marga-marga Sub Suku Namblong dan Mare untuk membantu pemberdayaan ekonomi masyarakat adat di wilayah Mare dan Namblong di Papua.</p>
        </div>

        {{-- Content user asli --}}
        <div class="mb-5">
            @include('partials.user-dashboard-content')
        </div>

    </div>

@else

    {{-- ROLE TIDAK DIKENALI --}}
    <div class="container mt-5 text-center">
        <h1 class="text-danger fw-bold fs-4">Role pengguna tidak dikenali.</h1>
    </div>

@endif

@endsection
