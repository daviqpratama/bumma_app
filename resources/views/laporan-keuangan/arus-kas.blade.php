@extends('layouts.admin')

@section('title', 'Laporan Arus Kas')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f1f5ec;
        font-size: 13px;
    }

    .laporan-box {
        background-color: white;
        border: 1px solid #000;
        padding: 20px;
    }

    .laporan-header {
        background-color: #c3dfb9;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        border-bottom: 1px solid #000;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    td, th {
        padding: 6px 10px;
        vertical-align: top;
    }

    .sub-header {
        font-weight: bold;
        padding-top: 10px;
        color: #000;
    }

    .section-total {
        font-weight: bold;
        border-top: 1px solid #000;
    }

    .text-end {
        text-align: right;
    }

    .text-bold {
        font-weight: bold;
    }

    .bg-soft-green {
        background-color: #e5f5df;
    }
</style>

<div class="container mt-4 laporan-box">
    <div class="laporan-header">
        <div>BUMMA</div>
        <div>LAPORAN ARUS KAS</div>
        <div>PERIODE 2025</div>
    </div>

    <table>
        <tr class="sub-header">
            <td colspan="2">A. ARUS KAS DARI AKTIVITAS USAHA ADAT</td>
        </tr>
        <tr><td colspan="2" class="text-bold">1. Penerimaan Kas Dari Aktivitas Adat</td></tr>
        <tr><td>Penerimaan dari Penjualan Produk Hasil Bumi</td><td class="text-end">Rp -</td></tr>
        <tr><td>Penerimaan dari Jasa Ekosistem</td><td class="text-end">Rp -</td></tr>
        <tr><td>Penerimaan dari Perdagangan Hasil Hutan Non-Kayu</td><td class="text-end">Rp -</td></tr>
        <tr><td>Penerimaan dari Donasi atau Bantuan Komunitas</td><td class="text-end">Rp -</td></tr>

        <tr><td colspan="2" class="text-bold pt-2">2. Penggunaan Kas untuk Aktivitas Usaha Adat</td></tr>
        <tr><td>Pembayaran Biaya Produksi</td><td class="text-end">Rp -</td></tr>
        <tr><td>Pembayaran Biaya Distribusi</td><td class="text-end">Rp -</td></tr>
        <tr><td>Pembayaran Upah Pekerja Adat</td><td class="text-end">Rp -</td></tr>

        <tr class="bg-soft-green section-total"><td><strong>KAS BERSIH DARI AKTIVITAS USAHA ADAT</strong></td><td class="text-end"><strong>Rp -</strong></td></tr>

        <tr class="sub-header">
            <td colspan="2">B. ARUS KAS DARI AKTIVITAS SOSIAL DAN RITUAL ADAT</td>
        </tr>
        <tr><td colspan="2" class="text-bold">1. Penerimaan Kas untuk Aktivitas Sosial dan Ritual Adat</td></tr>
        <tr><td>Dana Komunitas yang Diterima</td><td class="text-end">Rp -</td></tr>
        <tr><td>Hibah atau Bantuan Sosial dari Pihak Ketiga</td><td class="text-end">Rp -</td></tr>

        <tr><td colspan="2" class="text-bold pt-2">2. Penggunaan Kas untuk Aktivitas Sosial dan Ritual Adat</td></tr>
        <tr><td>Biaya Pelaksanaan Ritual Adat</td><td class="text-end">Rp -</td></tr>
        <tr><td>Kontribusi untuk Masyarakat</td><td class="text-end">Rp -</td></tr>
        <tr><td>Dampak Terhadap Ekosistem</td><td class="text-end">Rp -</td></tr>

        <tr class="bg-soft-green section-total"><td><strong>KAS BERSIH DARI AKTIVITAS SOSIAL DAN RITUAL ADAT</strong></td><td class="text-end"><strong>Rp -</strong></td></tr>

        <tr class="sub-header">
            <td colspan="2">C. ARUS KAS DARI AKTIVITAS PENDANAAN</td>
        </tr>
        <tr><td colspan="2" class="text-bold">1. Penerimaan Kas dari Pendanaan</td></tr>
        <tr><td>Pinjaman Komunitas yang Diterima</td><td class="text-end">Rp -</td></tr>
        <tr><td>Hutang Usaha yang Diterima</td><td class="text-end">Rp -</td></tr>

        <tr><td colspan="2" class="text-bold pt-2">2. Penggunaan Kas untuk Pendanaan</td></tr>
        <tr><td>Pembayaran Pinjaman Komunitas</td><td class="text-end">Rp -</td></tr>
        <tr><td>Pembayaran Hutang Usaha</td><td class="text-end">Rp -</td></tr>

        <tr class="bg-soft-green section-total"><td><strong>KAS BERSIH DARI AKTIVITAS PENDANAAN</strong></td><td class="text-end"><strong>Rp -</strong></td></tr>

        <tr class="sub-header">
            <td colspan="2">D. PERUBAHAN KAS DAN SALDO AWAL</td>
        </tr>
        <tr><td>Kas Bersih Selama Periode</td><td class="text-end">Rp -</td></tr>
        <tr><td>Saldo Kas Awal Periode</td><td class="text-end">Rp -</td></tr>

        <tr class="bg-soft-green section-total"><td><strong>SALDO KAS AKHIR PERIODE</strong></td><td class="text-end"><strong>Rp -</strong></td></tr>
    </table>
</div>
@endsection
