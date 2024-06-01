@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rekap Pembelian Barang</h1>
    <form action="{{ route('report.pdf') }}" method="GET">
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Akhir</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate PDF</button>
    </form>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nomor PO</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
            <tr>
                <td>{{ $pembelian->nomor_pembelian }}</td>
                <td>{{ $pembelian->tanggal }}</td>
                <td>{{ $pembelian->kode_barang }}</td>
                <td>{{ $pembelian->barang->nama_barang }}</td>
                <td>{{ $pembelian->satuan }}</td>
                <td>{{ $pembelian->qty }}</td>
                <td>{{ $pembelian->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
