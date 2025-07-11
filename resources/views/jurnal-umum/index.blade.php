@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Jurnal Umum</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Kode Jurnal</th>
                    <th>Akun</th>
                    <th>Keterangan</th>
                    <th>Posisi</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurnals as $jurnal)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $jurnal->kode_jurnal }}</td>
                        <td>{{ $jurnal->akun->nama ?? '-' }}</td>
                        <td>{{ $jurnal->keterangan }}</td>
                        <td>{{ ucfirst($jurnal->posisi) }}</td>
                        <td>Rp{{ number_format($jurnal->nominal, 2, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data jurnal tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
