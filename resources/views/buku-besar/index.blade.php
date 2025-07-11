@extends('layouts.app')

@section('content')
<div class="bg-[#f4f5ec] min-h-screen px-8 py-6">
    <h2 class="text-2xl font-bold text-green-900 mb-6">Buku Besar</h2>

    <form method="GET" class="flex flex-wrap items-center gap-3 mb-6">
        <select name="akun" class="bg-[#e0e8d2] text-gray-700 px-4 py-2 rounded shadow">
            <option value="">Pilih Akun</option>
            @foreach ($akunList as $akun)
                <option value="{{ $akun->id }}" {{ request('akun') == $akun->id ? 'selected' : '' }}>
                    {{ $akun->nama }}
                </option>
            @endforeach
        </select>

        <input type="date" name="tanggal" value="{{ request('tanggal') }}"
            class="bg-[#e0e8d2] text-gray-700 px-4 py-2 rounded shadow">

        <button type="submit"
            class="bg-[#5e7444] text-white px-4 py-2 rounded shadow hover:bg-[#4d6036]">Terapkan Filter</button>

        <a href="#" class="bg-[#d9e7c3] text-black px-4 py-2 rounded shadow hover:bg-[#c3d6a7]">Ekspor PDF</a>
        <a href="#" class="bg-[#d9e7c3] text-black px-4 py-2 rounded shadow hover:bg-[#c3d6a7]">Ekspor Excel</a>
    </form>

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-[#dcdcd1] text-gray-800 font-semibold">
                <tr>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">No Ref</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Debit</th>
                    <th class="px-4 py-3">Kredit</th>
                    <th class="px-4 py-3">Saldo</th>
                </tr>
            </thead>
            <tbody class="text-gray-900 bg-white">
                @forelse ($paginatedData as $item)
                    <tr class="border-t hover:bg-[#f7faf0]">
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td class="px-4 py-2">{{ $item->no_ref }}</td>
                        <td class="px-4 py-2">{{ $item->deskripsi }}</td>
                        <td class="px-4 py-2 text-right">{{ $item->debit > 0 ? number_format($item->debit, 0, ',', '.') : '-' }}</td>
                        <td class="px-4 py-2 text-right">{{ $item->kredit > 0 ? number_format($item->kredit, 0, ',', '.') : '-' }}</td>
                        <td class="px-4 py-2 text-right">{{ number_format($item->saldo, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Custom pagination -->
    <div class="mt-6 flex justify-center">
        {{ $paginatedData->onEachSide(1)->links('vendor.pagination.custom') }}
    </div>
    <style>
    body {
        background-color: #f4f5ec !important;
    }
</style>

</div>
@endsection
