@extends('layouts.admin')

@section('title', 'Laporan Kinerja')

@section('content')
<style>
    body {
        background-color: #f9fbe8;
    }
    .sidebar {
        background-color: #c8dcbc;
    }
    .sidebar .nav-link.active {
        background-color: #ffffff;
        font-weight: bold;
    }
    .card-custom {
        background-color: #e4ecce;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    .chart-box {
        background-color: #cde6a4;
        border-radius: 0.5rem;
        padding: 1rem;
        height: 200px;
        text-align: center;
        font-weight: bold;
        color: #2e4626;
    }
    .topbar {
        background-color: #d7e3c5;
        height: 50px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-right: 1rem;
    }
    .topbar i {
        font-size: 24px;
    }
</style>



<div class="container mt-4">
    <h5><strong>BUMMA</strong> ___<br>LAPORAN KINERJA <br>PERIODE 2025</h5>

    <div class="row mt-4">
        <!-- Bagian Kiri -->
        <div class="col-md-6">
            <div class="card-custom">
                <strong>RASIO LIKUIDITAS</strong><br>
                Current Ratio : {{ $rasio['current_ratio'] ?? '#DIV/0!' }}<br>
                Cash Ratio : {{ $rasio['cash_ratio'] ?? '#DIV/0!' }}
            </div>
            <div class="card-custom">
                <strong>RASIO PROFITABILITAS</strong><br>
                Net Profit Margin : {{ $rasio['net_profit_margin'] ?? '#DIV/0!' }}<br>
                Return On Assets (ROA) : {{ $rasio['roa'] ?? '#DIV/0!' }}<br>
                Return On Equity (ROE) : {{ $rasio['roe'] ?? '#DIV/0!' }}
            </div>
            <div class="card-custom">
                <strong>RASIO SOLVABILITAS</strong><br>
                Debt to Equity Ratio (DER) : {{ $rasio['der'] ?? '#DIV/0!' }}
            </div>
            <div class="card-custom">
                <strong>RASIO SOSIAL DAN LINGKUNGAN</strong><br>
                Persentase Kontribusi Sosial : {{ $rasio['kontribusi_sosial'] ?? '#DIV/0!' }}<br>
                Rasio Biaya Ekologis : {{ $rasio['biaya_ekologis'] ?? '#DIV/0!' }}
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="chart-box">RASIO LIKUIDITAS <br> (CUR, CSR)</div>
                </div>
                <div class="col-12 mb-3">
                    <div class="chart-box">RASIO PROFITABILITAS <br> (NPM, ROA, ROE)</div>
                </div>
                <div class="col-12 mb-3">
                    <div class="chart-box">RASIO SOLVABILITAS <br> (DER)</div>
                </div>
                <div class="col-12">
                    <div class="chart-box">RASIO SOSIAL & LINGKUNGAN <br> (KS, RE)</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
