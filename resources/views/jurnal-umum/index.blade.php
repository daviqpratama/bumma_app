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
                    <th>Ref</th>
                    <th>Waktu Input</th> {{-- created_at --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($jurnals as $jurnal)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $jurnal->kode_jurnal }}</td>
                        <td>{{ $jurnal->akun->nama ?? '-' }}</td>
                        <td>
                            @if ($jurnal->ref == 'Saldo Awal')
                                Saldo Awal
                            @else
                                {{ $jurnal->keterangan }}
                            @endif
                        </td>
                        <td>{{ ucfirst($jurnal->posisi) }}</td>
                        <td>Rp{{ number_format($jurnal->nominal, 2, ',', '.') }}</td>
                        <td>{{ $jurnal->ref }}</td>
                        <td>{{ \Carbon\Carbon::parse($jurnal->created_at)->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Data jurnal tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
