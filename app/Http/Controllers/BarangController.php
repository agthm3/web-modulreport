<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:barangs',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:10',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang created successfully.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:10',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang updated successfully.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully.');
    }
}
