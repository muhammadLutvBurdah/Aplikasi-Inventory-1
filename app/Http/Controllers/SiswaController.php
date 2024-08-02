<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Ruang;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil data siswa dan urutkan secara menurun berdasarkan tanggal pembuatan
        $siswas = Siswa::with('ruang', 'kelas')
            ->when($search, function ($query) use ($search) {
                return $query->where('NamaSiswa', 'like', '%' . $search . '%');
            })
            ->latest() // Mengurutkan berdasarkan tanggal pembuatan secara menurun
            ->get();   // Mengambil semua data tanpa paginasi

        return view('siswas.index', compact('siswas', 'search'));
    }

    public function create()
    {
        $ruangs = Ruang::all();
        $kelass = Kelas::all();
        return view('siswas.create', compact('ruangs', 'kelass'));
    }

    public function store(Request $request)
    {
        $rules = [
            'Nisn' => 'required|unique:siswa,Nisn|string|max:255', // Validasi untuk Nisn
            'NamaSiswa' => 'required|string|max:255',
            'RuangID' => 'required|exists:ruang,RuangID',
            'KelasID' => 'required|exists:kelas,KelasID',
        ];

        $this->validate($request, $rules);


        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with('success', 'Siswa Created Successfully.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $ruangs = Ruang::all();
        $kelass = Kelas::all();

        return view('siswas.edit', compact('siswa', 'ruangs', 'kelass'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'Nisn' => 'required|unique:siswa,Nisn|string|max:255', // Validasi untuk Nisn
            'NamaSiswa' => 'required|string|max:255',
            'RuangID' => 'required|exists:ruang,RuangID',
            'KelasID' => 'required|exists:kelas,KelasID',
        ];

        $this->validate($request, $rules);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswas.index')->with('success', 'Siswa Updated Successfully.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Siswa Deleted Successfully.');
    }

    public function Cetak()
    {
        return view('siswas.cetak');
    }

    public function CetakSiswa()
    {
        $SiswaCetak = Siswa::with('Kelas', 'Ruang')->get();
        return view('siswas.cetaksiswa', compact('SiswaCetak',));
    }
}
