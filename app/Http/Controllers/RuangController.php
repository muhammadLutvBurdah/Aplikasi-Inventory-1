<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;

class RuangController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        $query = Ruang::query();
    
        if ($search) {
            $query->where('NamaRuang', 'LIKE', '%' . $search . '%');
        }
        $query->orderBy('RuangID', 'desc');
    
        $ruangs = $query->paginate(10);
        return view('ruangs.index', compact('ruangs'));
    }
    

    public function create()
    {
        return view('ruangs.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'NamaRuang' => 'required|max:255',
        ]);

        Ruang::create($request->all());

        return redirect()->route('ruangs.index')->with('success', 'Ruangan created successfully.');
    }

    public function edit($id)
    {
        $ruang = Ruang::findOrFail($id);

        return view('ruangs.edit', compact('ruang'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, ['NamaRuang' => 'required|max:255',]);

        $ruang = Ruang::findOrFail($id);
        $ruang->update($request->all());

        return redirect()->route('ruangs.index')->with('success', 'Ruangan updated successfully.');
    }

    public function destroy($id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();

        return redirect()->route('ruangs.index')->with('success', 'Ruangan deleted successfully.');
    }
}
