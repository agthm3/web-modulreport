@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Pembelian Barang</h2>
            <a href="{{ route('pembelian-barang.create') }}" class="btn btn-primary">Tambah Pembelian</a>
            <table class="table mt-3">
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
                    @foreach ($pembelians as $pembelian)
                        <tr>
                            <td>{{ $pembelian->nomor_pembelian }}</td>
                            <td>{{ $pembelian->tanggal }}</td>
                            <td>{{ $pembelian->kode_barang }}</td>
                            <td>{{ $pembelian->satuan }}</td>
                            <td>{{ $pembelian->qty }}</td>
                            <td>{{ $pembelian->harga }}</td>
                            <td>{{ $pembelian->diskon }}</td>
                            <td>{{ $pembelian->subtotal }}</td>
                            <td>
                                <a href="{{ route('pembelian-barang.edit', $pembelian->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pembelian-barang.destroy', $pembelian->id) }}" method="POST" style="display:inline-block;">
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
