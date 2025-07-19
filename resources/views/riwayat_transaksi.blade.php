@extends('layouts.navigation')

@section('content')
<div class="container py-5">
    <h4 class="fw-bold text-uppercase mb-4 text-center" style="color: #2c3e50;">
        <i class="bi bi-journal-text me-2"></i>Riwayat Transaksi
    </h4>

    <div class="card shadow-sm border-0 rounded-4" style="background-color: #e6f4ea;">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table id="riwayatTable" class="table table-bordered align-middle text-sm" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                    <thead class="text-white text-uppercase text-center" style="background-color: #276749; font-size: 14px;">
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode</th>
                            <th>Akun</th>
                            <th>Keterangan</th>
                            <th>Posisi</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurnal as $item)
                            <tr style="cursor: default; transition: background-color 0.3s;">
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td><span class="fw-semibold" style="color: #276749;">{{ $item->kode_jurnal }}</span></td>
                                <td>{{ $item->akun->nama }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    <span class="badge rounded-pill
                                        {{ $item->posisi == 'debit' ? 'bg-success text-white' : 'bg-warning text-dark' }} 
                                        text-uppercase px-3 py-2 shadow-sm" style="font-weight: 600; letter-spacing: 0.05em;">
                                        {{ $item->posisi }}
                                    </span>
                                </td>
                                <td class="text-end text-dark fw-semibold" style="font-family: 'Roboto Mono', monospace;">
                                    Rp{{ number_format($item->nominal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Tidak ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    #riwayatTable tbody tr:hover {
        background-color: #d1e7d6 !important;
        transition: background-color 0.3s ease;
    }
    /* Bikin border tabel lebih halus */
    #riwayatTable, #riwayatTable th, #riwayatTable td {
        border-color: #a3b18a;
    }
    /* Hover untuk badge */
    .badge.bg-success:hover {
        background-color: #1e6b2f !important;
        color: #fff !important;
    }
    .badge.bg-warning:hover {
        background-color: #d69e2e !important;
        color: #000 !important;
    }
</style>
@endpush

@push('scripts')
    <!-- DataTables CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#riwayatTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                pageLength: 10,
                order: [[0, 'desc']],
                responsive: true
            });
        });
    </script>
@endpush
