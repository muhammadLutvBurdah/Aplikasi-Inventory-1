<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Jabatan;

class KaryawanController extends Controller
{
  public function index(Request $request)
{
    $search = $request->input('search');

    $karyawans = Karyawan::with('jabatan')
        ->when($search, function ($query) use ($search) {
            return $query->where('NamaKaryawan', 'like', '%' . $search . '%');
        })
        ->orderBy('Nik', 'desc') // Urutkan data berdasarkan ID secara terbalik (dari yang terbaru ke yang paling lama)
        ->paginate(10);

    return view('karyawans.index', compact('karyawans', 'search'));
}

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('karyawans.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $rules = [
            'Nik' => 'required|unique:karyawan,Nik|string|max:255',
            'Email' => 'required',
            'NamaKaryawan' => 'required',
            'JabatanID' => 'required|exists:jabatan,JabatanID',
            'NoTelp' => 'required|numeric',
            'Alamat' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);
        Karyawan::create($request->all());

        return redirect()->route('karyawans.index')->with('success', 'Karyawan Created Successfully.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $jabatans = Jabatan::all();

        return view('karyawans.edit', compact('karyawan', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'Nik' => 'required|unique:karyawan,Nik|string|max:255',
            'Email' => 'required',
            'NamaKaryawan' => 'required',
            'JabatanID' => 'required|exists:jabatan,JabatanID',
            'NoTelp' => 'required|numeric',
            'Alamat' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawans.index')->with('success', 'Karyawan Updated Successfully.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawans.index')->with('success', 'Karyawan Deleted Successfully.');
    }

    public function Cetak()
    {
        return view('karyawans.cetak');
    }

    public function CetakKaryawan()
    {
        $KaryawanCetak = Karyawan::with('Jabatan')->get();
        return view('karyawans.cetakkaryawan', compact('KaryawanCetak',)); 
    }
}
