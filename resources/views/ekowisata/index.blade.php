@extends('layouts.navigation')

@section('content')
<div style="display: flex; height: 100vh; box-sizing: border-box;">
    <!-- Sidebar -->
    <aside style="
        position: sticky;
        top: 80px;
        width: 202px;
        background: white;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        padding: 16px;
        height: 100%;
        flex-shrink: 0;
    ">
        <div style="margin-bottom: 24px; text-align: center;">
            <h2 style="font-weight: bold; font-size: 20px; color: #1F2937; margin: 0;">Daftar Usaha</h2>
        </div>
        <nav style="display: flex; flex-direction: column; gap: 12px;">
            <a href="{{ route('kehutanan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">Kehutanan</a>
            <a href="{{ route('ekowisata.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">Ekowisata</a>
            <a href="{{ route('pertanian.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">Pertanian</a>
            <a href="{{ route('peternakan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">Peternakan</a>
            <a href="{{ route('perikanan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">Perikanan</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main style="flex: 1; overflow-y: auto; padding: 16px; box-sizing: border-box; height: 100%;">
        <!-- Judul dan Subjudul -->
        <div class="mb-8">
            <h1 style="font-size: 48px; font-weight: bold; line-height: 1; margin-bottom: 12px;">EKOWISATA</h1>
            <p style="font-size: 20px; color: #4B5563; margin-bottom: 40px;">KAPAL LAUT</p>
        </div>

        <!-- Konten Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Gambar -->
            <div>
                <div style="width: 524px; height: 294px; overflow: hidden;">
                    <img src="{{ asset('images/kapal papua.jpg') }}" alt="Kapal Papua" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <p style="font-size: 25px; color: #374151; margin-bottom: 24px;">
                Ekowisata berbasis komunitas adat, mengajak wisatawan untuk menikmati keindahan alam Papua, budaya lokal, dan konservasi lingkungan. Pendapatan digunakan untuk pelestarian lingkungan dan pemberdayaan masyarakat adat.
                </p>

                <p style="font-size: 20px; font-weight: bold; margin-bottom: 4px;">
                    Lokasi: <span style="font-weight: normal;">Mare</span>
                </p>
                <p style="font-size: 20px; font-weight: bold; margin-bottom: 4px;">
                    Status: <span style="font-weight: normal; color: #1F702C;">AKTIF</span>
                </p>
                <p style="font-size: 20px; font-weight: bold;">
                    Hubungi Kami: <span style="font-weight: normal;">0811223344</span>
                </p>
            </div>
        </div>
    </main>
</div>
@endsection
