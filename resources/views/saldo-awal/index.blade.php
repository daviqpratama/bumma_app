@extends('layouts.admin')

@section('title', 'Saldo Awal')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" class="form-control w-25" placeholder="🔍 Search" />
        <a href="#" class="btn btn-success">+ NAMA AKUN</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NAMA AKUN</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($akun as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>Rp</td>
                    <td>Rp</td>
                    <td>
                        <button class="btn btn-sm btn-success">✏️</button>
                        <button class="btn btn-sm btn-danger">🗑️</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
