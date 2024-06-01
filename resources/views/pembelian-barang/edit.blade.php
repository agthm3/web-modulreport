@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Pembelian</h2>
            <form action="{{ route('pembelian-barang.update', $pembelian->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomor_pembelian">Nomor Pembelian</label>
                    <input type="text" class="form-control" id="nomor_pembelian" name="nomor_pembelian" value="{{ $pembelian->nomor_pembelian }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pembelian->tanggal }}" required>
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <select class="form-control" id="kode_barang" name="kode_barang" required>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $barang->id == $pembelian->kode_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $pembelian->satuan }}" required>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="{{ $pembelian->qty }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $pembelian->harga }}" required>
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon (%)</label>
                    <input type="number" class="form-control" id="diskon" name="diskon" value="{{ $pembelian->diskon }}" required>
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="number" class="form-control" id="subtotal" name="subtotal" value="{{ $pembelian->subtotal }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
