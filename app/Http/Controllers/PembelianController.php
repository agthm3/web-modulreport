<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('pembelian.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_pembelian' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric'
        ]);

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        if ($barang) {
            $barang->qty -= $request->qty;
            $barang->save();
        }

        $harga_setelah_diskon = $request->harga - ($request->harga * $request->diskon / 100);
        $subtotal = $harga_setelah_diskon * $request->qty;
        Pembelian::create(array_merge($request->all(), ['subtotal' => $subtotal]));

        return redirect()->route('pembelian.index')->with('success', 'Pembelian created successfully.');
    }

    public function edit(Pembelian $pembelian)
    {
        $barangs = Barang::all();
        return view('pembelian.edit', compact('pembelian', 'barangs'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'nomor_pembelian' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric'
        ]);

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        if ($barang) {
            $barang->qty += $pembelian->qty - $request->qty;
            $barang->save();
        }

        $harga_setelah_diskon = $request->harga - ($request->harga * $request->diskon / 100);
        $subtotal = $harga_setelah_diskon * $request->qty;
        $pembelian->update(array_merge($request->all(), ['subtotal' => $subtotal]));

        return redirect()->route('pembelian.index')->with('success', 'Pembelian updated successfully.');
    }

    public function destroy(Pembelian $pembelian)
    {
        if ($pembelian) {
            $barang = Barang::where('kode_barang', $pembelian->kode_barang)->first();
            if ($barang) {
                $barang->qty += $pembelian->qty;
                $barang->save();
            }
            $pembelian->delete();
        }
        
        return redirect()->route('pembelian.index')->with('success', 'Pembelian deleted successfully.');
    }
}
