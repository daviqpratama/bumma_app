@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<h3>Halo, Admin!</h3>
<h4 class="mt-4 mb-3">Statistik Komunitas</h4>

<div class="row mb-4">
    <div class="col-md-3"><div class="card p-3">Total Pendapatan <br><strong>Rp {{ number_format($totalPendapatan) }}</strong></div></div>
    <div class="col-md-3"><div class="card p-3">Total Biaya Operasional <br><strong>Rp {{ number_format($totalBiaya) }}</strong></div></div>
    <div class="col-md-3"><div class="card p-3">Keuntungan Bersih <br><strong>Rp {{ number_format($keuntungan) }}</strong></div></div>
    <div class="col-md-3"><div class="card p-3">Jumlah Transaksi <br><strong>{{ $jumlahTransaksi }}</strong></div></div>
</div>

<div class="row">
    <div class="col-md-6"><canvas id="lineChart"></canvas></div>
    <div class="col-md-6"><canvas id="pieChart"></canvas></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const lineCtx = document.getElementById('lineChart');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                { label: 'Pendapatan', data: [10, 20, 40, 50, 65, 80], borderColor: 'green' },
                { label: 'Biaya', data: [5, 10, 20, 30, 45, 55], borderColor: 'orange' }
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
@endsection
