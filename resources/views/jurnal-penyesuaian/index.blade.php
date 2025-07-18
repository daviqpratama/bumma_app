@extends('layouts.admin')

@section('title', 'Jurnal Penyesuaian')

@section('content')
<div class="container">

    <h3 class="mb-3">Jurnal Penyesuaian</h3>

    <form method="GET" action="{{ route('jurnal-penyesuaian.index') }}" class="d-flex gap-2 flex-wrap align-items-center mb-4">
        <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}" style="max-width: 180px;">
        <input type="text" name="nomor_jurnal" class="form-control" placeholder="Nomor Jurnal" value="{{ request('nomor_jurnal') }}" style="max-width: 180px;">
        <button type="submit" class="btn btn-success">Cari Jurnal</button>
        <a href="{{ route('jurnal-penyesuaian.export.pdf') }}" class="btn btn-outline-danger">Ekspor PDF</a>
        <a href="{{ route('jurnal-penyesuaian.export.excel') }}" class="btn btn-outline-success">Ekspor Excel</a>
    </form>

    <div class="card p-3">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Nomor Jurnal</th>
                    <th>Akun</th>
                    <th>Deskripsi</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurnals as $jurnal)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}</td>
                        <td>{{ $jurnal->nomor_jurnal }}</td>
                        <td>{{ $jurnal->akun }}</td>
                        <td>{{ $jurnal->deskripsi }}</td>
                        <td>Rp {{ number_format($jurnal->debit, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($jurnal->kredit, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data jurnal penyesuaian ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3 text-end fw-semibold">
            Total Debit: Rp {{ number_format($totalDebit, 0, ',', '.') }}<br>
            Total Kredit: Rp {{ number_format($totalKredit, 0, ',', '.') }}
        </div>
    </div>

    <div class="alert alert-success mt-3">
        <strong>Catatan:</strong> Jurnal Penyesuaian mencatat penyesuaian terhadap akun-akun di akhir periode.
    </div>

</div>
@endsection
