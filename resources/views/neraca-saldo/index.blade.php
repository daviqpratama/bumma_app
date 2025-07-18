@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="mb-4">Neraca Saldo per {{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}</h4>

    <!-- Filter Tanggal -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control" />
            </div>
            <div class="col-md-2">
                <button class="btn btn-success" type="submit">Filter</button>
            </div>
        </div>
    </form>

    @foreach ($data as $kategori => $items)
        <div class="card mb-3">
            <div class="card-header bg-success text-white">
                {{ $kategori }}
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Akun</th>
                            <th class="text-end">Saldo Awal</th>
                            <th class="text-end">Transaksi Keuangan</th>
                            <th class="text-end">Saldo Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td class="text-end">{{ number_format($item['saldo_awal'], 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($item['transaksi_keuangan'], 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($item['saldo_akhir'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    <!-- Ringkasan Total -->
    <div class="card mt-4">
        <div class="card-header bg-dark text-white">Ringkasan</div>
        <div class="card-body">
            <p>Total Aset: <strong>{{ number_format($total['Aset'], 0, ',', '.') }}</strong></p>
            <p>Total Kewajiban & Ekuitas: 
                <strong>{{ number_format($total['Kewajiban'] + $total['Ekuitas'], 0, ',', '.') }}</strong>
            </p>
            <p>
                Keseimbangan Neraca: 
                <strong>
                    Aset = Kewajiban + Ekuitas 
                    ({{ number_format($total['Aset'], 0, ',', '.') }} = {{ number_format($total['Kewajiban'] + $total['Ekuitas'], 0, ',', '.') }})
                </strong>
            </p>
        </div>
    </div>
</div>
@endsection
