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
            <a href="{{ route('kehutanan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">
                Kehutanan
            </a>
            <a href="{{ route('ekowisata.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">
                Ekowisata
            </a>
            <a href="{{ route('pertanian.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">
                Pertanian
            </a>
            <a href="{{ route('peternakan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">
                Peternakan
            </a>
            <a href="{{ route('perikanan.index') }}" style="color: #4B5563; text-decoration: none; font-size: 16px; height: 32px; display: flex; align-items: center; justify-content: center;">
                Perikanan
            </a>
        </nav>
    </aside>

    <!-- Konten utama -->
    <main style="flex: 1; overflow-y: auto; padding: 16px; box-sizing: border-box; height: 100%;">
        <!-- Grid Baris Pertama (3 gambar usaha) -->
        <div class="flex justify-center gap-4 flex-wrap">
            <!-- Usaha: Kehutanan -->
            <div class="text-left">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/hutan papua.jpg') }}" alt="Kehutanan" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">Daftar Usaha</p>
                <a href="{{ route('kehutanan.index') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DETAIL
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10" style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- Usaha: Perikanan -->
            <div class="text-left">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/kapal papua.jpg') }}" alt="Perikanan" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">Daftar Usaha</p>
                <a href="{{ route('ekowisata.index') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DETAIL
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10" style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- Usaha: Ekowisata -->
            <div class="text-left">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/tanaman.jpg') }}" alt="Ekowisata" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">Daftar Usaha</p>
                <a href="{{ route('pertanian.index') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DETAIL
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10" style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Grid Baris Kedua (2 gambar usaha) -->
        <div class="flex justify-center gap-4 flex-wrap mt-8 mb-20">
            <!-- Usaha: Pertanian -->
            <div class="text-left">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/sapi.jpg') }}" alt="Pertanian" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">Daftar Usaha</p>
                <a href="{{ route('peternakan.index') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DETAIL
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10" style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- Usaha: Peternakan -->
            <div class="text-left">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/ikan tuna.jpg') }}" alt="Peternakan" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">Daftar Usaha</p>
                <a href="{{ route('perikanan.index') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DETAIL
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10" style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
