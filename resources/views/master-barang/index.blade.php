@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Master Barang</h2>
            <a href="{{ route('master-barang.create') }}" class="btn btn-primary">Tambah Barang</a>
            <table class="table mt-3">
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
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $barang->id }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->satuan }}</td>
                            <td>{{ $barang->qty }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>
                                <a href="{{ route('master-barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('master-barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
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
    </div>
</div>
@endsection
