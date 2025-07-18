<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- CSS dan Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
            font-size: 14px;
        }
        .sidebar {
            width: 210px;
            background-color: #e5f0db;
            min-height: 100vh;
            padding: 25px 15px;
        }
        .sidebar img {
            width: 100%;
            margin-bottom: 30px;
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            margin-bottom: 16px;
        }
        .menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #3d3d3d;
            font-weight: 500;
            padding: 8px 10px;
            border-radius: 8px;
            transition: 0.2s;
        }
        .menu a:hover, .menu a.active {
            background-color: #a8cfa5;
            color: white;
        }
        .menu .icon-wrapper {
            width: 30px;
            height: 30px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 14px;
        }
        .topbar {
            padding: 15px 25px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: flex-end;
        }
        .admin-icon {
            display: flex;
            align-items: center;
            background-color: #e0e0e0;
            border-radius: 30px;
            padding: 6px 12px;
            font-weight: 500;
            color: #444;
            font-size: 13px;
        }
        .admin-icon i {
            margin-right: 6px;
        }
        .content {
            flex-grow: 1;
            padding: 25px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <ul class="menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="icon-wrapper">📊</span> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('saldo-awal.index') }}" class="{{ request()->routeIs('saldo-awal.index') ? 'active' : '' }}">
                    <span class="icon-wrapper">💰</span> Saldo Awal
                </a>
            </li>
            <li>
                <a href="{{ route('jurnal-umum.index') }}" class="{{ request()->routeIs('jurnal-umum') ? 'active' : '' }}">
                    <span class="icon-wrapper">📓</span> Jurnal Umum
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}" class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                    <span class="icon-wrapper">💳</span> Transaksi
                </a>
            </li>
            <li>
                <a href="{{ route('buku-besar.index') }}" class="{{ request()->routeIs('buku-besar.index') ? 'active' : '' }}">
                    <span class="icon-wrapper">📚</span> Buku Besar
                </a>
            </li>
            <li>
                <a href="{{ route('neraca-saldo.index') }}" class="{{ request()->routeIs('neraca-saldo.index') ? 'active' : '' }}">
                    <span class="icon-wrapper">📄</span> Neraca Saldo
                </a>
            </li>
            <li>
                <a href="{{ route('jurnal-penyesuaian.index') }}" class="{{ request()->routeIs('jurnal-penyesuaian.index') ? 'active' : '' }}">
                    <span class="icon-wrapper">⚖️</span> Jurnal Penyesuaian
                </a>
            </li>
            <li>
                <a href="{{ route('neraca-lajur.index') }}" class="{{ request()->routeIs('neraca-lajur.index') ? 'active' : '' }}">
                    <span class="icon-wrapper">🮮</span> Neraca Lajur
                </a>
            </li>
            <li>
                <a href="{{ route('laporan-keuangan') }}" class="{{ request()->routeIs('laporan-keuangan') ? 'active' : '' }}">
                    <span class="icon-wrapper">📈</span> Laporan Keuangan
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.kinerja') }}" class="{{ request()->routeIs('laporan.kinerja') ? 'active' : '' }}">
                    <span class="icon-wrapper">📋</span> Laporan Kinerja
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn w-100 text-start d-flex align-items-center" style="background: none; border: none; padding: 8px 10px; color: #3d3d3d; font-weight: 500; border-radius: 8px; transition: 0.2s;">
                        <span class="icon-wrapper">🚪</span> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="d-flex flex-column w-100">
        <div class="topbar">
            <div class="admin-icon">
                <i class="bi bi-person-circle"></i> Admin
            </div>
        </div>

        <div class="content">
            <h4 class="mb-3">@yield('title')</h4>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
