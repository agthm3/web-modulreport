<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\PembelianBarang;
use Illuminate\Http\Request;

class PembelianBarangController extends Controller
{
    public function index()
    {
        $pembelians = PembelianBarang::all();
        return view('pembelian-barang.index', compact('pembelians'));
    }

    public function create()
    {
        $barangs = MasterBarang::all();
        return view('pembelian-barang.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal' => 'required|date',
            'kode_barang' => 'required|exists:master_barang,id',
            'satuan' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        PembelianBarang::create($request->all());
        return redirect()->route('pembelian-barang.index')->with('success', 'Pembelian created successfully.');
    }

    public function edit(PembelianBarang $pembelian)
    {
        $barangs = MasterBarang::all();
        return view('pembelian-barang.edit', compact('pembelian', 'barangs'));
    }

    public function update(Request $request, PembelianBarang $pembelian)
    {
        $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal' => 'required|date',
            'kode_barang' => 'required|exists:master_barang,id',
            'satuan' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $pembelian->update($request->all());
        return redirect()->route('pembelian-barang.index')->with('success', 'Pembelian updated successfully.');
    }

    public function destroy(PembelianBarang $pembelian)
    {
        $pembelian->delete();
        return redirect()->route('pembelian-barang.index')->with('success', 'Pembelian deleted successfully.');
    }
}
