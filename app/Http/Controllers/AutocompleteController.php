<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class AutocompleteController extends Controller
{
    public function siswa(Request $request)
    {
        $term = $request->input('term');
        $siswas = Siswa::where('NamaSiswa', 'LIKE', '%' . $term . '%')->get(['SiswaID', 'NamaSiswa']);

        return response()->json($siswas);
    }
}
