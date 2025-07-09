@extends('layouts.admin')

@section('title', 'Laporan Sisa Hasil Usaha')

@section('content')
<div class="card shadow rounded">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">BUMMA</h5>
        <h6 class="mb-0">LAPORAN SISA HASIL USAHA</h6>
        <small class="mb-0">PERIODE 2025</small>
    </div>
    <div class="card-body">
        <h6><strong>Pendapatan:</strong></h6>
        <ul>
            <li>Penjualan Produk Hasil Bumi ................................ Rp -</li>
            <li>Jasa Ekowisata ...................................................... Rp -</li>
            <li>Perdagangan Hasil Hutan Non-Kayu ................. Rp -</li>
        </ul>
        <p><strong>Jumlah Pendapatan ......................................... Rp -</strong></p>

        <h6><strong>Beban Operasional:</strong></h6>
        <ul>
            <li>Beban Produksi ..................................................... Rp -</li>
            <li>Beban Distribusi .................................................... Rp -</li>
            <li>Beban Upah Pekerja Adat ................................. Rp -</li>
        </ul>
        <p><strong>Jumlah Beban Operasional ......................... Rp -</strong></p>

        <h6><strong>Beban Lainnya:</strong></h6>
        <ul>
            <li>Beban Pelaksanaan Ritual Adat ......................... Rp -</li>
            <li>Kontribusi pada Masyarakat .............................. Rp -</li>
            <li>Dampak terhadap Ekosistem ............................. Rp -</li>
        </ul>
        <p><strong>Jumlah Beban Lainnya ................................ Rp -</strong></p>

        <p><strong>Laba/Rugi Sebelum Pajak ............................. Rp -</strong></p>
    </div>
</div>
@endsection
