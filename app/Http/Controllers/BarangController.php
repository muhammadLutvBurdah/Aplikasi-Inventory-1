<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Barang::query();
        if ($search) {
            $query->where('NamaBarang', 'LIKE', '%' . $search . '%');
        }

        $query->orderBy('BarangID', 'desc');

        $barangs = $query->paginate(10);
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'NamaBarang' => 'required',
            'StockQuantity' => 'required|numeric'
        ];

        $this->validate($request, $rules);
        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang Created Successfully.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'NamaBarang' => 'required',
            'StockQuantity' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang Updated Successfully.');
    }

    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang Deleted Successfully.');
    }
}
