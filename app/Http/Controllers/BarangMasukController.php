<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use App\Barang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = BarangMasuk::with('barangs');
    
        if ($search) {
            $query->where('Deskripsi', 'like', '%' . $search . '%');
        }
    
        // Urutkan data berdasarkan ID secara terbalik (dari yang terbaru ke yang paling lama)
        $query->orderBy('BarangMasukID', 'desc');
    
        $BarangMasuk = $query->paginate(10);
    
        return view('barangmasuks.index', compact('BarangMasuk', 'search'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barangmasuks.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $rules = [
            'Order' => 'required|array',
            'Jenis' => 'required',
        ];

        $this->validate($request, $rules);

        DB::transaction(function () use ($request) {
            foreach ($request->Order as $order) {
                $barangID = $order['BarangID'];
                $jumlah = $order['Jumlah'];
                $deskripsi = $order ['Deskripsi'];

                $BarangMasuk = new BarangMasuk();

                $BarangMasuk->Tanggal = Carbon::now();
                $BarangMasuk->BarangID = $barangID;
                $BarangMasuk->Jumlah = $jumlah;
                $BarangMasuk->Deskripsi = $deskripsi;

                $BarangMasuk->Jenis = $request->input('Jenis');
                $BarangMasuk->save();

                $barang = Barang::find($barangID);
                $barang->StockQuantity += $jumlah;
                $barang->save();
            }
        });

        return redirect()->route('barangmasuks.index')->with('success', 'Barang Created Successfully.');
    }

    public function edit($id)
    {
        $BarangMasuk = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();

        return view('barangmasuks.edit', compact('BarangMasuk', 'barangs'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'BarangID' => 'required',
        'Jumlah' => 'required|numeric|min:1',
        'Deskripsi' => 'required',
        'Jenis' => 'required',
    ]);

    // Temukan data BarangMasuk yang ingin diupdate
    $BarangMasuk = BarangMasuk::findOrFail($id);

    // Hitung selisih antara jumlah baru dan jumlah lama
    $selisihJumlah = $request->input('Jumlah') - $BarangMasuk->Jumlah;

    // Perbarui nilai atribut pada model BarangMasuk
    $BarangMasuk->BarangID = $request->input('BarangID');
    $BarangMasuk->Jumlah = $request->input('Jumlah');
    $BarangMasuk->Deskripsi = $request->input('Deskripsi');
    $BarangMasuk->Jenis = $request->input('Jenis');

    // Simpan perubahan
    $BarangMasuk->save();

    // Kurangi atau tambahkan stok barang di tabel barang berdasarkan selisih jumlah
    $barang = Barang::find($request->BarangID);
    $barang->StockQuantity += $selisihJumlah;
    $barang->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('barangmasuks.index')->with('success', 'Barang Updated Successfully.');
}

    public function destroy($id)
    {
        $BarangMasuk = BarangMasuk::findOrFail($id);
        $BarangMasuk->delete();

        return redirect()->route('barangmasuks.index')->with('success', 'Barang Deleted Successfully.');
    }

    public function CetakBarangMasukForm()
    {
        return view('barangmasuks.cetak');
    }

    public function CetakBarangPerbulan($from, $to)
    {
        $CetakBarangM = BarangMasuk::with('barangs')->whereBetween('Tanggal', [$from, $to])->get();
        return view('barangmasuks.cetakperbulan', compact('CetakBarangM'));
    }
}

