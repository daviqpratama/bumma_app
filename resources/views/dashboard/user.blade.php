@extends('layouts.navigation')

@section('content')

{{-- CEK ROLE --}}
@if(auth()->user()->role === 'admin')

    {{-- === DASHBOARD UNTUK ADMIN === --}}
    <div class="container mt-5" style="padding-top: 80px;">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-4">Selamat Datang Admin {{ auth()->user()->name }}</h1>
            <p class="text-lg text-gray-600">Silakan kelola data keuangan dan laporan BUMMA</p>
        </div>

        <div class="flex justify-center gap-4 mt-10 flex-wrap">
            <a href="{{ route('saldo-awal') }}" class="btn btn-warning">Saldo Awal</a>
            <a href="{{ route('jurnal-umum') }}" class="btn btn-warning">Jurnal Umum</a>
            <a href="{{ route('buku-besar.index') }}" class="btn btn-warning">Buku Besar</a>
            <a href="{{ route('neraca-saldo.index') }}" class="btn btn-warning">Neraca Saldo</a>
            <a href="{{ route('jurnal-penyesuaian.index') }}" class="btn btn-warning">Jurnal Penyesuaian</a>
            <a href="{{ route('laporan-keuangan') }}" class="btn btn-warning">Laporan Keuangan</a>
        </div>
    </div>

@elseif(auth()->user()->role === 'user')

    {{-- === DASHBOARD UNTUK USER (ASLI DARI KAMU) === --}}
    <div class="container mt-5" style="padding-top: 80px;">
        <!-- Bagian Gambar Besar di Tengah -->
        <div class="d-flex justify-content-center"
            style="height: 80vh; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/adat.jpg') }}"
                style="max-width: 1169.78px; max-height: 658px; width: 100%; height: auto;" alt="Gambar Adat">
        </div>

        <!-- Bagian Teks Deskripsi di bawah gambar -->
        <div class="text-center mt-5" style="font-size:1.5rem; color:#333; padding-top:110px;">
            <p>Badan Usaha Milik Masyarakat Adat (BUMMA) Papua adalah</p>
            <p>sebuah entitas usaha yang dimiliki dan dikelola oleh komunitas</p>
            <p>adat dengan tujuan utama meningkatkan kesejahtraan</p>
            <p>masyarakat adat di Papua melalui pengelolaan sumber daya</p>
            <p>alam dan ekonomi berbasis kearifan lokal.</p>
            <p>BUMMA Mare dan Namblong dibentuk sebagai inisiatif marga-</p>
            <p>marga Sub Suku Namblong dan Mare untuk membantu</p>
            <p>pemberdayaan ekonomi masyarakat adat di wilayah Mare dan</p>
            <p>Namblong di Papua.</p>
        </div>

        <!-- === SISANYA TAMPILAN USER KAMU YANG ASLI TIDAK SAYA UBAH === -->
        @include('partials.user-dashboard-content')

    </div>

@else

    {{-- ROLE TIDAK DIKENALI --}}
    <div class="container mt-5 text-center">
        <h1 class="text-xl text-red-500 font-bold">Role pengguna tidak dikenali.</h1>
    </div>

@endif

@endsection
