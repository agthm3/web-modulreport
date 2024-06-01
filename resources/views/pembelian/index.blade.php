@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pembelian</h1>
    <a href="{{ route('pembelians.create') }}" class="btn btn-primary">Tambah Pembelian</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nomor Pembelian</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
            <tr>
                <td>{{ $pembelian->nomor_pembelian }}</td>
                <td>{{ $pembelian->tanggal }}</td>
                <td>{{ $pemb
