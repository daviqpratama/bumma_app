@extends('layouts.admin')

@section('title', 'Buku Besar')

@section('content')
<div class="container-fluid mt-4 px-4">
    <h3 class="fw-bold mb-3">Buku Besar</h3>

    <!-- Filter & Ekspor -->
    <div class="d-flex align-items-center gap-3 bg-light p-3 rounded shadow-sm mb-4">
        <form action="{{ route('buku-besar.index') }}" method="GET" class="d-flex align-items-center gap-2">
            <select name="akun_id" class="form-select" style="width: 180px;">
                <option value="">Pilih Akun</option>
                @foreach ($daftarAkun as $akun)
                    <option value="{{ $akun->id }}" {{ request('akun_id') == $akun->id ? 'selected' : '' }}>
                        {{ $akun->kode }} - {{ $akun->nama }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control" style="width: 180px;">

            <button type="submit" class="btn btn-success">Terapkan Filter</button>
        </form>

        <!-- Tombol Ekspor -->
        <div class="ms-auto d-flex gap-2">
            <a href="{{ route('buku-besar.exportPdf', request()->all()) }}" class="btn btn-outline-secondary">Ekspor PDF</a>
            <a href="{{ route('buku-besar.exportExcel', request()->all()) }}" class="btn btn-outline-secondary">Ekspor Excel</a>
        </div>
    </div>

    <!-- Tabel Buku Besar -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover m-0">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>No Ref</th>
                        <th>Deskripsi</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @php $saldoBerjalan = 0; @endphp
                    @forelse ($transaksis as $data)
                        @php $saldoBerjalan += $data->debit - $data->kredit; @endphp
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</td>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ number_format($data->debit, 0, ',', '.') }}</td>
                            <td>{{ number_format($data->kredit, 0, ',', '.') }}</td>
                            <td>{{ number_format($saldoBerjalan, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex justify-content-center">
            {{ $transaksis->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
