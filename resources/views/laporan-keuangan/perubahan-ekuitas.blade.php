@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="text-lg font-bold mb-4">Laporan Perubahan Ekuitas - {{ $data['tahun'] }}</h2>

    <table class="table table-bordered">
        <tr>
            <th>Keterangan</th>
            <th class="text-end">Jumlah (Rp)</th>
        </tr>
        <tr>
            <td>Modal Awal</td>
            <td class="text-end">{{ number_format($data['modal_awal'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>+ SHU Tahun Berjalan</td>
            <td class="text-end">{{ number_format($data['shu'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>+ Dana Komunitas</td>
            <td class="text-end">{{ number_format($data['dana_komunitas'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>+ Penambahan Aset Tetap</td>
            <td class="text-end">{{ number_format($data['aset_tetap'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>- Distribusi Masyarakat</td>
            <td class="text-end">{{ number_format($data['distribusi_masyarakat'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>- Biaya Ritual & Ekosistem</td>
            <td class="text-end">{{ number_format($data['biaya_ritual'], 0, ',', '.') }}</td>
        </tr>
        <tr class="fw-bold">
            <td>Perubahan Ekuitas</td>
            <td class="text-end">{{ number_format($data['perubahan'], 0, ',', '.') }}</td>
        </tr>
        <tr class="fw-bold">
            <td>Modal Akhir</td>
            <td class="text-end">{{ number_format($data['modal_akhir'], 0, ',', '.') }}</td>
        </tr>
    </table>
</div>
@endsection
