<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Jabatan::query();

        if ($search) {
            $query->where('NamaJabatan', 'LIKE', '%' . $search . '%');
        }

        $query->orderBy('JabatanID', 'desc');

        $jabatans = $query->paginate(10);
        return view('jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        return view('jabatans.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'NamaJabatan' => 'required|max:255',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan created successfully.');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('jabatans.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, ['NamaJabatan' => 'required|max:255',]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan updated successfully.');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatans.index')->with('success', 'Jabatan deleted successfully.');
    }
}
