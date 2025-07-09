@extends('layouts.admin') {{-- sebelumnya layouts.app --}}

@section('title', 'Jurnal Umum')

@section('content')
<div class="card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Jurnal Umum</h4>
        <div class="d-flex gap-2">
            <select id="filterSelect" class="form-select form-select-sm custom-input">
                <option value="">Filter Akun</option>
                <option value="Kas">Kas</option>
                <option value="Pendapatan Jasa">Pendapatan Jasa</option>
                <option value="Aset Tetap Peralatan">Aset Tetap Peralatan</option>
            </select>
            <input type="text" id="searchInput" class="form-control form-control-sm custom-input" placeholder="Search">
        </div>
    </div>

    <table class="table table-bordered table-sm align-middle">
        <thead class="table-light">
            <tr class="text-center">
                <th style="width: 40px;">No</th>
                <th style="width: 120px;">Tanggal</th>
                <th style="width: 120px;">Kode Jurnal</th>
                <th>Keterangan</th>
                <th>Akun</th>
                <th style="width: 130px;">Debit</th>
                <th style="width: 130px;">Kredit</th>
                <th style="width: 70px;">Ref</th>
            </tr>
        </thead>
        <tbody id="jurnalTable">
            @foreach ($jurnals as $index => $jurnal)
                <tr class="jurnal-row">
                    <td class="text-center nomor"></td>
                    <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $jurnal->kode_jurnal }}</td>
                    <td>{{ $jurnal->keterangan }}</td>
                    <td>{{ $jurnal->akun1 }}</td>
                    <td>Rp {{ number_format($jurnal->debit1, 0, ',', '.') }}</td>
                    <td></td>
                    <td>{{ $jurnal->ref1 }}</td>
                </tr>
                <tr class="jurnal-row">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $jurnal->akun2 }}</td>
                    <td></td>
                    <td>Rp {{ number_format($jurnal->kredit2, 0, ',', '.') }}</td>
                    <td>{{ $jurnal->ref2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .custom-input {
        width: 180px;
        background-color: #e2e8f0;
        color: #000;
        border: 1px solid #cbd5e1;
        font-size: 14px;
        padding: 6px 10px;
        border-radius: 6px;
    }

    #searchInput.custom-input {
        width: 220px;
    }

    .card h4 {
        font-weight: 600;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle !important;
        font-size: 14px;
    }
</style>

<script>
    const filterSelect = document.getElementById('filterSelect');
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#jurnalTable .jurnal-row');

    function updateNomor() {
        let nomor = 1;
        for (let i = 0; i < rows.length; i += 2) {
            if (rows[i].style.display !== "none") {
                rows[i].querySelector(".nomor").textContent = nomor++;
            }
        }
    }

    function filterTable() {
        const filterValue = filterSelect.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();

        for (let i = 0; i < rows.length; i += 2) {
            const row1 = rows[i];
            const row2 = rows[i + 1];
            const combinedText = (row1.innerText + row2.innerText).toLowerCase();

            const matchFilter = !filterValue || combinedText.includes(filterValue);
            const matchSearch = !searchValue || combinedText.includes(searchValue);

            if (matchFilter && matchSearch) {
                row1.style.display = '';
                row2.style.display = '';
            } else {
                row1.style.display = 'none';
                row2.style.display = 'none';
            }
        }
        updateNomor();
    }

    filterSelect.addEventListener('change', filterTable);
    searchInput.addEventListener('keyup', filterTable);
    window.addEventListener('DOMContentLoaded', updateNomor);
</script>
@endsection
