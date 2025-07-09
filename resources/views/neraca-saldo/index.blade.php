@extends('layouts.admin')

@section('title', 'Neraca Saldo')

@section('content')
<div class="card shadow-sm border-0 p-3" style="background-color: #e9f2e4;">
    <!-- FILTER ATAS -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center flex-wrap gap-2">
            <h4 class="mb-0 fw-semibold me-3">Neraca Saldo</h4>
            <select class="form-select form-select-sm" style="min-width: 140px;">
                <option selected disabled>Pilih Akun</option>
                <option>Kas</option>
                <option>Piutang Usaha</option>
            </select>
            <input type="date" class="form-control form-control-sm" style="max-width: 160px;" />
            <button class="btn btn-success btn-sm">Terapkan Filter</button>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="#" class="btn btn-outline-success btn-sm">Ekspor PDF</a>
            <a href="#" class="btn btn-outline-success btn-sm">Ekspor Excel</a>
            <button class="btn btn-outline-secondary btn-sm">Edit <i class="bi bi-pencil ms-1"></i></button>
        </div>
    </div>

    <!-- TABEL NERACA SALDO -->
    <div class="table-responsive">
        <table class="table table-bordered table-sm align-middle">
            <thead style="background-color: #d1d6c9;">
                <tr class="text-center fw-semibold">
                    <th>Akun</th>
                    <th>Saldo Awal</th>
                    <th>Transaksi Keuangan</th>
                    <th>Saldo Akhir</th>
                </tr>
            </thead>
            <tbody>
                <!-- ASET -->
                <tr style="background-color: #d1d6c9;" class="fw-semibold">
                    <td colspan="4">Aset</td>
                </tr>
                <tr>
                    <td>Kas</td>
                    <td class="text-end">100.000</td>
                    <td class="text-end">20.000</td>
                    <td class="text-end">120.000</td>
                </tr>
                <tr>
                    <td>Piutang Usaha</td>
                    <td class="text-end">50.000</td>
                    <td class="text-end">10.000</td>
                    <td class="text-end">60.000</td>
                </tr>
                <tr>
                    <td>Persediaan</td>
                    <td class="text-end">30.000</td>
                    <td class="text-end">15.000</td>
                    <td class="text-end">45.000</td>
                </tr>
                <tr>
                    <td>Aset Tetap</td>
                    <td class="text-end">150.000</td>
                    <td class="text-end">0</td>
                    <td class="text-end">150.000</td>
                </tr>

                <!-- KEWAJIBAN -->
                <tr style="background-color: #d1d6c9;" class="fw-semibold">
                    <td colspan="4">Kewajiban</td>
                </tr>
                <tr>
                    <td>Utang Usaha</td>
                    <td class="text-end">20.000</td>
                    <td class="text-end">5.000</td>
                    <td class="text-end">25.000</td>
                </tr>

                <!-- EKUITAS -->
                <tr style="background-color: #d1d6c9;" class="fw-semibold">
                    <td colspan="4">Ekuitas</td>
                </tr>
                <tr>
                    <td>Modal</td>
                    <td class="text-end">120.000</td>
                    <td class="text-end">0</td>
                    <td class="text-end">120.000</td>
                </tr>
                <tr>
                    <td>Laba Ditahan</td>
                    <td class="text-end">10.000</td>
                    <td class="text-end">2.000</td>
                    <td class="text-end">12.000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- TOTAL DAN KESEIMBANGAN -->
    <div class="mt-3 text-end">
        <div><strong>Total Aset:</strong> 375.000</div>
        <div><strong>Total Kewajiban dan Ekuitas:</strong> 375.000</div>
    </div>
    <div class="mt-2 fw-semibold text-success" style="background-color: #e0f1de; padding: 8px; border-radius: 6px;">
        Keseimbangan Neraca: Aset = Kewajiban + Ekuitas (375.000 = 375.000)
    </div>
</div>
@endsection
