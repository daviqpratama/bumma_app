@extends('layouts.admin')

@section('title', 'Neraca Lajur')

@section('content')
<div class="card p-4" style="background-color: #e5f0db; border: none; border-radius: 15px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Neraca Lajur</h5>
    </div>

    <!-- Filter -->
    <div class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="date" class="form-control" placeholder="mm/dd/yyyy">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Nomor Akun">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success w-100" style="background-color: #6c8b63;">Cari Akun</button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-secondary w-100">Ekspor PDF</button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-success w-100">Ekspor Excel</button>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white rounded">
            <thead class="table-light text-center">
                <tr>
                    <th>Nama Akun</th>
                    <th>Saldo Awal</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDebit = 0;
                    $totalKredit = 0;
                    $totalAkhir = 0;
                @endphp

                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td class="text-end">{{ number_format($item['awal'], 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($item['debit'], 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($item['kredit'], 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($item['akhir'], 0, ',', '.') }}</td>
                        <td class="text-center">{{ $item['status'] }}</td>

                        @php
                            $totalDebit += $item['debit'];
                            $totalKredit += $item['kredit'];
                            $totalAkhir += $item['akhir'];
                        @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div class="mt-3 bg-white p-3 rounded">
        <strong>Total Debit:</strong> {{ number_format($totalDebit, 0, ',', '.') }}<br>
        <strong>Total Kredit:</strong> {{ number_format($totalKredit, 0, ',', '.') }}<br>
        <strong>Total Saldo Akhir:</strong> {{ number_format($totalAkhir, 0, ',', '.') }}
    </div>
</div>
@endsection
