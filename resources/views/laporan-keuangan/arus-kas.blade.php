@extends('layouts.admin')

@section('title', 'Laporan Arus Kas')

@section('content')
@php
    $penjualanProduk = $data['penjualan_produk'];
    $jasaEkosistem = $data['jasa_ekosistem'];
    $hasilHutan = $data['hasil_hutan'];
    $donasi = $data['donasi_komunitas'];
    $biayaProduksi = $data['biaya_produksi'];
    $biayaDistribusi = $data['biaya_distribusi'];
    $upah = $data['upah_pekerja'];
    $danaKomunitas = $data['dana_komunitas'];
    $hibah = $data['hibah_sosial'];
    $biayaRitual = $data['biaya_ritual'];
    $kontribusi = $data['kontribusi_masyarakat'];
    $ekosistem = $data['dampak_ekosistem'];
    $pinjamanMasuk = $data['pinjaman_diterima'];
    $hutangMasuk = $data['utang_diterima'];
    $pinjamanKeluar = $data['bayar_pinjaman'];
    $hutangKeluar = $data['bayar_utang'];
    $saldoAwal = $data['kas_awal'];
    $saldoAkhir = $data['kas_akhir'];

    $kasUsahaAdat = ($penjualanProduk + $jasaEkosistem + $hasilHutan + $donasi) - ($biayaProduksi + $biayaDistribusi + $upah);
    $kasSosialAdat = ($danaKomunitas + $hibah) - ($biayaRitual + $kontribusi + $ekosistem);
    $kasPendanaan = ($pinjamanMasuk + $hutangMasuk) - ($pinjamanKeluar + $hutangKeluar);
    $kasBersih = $kasUsahaAdat + $kasSosialAdat + $kasPendanaan;
@endphp

<div class="container mt-4 p-4 bg-white rounded shadow-sm border" style="font-size: 13px;">
    <div class="text-center mb-3">
        <h5 class="mb-1">BUMMA</h5>
        <h6 class="mb-1">LAPORAN ARUS KAS</h6>
        <small>PERIODE {{ $tahun }}</small>
    </div>

    <table class="table table-bordered">
        <tr class="table-success fw-bold">
            <td colspan="2">A. ARUS KAS DARI AKTIVITAS USAHA ADAT</td>
        </tr>
        <tr><td colspan="2" class="fw-bold">1. Penerimaan Kas Dari Aktivitas Adat</td></tr>
        <tr><td>Penerimaan dari Penjualan Produk Hasil Bumi</td><td class="text-end">Rp {{ number_format($penjualanProduk, 0, ',', '.') }}</td></tr>
        <tr><td>Penerimaan dari Jasa Ekosistem</td><td class="text-end">Rp {{ number_format($jasaEkosistem, 0, ',', '.') }}</td></tr>
        <tr><td>Penerimaan dari Perdagangan Hasil Hutan Non-Kayu</td><td class="text-end">Rp {{ number_format($hasilHutan, 0, ',', '.') }}</td></tr>
        <tr><td>Penerimaan dari Donasi atau Bantuan Komunitas</td><td class="text-end">Rp {{ number_format($donasi, 0, ',', '.') }}</td></tr>

        <tr><td colspan="2" class="fw-bold pt-2">2. Penggunaan Kas untuk Aktivitas Usaha Adat</td></tr>
        <tr><td>Pembayaran Biaya Produksi</td><td class="text-end">Rp {{ number_format($biayaProduksi, 0, ',', '.') }}</td></tr>
        <tr><td>Pembayaran Biaya Distribusi</td><td class="text-end">Rp {{ number_format($biayaDistribusi, 0, ',', '.') }}</td></tr>
        <tr><td>Pembayaran Upah Pekerja Adat</td><td class="text-end">Rp {{ number_format($upah, 0, ',', '.') }}</td></tr>

        <tr class="table-light fw-bold"><td>KAS BERSIH DARI AKTIVITAS USAHA ADAT</td><td class="text-end">Rp {{ number_format($kasUsahaAdat, 0, ',', '.') }}</td></tr>

        <tr class="table-success fw-bold">
            <td colspan="2">B. ARUS KAS DARI AKTIVITAS SOSIAL DAN RITUAL ADAT</td>
        </tr>
        <tr><td colspan="2" class="fw-bold">1. Penerimaan Kas untuk Aktivitas Sosial dan Ritual Adat</td></tr>
        <tr><td>Dana Komunitas yang Diterima</td><td class="text-end">Rp {{ number_format($danaKomunitas, 0, ',', '.') }}</td></tr>
        <tr><td>Hibah atau Bantuan Sosial dari Pihak Ketiga</td><td class="text-end">Rp {{ number_format($hibah, 0, ',', '.') }}</td></tr>

        <tr><td colspan="2" class="fw-bold pt-2">2. Penggunaan Kas untuk Aktivitas Sosial dan Ritual Adat</td></tr>
        <tr><td>Biaya Pelaksanaan Ritual Adat</td><td class="text-end">Rp {{ number_format($biayaRitual, 0, ',', '.') }}</td></tr>
        <tr><td>Kontribusi untuk Masyarakat</td><td class="text-end">Rp {{ number_format($kontribusi, 0, ',', '.') }}</td></tr>
        <tr><td>Dampak Terhadap Ekosistem</td><td class="text-end">Rp {{ number_format($ekosistem, 0, ',', '.') }}</td></tr>

        <tr class="table-light fw-bold"><td>KAS BERSIH DARI AKTIVITAS SOSIAL DAN RITUAL ADAT</td><td class="text-end">Rp {{ number_format($kasSosialAdat, 0, ',', '.') }}</td></tr>

        <tr class="table-success fw-bold">
            <td colspan="2">C. ARUS KAS DARI AKTIVITAS PENDANAAN</td>
        </tr>
        <tr><td colspan="2" class="fw-bold">1. Penerimaan Kas dari Pendanaan</td></tr>
        <tr><td>Pinjaman Komunitas yang Diterima</td><td class="text-end">Rp {{ number_format($pinjamanMasuk, 0, ',', '.') }}</td></tr>
        <tr><td>Hutang Usaha yang Diterima</td><td class="text-end">Rp {{ number_format($hutangMasuk, 0, ',', '.') }}</td></tr>

        <tr><td colspan="2" class="fw-bold pt-2">2. Penggunaan Kas untuk Pendanaan</td></tr>
        <tr><td>Pembayaran Pinjaman Komunitas</td><td class="text-end">Rp {{ number_format($pinjamanKeluar, 0, ',', '.') }}</td></tr>
        <tr><td>Pembayaran Hutang Usaha</td><td class="text-end">Rp {{ number_format($hutangKeluar, 0, ',', '.') }}</td></tr>

        <tr class="table-light fw-bold"><td>KAS BERSIH DARI AKTIVITAS PENDANAAN</td><td class="text-end">Rp {{ number_format($kasPendanaan, 0, ',', '.') }}</td></tr>

        <tr class="table-success fw-bold">
            <td colspan="2">D. PERUBAHAN KAS DAN SALDO AWAL</td>
        </tr>
        <tr><td>Kas Bersih Selama Periode</td><td class="text-end">Rp {{ number_format($kasBersih, 0, ',', '.') }}</td></tr>
        <tr><td>Saldo Kas Awal Periode</td><td class="text-end">Rp {{ number_format($saldoAwal, 0, ',', '.') }}</td></tr>

        <tr class="table-light fw-bold"><td>SALDO KAS AKHIR PERIODE</td><td class="text-end">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</td></tr>
    </table>
</div>
@endsection
