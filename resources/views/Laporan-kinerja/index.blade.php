@extends('layouts.admin')

@section('title', 'Laporan Kinerja')

@section('content')
<div class="container mt-4">
    <h5><strong>BUMMA</strong><br>LAPORAN KINERJA <br>PERIODE {{ $tahun }}</h5>

    <form method="GET" class="mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-auto">
                <label for="tahun" class="form-label">Tahun:</label>
                <input type="number" name="tahun" id="tahun" value="{{ $tahun }}" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <!-- Bagian Kiri -->
        <div class="col-md-6">
            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                <strong>RASIO LIKUIDITAS</strong><br>
                Current Ratio : {{ $rasio['current_ratio'] ?? '#DIV/0!' }}<br>
                Cash Ratio : {{ $rasio['cash_ratio'] ?? '#DIV/0!' }}
            </div>
            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                <strong>RASIO PROFITABILITAS</strong><br>
                Net Profit Margin : {{ $rasio['net_profit_margin'] ?? '#DIV/0!' }}<br>
                Return On Assets (ROA) : {{ $rasio['roa'] ?? '#DIV/0!' }}<br>
                Return On Equity (ROE) : {{ $rasio['roe'] ?? '#DIV/0!' }}
            </div>
            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                <strong>RASIO SOLVABILITAS</strong><br>
                Debt to Equity Ratio (DER) : {{ $rasio['der'] ?? '#DIV/0!' }}
            </div>
            <div class="mb-3 p-3 bg-light rounded shadow-sm">
                <strong>RASIO SOSIAL DAN LINGKUNGAN</strong><br>
                Persentase Kontribusi Sosial : {{ $rasio['kontribusi_sosial'] ?? '#DIV/0!' }}<br>
                Rasio Biaya Ekologis : {{ $rasio['biaya_ekologis'] ?? '#DIV/0!' }}
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="p-4 bg-success text-white rounded text-center">
                        RASIO LIKUIDITAS <br> (CUR, CSR)
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="p-4 bg-success text-white rounded text-center">
                        RASIO PROFITABILITAS <br> (NPM, ROA, ROE)
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="p-4 bg-success text-white rounded text-center">
                        RASIO SOLVABILITAS <br> (DER)
                    </div>
                </div>
                <div class="col-12">
                    <div class="p-4 bg-success text-white rounded text-center">
                        RASIO SOSIAL & LINGKUNGAN <br> (KS, RE)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
