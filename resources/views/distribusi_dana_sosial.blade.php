@extends('layouts.navigation') 

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Distribusi Dana Sosial & Ritual</h4>

    @if($distribusi->isEmpty())
        <div class="alert alert-info">
            Belum ada transaksi dana sosial & ritual yang tercatat.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Akun Debit</th>
                        <th>Nominal Debit</th>
                        <th>Akun Kredit</th>
                        <th>Nominal Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distribusi as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->akunDebit->nama ?? '-' }}</td>
                        <td class="text-end">Rp {{ number_format($item->nominal_debit, 0, ',', '.') }}</td>
                        <td>{{ $item->akunKredit->nama ?? '-' }}</td>
                        <td class="text-end">Rp {{ number_format($item->nominal_kredit, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
