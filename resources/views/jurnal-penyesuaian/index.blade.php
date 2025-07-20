@extends('layouts.admin')

@section('title', 'Jurnal Penyesuaian')

@section('content')
<div class="container">
    <h3 class="mb-3">Jurnal Penyesuaian</h3>

    <div class="mb-3">
        <form action="{{ route('jurnal-penyesuaian.generate') }}" method="POST" onsubmit="return confirm('Yakin ingin membuat jurnal penyesuaian otomatis untuk bulan ini?')">
            @csrf
            <button type="submit" class="btn btn-primary">
                Generate Penyesuaian Otomatis
            </button>
        </form>
    </div>

    <form method="GET" action="{{ route('jurnal-penyesuaian.index') }}" class="d-flex gap-2 flex-wrap align-items-center mb-4">
        <select name="bulan" class="form-control" style="max-width: 140px;">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ sprintf('%02d', $i) }}" {{ request('bulan', $bulan) == sprintf('%02d', $i) ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                </option>
            @endfor
        </select>

        <select name="tahun" class="form-control" style="max-width: 140px;">
            @for ($y = now()->year; $y >= now()->year - 5; $y--)
                <option value="{{ $y }}" {{ request('tahun', $tahun) == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
        </select>

        <input type="text" name="nomor_jurnal" class="form-control" placeholder="Nomor Jurnal" value="{{ request('nomor_jurnal') }}" style="max-width: 180px;">

        <button type="submit" class="btn btn-success">Tampilkan</button>
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
                        <td>{{ $jurnal->kode_jurnal }}</td>
                        <td>{{ $jurnal->akun->nama ?? '-' }}</td>
                        <td>{{ $jurnal->keterangan }}</td>
                        <td>
                            @if ($jurnal->posisi === 'debit')
                                Rp {{ number_format($jurnal->nominal, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($jurnal->posisi === 'kredit')
                                Rp {{ number_format($jurnal->nominal, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
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
