@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Input Transaksi</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Tanggal:</label>
            <input type="date" name="tanggal" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Keterangan:</label>
            <input type="text" name="keterangan" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Akun Debit:</label>
            <input type="text" name="akun_debit" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Nominal Debit:</label>
            <input type="number" step="0.01" name="nominal_debit" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Akun Kredit:</label>
            <input type="text" name="akun_kredit" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Nominal Kredit:</label>
            <input type="number" step="0.01" name="nominal_kredit" class="border rounded w-full p-2" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Transaksi
            </button>
        </div>
    </form>
@endsection
