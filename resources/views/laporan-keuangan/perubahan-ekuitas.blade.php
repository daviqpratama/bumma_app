@extends('layouts.admin')

@section('title', 'Laporan Perubahan Ekuitas')

@section('content')
<style>
    .report-header {
        background-color: #c9e6c1;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        border: 1px solid #000;
    }

    .report-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid black;
    }

    .report-table th,
    .report-table td {
        border: 1px solid black;
        padding: 6px 10px;
        font-size: 14px;
    }

    .text-bold {
        font-weight: bold;
    }

    .text-right {
        text-align: right;
    }

    .bg-green {
        background-color: #e5f3dd;
    }
</style>

<div class="report-header">
    BUMMA <br>
    LAPORAN PERUBAHAN EKUITAS <br>
    PERIODE 2025
</div>

<table class="report-table mt-4">
    <tr>
        <td class="text-bold">Modal Awal Periode</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr>
        <td colspan="2" class="text-bold">Perubahan Selama Periode :</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Laba/Rugi</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Penambahan Dana Komunitas</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Penambahan/Pengurangan Aset Tetap</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Distribusi Hasil Usaha kepada Masyarakat</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Biaya Ritual & Dampak Terhadap Ekosistem</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr class="text-bold">
        <td>Kenaikan/Penurunan Akibat Perubahan Selama Periode</td>
        <td class="text-right">Rp -</td>
    </tr>
    <tr class="text-bold">
        <td>Modal Akhir Periode</td>
        <td class="text-right">Rp -</td>
    </tr>
</table>
@endsection
