@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-success text-white">Daftar Akun</div>
        <div class="card-body">
            <p>Halaman daftar akun masih kosong.</p>
            <a href="{{ route('transaksi.create') }}" class="btn btn-success">+ Tambah Transaksi</a>
        </div>
    </div>
</div>
@endsection
