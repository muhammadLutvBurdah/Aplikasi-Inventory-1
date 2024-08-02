<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Kelas::query();

        if ($search) {
            $query->where('NamaKelas', 'LIKE', '%' . $search . '%');
        }

        $query->orderBy('KelasID', 'desc');

        $kelass = $query->paginate(10);
        return view('kelass.index', compact('kelass'));
    }

    public function create()
    {
        return view('kelass.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'NamaKelas' => 'required|max:255',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelass.index')->with('success', 'Kelas created successfully.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelass.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, ['NamaKelas' => 'required|max:255',]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelass.index')->with('success', 'Kelas updated successfully.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelass.index')->with('success', 'Kelas deleted successfully.');
    }
}
