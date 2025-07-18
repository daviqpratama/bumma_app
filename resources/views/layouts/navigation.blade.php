<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Memuat font Figtree dari Bunny font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Memuat file CSS dan JavaScript melalui Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Divider hitam dengan garis tebal dan jarak yang lebih dekat antara elemen */
        .divider {
            border-top: 2px solid #000; /* Membuat garis pembatas hitam tebal */
            margin-top: 10px; /* Mengurangi jarak bagian atas divider */
            margin-bottom: 10px; /* Mengurangi jarak bagian bawah divider */
        }

        /* Styling untuk setiap tautan menu navigasi agar tidak ada garis bawah atau highlight biru */
        .x-nav-link {
            border: none !important; /* Menghapus border dari tautan */
            box-shadow: none !important; /* Menghapus bayangan pada tautan */
            outline: none !important; /* Menghapus outline */
            text-decoration: none !important; /* Menghilangkan dekorasi teks (garis bawah) */
            font-size: 1rem; /* Menetapkan ukuran font menjadi 1rem */
            font-weight: bold; /* Membuat teks di menu navigasi menjadi tebal */
        }

        /* Memastikan tampilan saat tautan aktif, hover, atau fokus tetap konsisten */
        .x-nav-link.active,
        .x-nav-link:hover,
        .x-nav-link:focus {
            border: none !important; /* Menghapus border pada kondisi hover/focus/active */
            box-shadow: none !important; /* Menghapus bayangan pada kondisi hover/focus/active */
            text-decoration: none !important; /* Menghilangkan dekorasi teks pada kondisi tersebut */
        }

        /* Menyusun tautan navigasi agar posisinya berada di tengah */
        .x-nav-link {
            display: flex; /* Menggunakan Flexbox untuk layout */
            align-items: center; /* Menyusun elemen secara vertikal di tengah */
            justify-content: center; /* Menyusun elemen secara horizontal di tengah */
        }

        /* Styling logo untuk mengatur ukuran sesuai dengan permintaan */
        .logo {
            height: 65px; /* Menetapkan tinggi logo menjadi 65px */
            width: auto; /* Memastikan lebar logo mengikuti rasio aspek */
        }
    </style>
</head>
<body class="font-sans antialiased" style="background-color: #E4E8D6;">
    <div class="min-h-screen" style="background-color: #E4E8D6;">
        <!-- Navbar -->
        <nav x-data="{ open: false }" class="border-b border-gray-200" style="background-color: #E4E8D6;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex">
                        <!-- Logo navigasi -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <!-- Gambar logo dengan kelas khusus untuk pengaturan ukuran -->
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                            </a>
                        </div>
                    </div>

                    <!-- Links Navigasi diatur agar berada di tengah -->
                    <div class="flex-1 flex justify-center space-x-8">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="x-nav-link" style="color: #000;">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('daftar_usaha')" :active="request()->routeIs('dashboard')" class="x-nav-link" style="color: #000;">
                            {{ __('Daftar Usaha') }}
                        </x-nav-link>
                        <x-nav-link :href="route('riwayat_transaksi')" :active="request()->routeIs('dashboard')" class="x-nav-link" style="color: #000;">
                            {{ __('Riwayat Transaksi') }}
                        </x-nav-link>
                        <x-nav-link :href="route('distribusi_dana_sosial')" :active="request()->routeIs('dashboard')" class="x-nav-link" style="color: #000;">
                            {{ __('Distribusi Dana Sosial') }}
                        </x-nav-link>
                    </div>


                    <!-- Dropdown Pengaturan untuk hanya keluar -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <!-- Tombol untuk dropdown pengaturan -->
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#42563D] bg-[#E4E8D6] hover:text-[#282323] focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <!-- Ikon untuk dropdown -->
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Form untuk keluar (logout) saja -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-[#42563D]">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>


                    <!-- Menu Hamburger untuk tampilan mobile -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                            <!-- Ikon hamburger (menu) untuk mobile -->
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Divider hitam untuk pemisah antar bagian -->
        <div class="divider"></div>

        <!-- Page Heading jika ada -->
        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Konten Halaman -->
        <main>
            @yield('content') <!-- Menampilkan konten dinamis -->
        </main>
    </div>
</body>
</html>
