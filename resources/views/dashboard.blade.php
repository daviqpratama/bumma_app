@extends('layouts.navigation')

@section('content')
<!-- Container utama dengan margin atas 5 dan padding top 80px -->
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

    <!-- Section Card di atas background gambar orang.png -->
    <div class="flex flex-col items-center justify-center"
        style="background-image: url('{{ asset('images/orang.png') }}'); background-size: cover; background-position: center; margin-top: 110px; padding: 60px 0;">

        <!-- Container Card (Daftar Usaha dan Riwayat Transaksi) -->
        <div class="flex justify-center gap-4 flex-wrap">

            <!-- Card: Daftar Usaha -->
            <div
                class="w-[428px] h-[208px] p-4 bg-white bg-opacity-90 border border-gray-200 shadow-md flex items-start">
                <img src="{{ asset('images/pencarian.png') }}" alt="Pencarian"
                    style="width: 50px; height: 50px; margin-right: 15px;">
                <div style="text-align: left;">
                    <h5 class="text-lg font-bold text-gray-900 mb-2">Daftar Usaha</h5>
                    <p class="text-sm text-gray-700 mb-4">Daftar usaha yang ada.</p>
                    <div class="flex justify-start mt-10">
                        <a href="{{ route('daftar_usaha') }}"
                            class="inline-flex items-center text-[#E5B300] font-semibold hover:underline"
                            style="font-size: 16px; padding: 8px 30px; color: #E5B300;">
                            GET STARTED
                            <span style="margin-left: 5px;"></span>
                            <svg width="14" height="10" fill="none" stroke="#E5B300" viewBox="0 0 14 10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card: Riwayat Transaksi -->
            <div
                class="w-[428px] h-[208px] p-4 bg-white bg-opacity-90 border border-gray-200 shadow-md flex items-start">
                <img src="{{ asset('images/tanggal.png') }}" alt="Tanggal"
                    style="width: 50px; height: 50px; margin-right: 15px;">
                <div style="text-align: left;">
                    <h5 class="text-lg font-bold text-gray-900 mb-2">Riwayat Transaksi</h5>
                    <p class="text-sm text-gray-700 mb-4">Riwayat transaksi yang pernah dilakukan.</p>
                    <div class="flex justify-start mt-10">
                        <a href="{{ route('riwayat_transaksi') }}"
                            class="inline-flex items-center text-[#E5B300] font-semibold hover:underline"
                            style="font-size: 16px; padding: 8px 30px; color: #E5B300;">
                            GET STARTED
                            <span style="margin-left: 5px;"></span>
                            <svg width="14" height="10" fill="none" stroke="#E5B300" viewBox="0 0 14 10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card: Distribusi Dana Sosial -->
            <div
                class="w-[428px] h-[208px] p-4 bg-white bg-opacity-90 border border-gray-200 shadow-md flex items-start">
                <img src="{{ asset('images/rumah.png') }}" alt="Tanggal"
                    style="width: 50px; height: 50px; margin-right: 15px;">
                <div style="text-align: left;">
                    <h5 class="text-lg font-bold text-gray-900 mb-2">Distribusi Dana Sosial</h5>
                    <p class="text-sm text-gray-700 mb-4">Penerimaan dana sosial dan dana kebutuhan.</p>
                    <div class="flex justify-start mt-10">
                        <a href="{{ route('distribusi_dana_sosial') }}"
                            class="inline-flex items-center text-[#E5B300] font-semibold hover:underline"
                            style="font-size: 16px; padding: 8px 30px; color: #E5B300;">
                            GET STARTED
                            <span style="margin-left: 5px;"></span>
                            <svg width="14" height="10" fill="none" stroke="#E5B300" viewBox="0 0 14 10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Section Daftar Usaha (judul dan grid gambar) -->
    <div class="text-center mt-8">
        <!-- Judul Section -->
        <h1 class="text-4xl font-bold" style="font-size: 40px; line-height: 70px;">DAFTAR USAHA</h1>
        <!-- Garis kecil di bawah judul -->
        <div style="width: 133px; height: 12px; background-color: #3C7228; margin: 10px auto; border-radius: 6px;">
        </div>

        <!-- Grid Baris Pertama (3 gambar usaha) -->
        <div class="flex justify-center gap-4 mt-8 flex-wrap">

            <!-- Usaha: Kehutanan -->
            <div class="text-left mt-8">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/kehutanan.jpg') }}" alt="Kehutanan"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">KEHUTANAN</p>
                <a href="{{ route('daftar_usaha') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DAFTAR USAHA
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10"
                        style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <!-- Usaha: Perikanan -->
            <div class="text-left mt-8">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/perikanan.jpg') }}" alt="Perikanan"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">PERIKANAN</p>
                <a href="{{ route('daftar_usaha') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DAFTAR USAHA
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10"
                        style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <!-- Usaha: Ekowisata -->
            <div class="text-left mt-8">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/ekowisata.jpg') }}" alt="Ekowisata"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">EKOWISATA</p>
                <a href="{{ route('daftar_usaha') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DAFTAR USAHA
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10"
                        style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

        </div>

        <!-- Grid Baris Kedua (2 gambar usaha) -->
        <div class="flex justify-center gap-4 mt-8 flex-wrap mb-20">

            <!-- Usaha: Pertanian -->
            <div class="text-left mt-8">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/pertanian.avif') }}" alt="Pertanian"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">PERTANIAN</p>
                <a href="{{ route('daftar_usaha') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DAFTAR USAHA
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10"
                        style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <!-- Usaha: Peternakan -->
            <div class="text-left mt-8">
                <div class="flex justify-center mb-4">
                    <div style="width: 385px; height: 270px; overflow: hidden;">
                        <img src="{{ asset('images/peternakan.jpeg') }}" alt="Peternakan"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <p class="font-semibold text-lg">PETERNANAKAN</p>
                <a href="{{ route('daftar_usaha') }}" class="inline-flex items-center font-semibold hover:underline mt-2" style="color: #3C7228;">
                    LIHAT DAFTAR USAHA
                    <svg width="14" height="10" fill="none" stroke="#3C7228" viewBox="0 0 14 10"
                        style="margin-left: 5px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
