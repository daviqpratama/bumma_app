@extends('layouts.admin') {{-- Sebelumnya layouts.app --}}

@section('title', 'Jurnal Umum')

@section('content')
<style>
    body {
        background-color: #f1f5ec;
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
    }

    h3 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .filter-bar {
        background-color: #e5f0da;
        border-radius: 10px;
        padding: 15px;
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 20px;
        box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
    }

    .filter-bar input[type="date"],
    .filter-bar input[type="text"] {
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
        width: 160px;
        background-color: #ffffff;
        font-size: 13px;
        border: 1px solid #c3cfc0;
    }

    .filter-bar button,
    .filter-bar a {
        background-color: #4f7f4f;
        color: white;
        padding: 7px 14px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .filter-bar a {
        background-color: #c7dbc2;
        color: #000;
    }

    .filter-bar button:hover {
        background-color: #3a653a;
    }

    .table-wrapper {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th, td {
        padding: 10px 8px;
        font-size: 13px;
        border-bottom: 1px solid #eee;
    }

    th {
        background-color: #f5f5f5;
        font-weight: bold;
        text-align: left;
    }

    .summary {
        text-align: right;
        font-weight: 500;
        padding: 10px 5px;
        font-size: 13px;
    }

    .note-box {
        background-color: #a6c89c;
        padding: 10px 15px;
        color: #0f2e0f;
        font-size: 13px;
        border-radius: 6px;
        margin-top: 10px;
    }

    .text-center {
        text-align: center;
    }
</style>

<h3>Jurnal Umum</h3>

<form method="GET" action="{{ route('jurnal-umum') }}" class="filter-bar">
    <input type="date" name="tanggal" value="{{ request('tanggal') }}">
    <input type="text" name="nomor_jurnal" placeholder="Nomor Jurnal" value="{{ request('nomor_jurnal') }}">
    <button type="submit">Cari Jurnal</button>
    <a href="#">Ekspor PDF</a>
    <a href="#">Ekspor Excel</a>
</form>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nomor Jurnal</th>
                <th>Akun</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jurnals as $jurnal)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}</td>
                    <td>{{ $jurnal->nomor_jurnal }}</td>
                    <td>{{ $jurnal->akun }}</td>
                    <td>{{ $jurnal->deskripsi }}</td>
                    <td>{{ number_format($jurnal->debit, 0, ',', '.') }}</td>
                    <td>{{ number_format($jurnal->kredit, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data jurnal ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        Total Debit: {{ number_format($totalDebit, 0, ',', '.') }}<br>
        Total Kredit: {{ number_format($totalKredit, 0, ',', '.') }}
    </div>
</div>

<div class="note-box">
    <strong>Catatan:</strong> Jurnal Umum dicatat berdasarkan transaksi harian yang terjadi.
</div>
@endsection
