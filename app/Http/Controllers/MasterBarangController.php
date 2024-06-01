<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function index()
    {
        $barangs = MasterBarang::all();
        return view('master-barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('master-barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        MasterBarang::create($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Barang created successfully.');
    }

    public function edit(MasterBarang $barang)
    {
        return view('master-barang.edit', compact('barang'));
    }

    public function update(Request $request, MasterBarang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang->update($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Barang updated successfully.');
    }

    public function destroy(MasterBarang $barang)
    {
        $barang->delete();
        return redirect()->route('master-barang.index')->with('success', 'Barang deleted successfully.');
    }
}
