<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BUMMA')</title>

    <!-- Fonts & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 220px;
            background-color: #e5f0db;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #4a634e;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #3d3d3d;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .sidebar a i {
            font-size: 16px;
            margin-right: 10px;
            color: #4a634e;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #a8cfa5;
            color: #fff;
        }

        .sidebar a.active i,
        .sidebar a:hover i {
            color: #ffffff;
        }

        .main-content {
            flex-grow: 1;
            padding: 25px 30px;
        }

        .topbar {
            background-color: #f8f9fa;
            padding: 12px 25px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: flex-end;
        }

        .admin-icon {
            background-color: #d0e0ce;
            padding: 6px 12px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 13px;
            display: flex;
            align-items: center;
            color: #444;
        }

        .admin-icon i {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>BUMMA</h4>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="{{ route('akun.index') }}" class="{{ request()->routeIs('akun.index') ? 'active' : '' }}">
            <i class="bi bi-journal-bookmark"></i> Data Akun
        </a>
        <a href="{{ route('transaksi.index') }}" class="{{ request()->routeIs('transaksi.index') ? 'active' : '' }}">
            <i class="bi bi-cash-coin"></i> Transaksi
        </a>
        <a href="{{ route('buku-besar.index') }}" class="{{ request()->routeIs('buku-besar.index') ? 'active' : '' }}">
            <i class="bi bi-journal-richtext"></i> Buku Besar
        </a>
        <a href="{{ route('neraca-saldo.index') }}" class="{{ request()->routeIs('neraca-saldo.index') ? 'active' : '' }}">
            <i class="bi bi-columns-gap"></i> Neraca Saldo
        </a>
        <a href="{{ route('jurnal-umum.index') }}" class="{{ request()->routeIs('jurnal-umum.index') ? 'active' : '' }}">
            <i class="bi bi-pencil-square"></i> Jurnal Umum
        </a>
        <a href="{{ route('jurnal-penyesuaian.index') }}" class="{{ request()->routeIs('jurnal-penyesuaian.index') ? 'active' : '' }}">
            <i class="bi bi-journals"></i> Jurnal Penyesuaian
        </a>
        <a href="{{ route('neraca-lajur.index') }}" class="{{ request()->routeIs('neraca-lajur.index') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i> Neraca Lajur
        </a>
        <a href="{{ route('laporan-keuangan') }}" class="{{ request()->routeIs('laporan-keuangan') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line"></i> Laporan Keuangan
        </a>
        <a href="{{ route('laporan.kinerja') }}" class="{{ request()->routeIs('laporan.kinerja') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Laporan Kinerja
        </a>
    </div>

    <!-- Main Content -->
    <div class="d-flex flex-column w-100">
        <div class="topbar">
            <div class="admin-icon">
                <i class="bi bi-person-circle"></i> Admin
            </div>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
