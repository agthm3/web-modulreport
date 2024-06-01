@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Pembelian</h2>
            <form action="{{ route('pembelian-barang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomor_pembelian">Nomor Pembelian</label>
                    <input type="text" class="form-control" id="nomor_pembelian" name="nomor_pembelian" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <select class="form-control" id="kode_barang" name="kode_barang" required>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" required>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon (%)</label>
                    <input type="number" class="form-control" id="diskon" name="diskon" required>
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="number" class="form-control" id="subtotal" name="subtotal" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
