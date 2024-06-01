@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang->kode_barang }}" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $barang->satuan }}" required>
        </div>
        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" value="{{ $barang->qty }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
