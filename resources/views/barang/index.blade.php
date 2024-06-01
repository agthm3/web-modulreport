@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->qty }}</td>
                <td>{{ $barang->harga }}</td>
                <td>
                    <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
