@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-3xl font-bold mb-2">Selamat Datang Admin {{ auth()->user()->name }}</h1>
            <p class="text-gray-600">Kelola data keuangan dan laporan BUMMA dengan efisien</p>
        </div>
        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!-- Statistik -->
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center bg-light">
                <h6>Total Pendapatan</h6>
                <strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center bg-light">
                <h6>Total Biaya Operasional</h6>
                <strong>Rp {{ number_format($totalBiaya, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center bg-light">
                <h6>Keuntungan Bersih</h6>
                <strong>Rp {{ number_format($keuntungan, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center bg-light">
                <h6>Jumlah Transaksi</h6>
                <strong>{{ $jumlahTransaksi }}</strong>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h6 class="mb-2">Grafik Pendapatan vs Biaya</h6>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h6 class="mb-2">Distribusi Pengeluaran</h6>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Informasi Tambahan -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h5>Pengumuman Komunitas</h5>
            <ul>
                <li>📌 Rapat Bulanan - 22 April 2024</li>
                <li>📌 Musyawarah Masyarakat Adat - 19 April 2024</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h5>Notifikasi Transaksi</h5>
            <ul>
                <li>✅ Transfer Masuk - 21 April 2024 10:30</li>
                <li>❌ Transfer Keluar - 15 April 2024 10:00</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const lineCtx = document.getElementById('lineChart');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Pendapatan',
                    data: [10, 20, 40, 50, 65, 80],
                    borderColor: 'green',
                    fill: false,
                },
                {
                    label: 'Biaya',
                    data: [5, 10, 20, 30, 45, 55],
                    borderColor: 'orange',
                    fill: false,
                }
            ]
        }
    });

    const pieCtx = document.getElementById('pieChart');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Operasional', 'Sosial', 'Cadangan'],
            datasets: [{
                data: [60, 25, 15],
                backgroundColor: ['#264653', '#2a9d8f', '#e9c46a']
            }]
        }
    });
</script>
@endpush
