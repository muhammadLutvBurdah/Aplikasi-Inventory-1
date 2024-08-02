<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKeluar;
use App\Barang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = BarangKeluar::with('barangs');

        if ($search) {
            $query->where('Deskripsi', 'like', '%' . $search . '%');
        }

        // Urutkan data berdasarkan ID secara terbalik (dari yang terbaru ke yang paling lama)
        $query->orderBy('BarangKeluarID', 'desc');

        $BarangKeluar = $query->paginate(10);

        return view('barangkeluars.index', compact('BarangKeluar', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('barangkeluars.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'Order' => 'required|array',
            'Jenis' => 'required',
        ];

        // Validasi input
        $this->validate($request, $rules);

        try {
            DB::transaction(function () use ($request) {
                foreach ($request->Order as $order) {
                    $barangID = $order['BarangID'];
                    $jumlah = $order['Jumlah'];
                    $deskripsi = $order['Deskripsi'];

                    // Temukan barang berdasarkan ID
                    $barang = Barang::findOrFail($barangID);

                    // Periksa jika stok mencukupi
                    if ($barang->StockQuantity - $jumlah < 0) {
                        throw new \Exception('Stok tidak mencukupi!');
                    }

                    $BarangKeluar = new BarangKeluar();

                    $BarangKeluar->Tanggal = Carbon::now();
                    $BarangKeluar->BarangID = $barangID;
                    $BarangKeluar->Jumlah = $jumlah;
                    $BarangKeluar->Deskripsi = $deskripsi;
                    $BarangKeluar->Jenis = $request->input('Jenis');
                    $BarangKeluar->save();

                    // Kurangi stok barang
                    $barang->StockQuantity -= $jumlah;
                    $barang->save();
                }
            });

            return redirect()->route('barangkeluars.index')->with('success', 'Barang Created Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Pastikan $id sesuai dengan kunci primer yang benar
        $barangs = Barang::all();
        $BarangKeluar = BarangKeluar::find($id);

        return view('barangkeluars.edit', compact('BarangKeluar', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'BarangID' => 'required',
            'Jumlah' => 'required|numeric|min:1',
            'Deskripsi' => 'required',
            'Jenis' => 'required',
        ]);

        // Temukan data BarangKeluar yang ingin diupdate
        $barangKeluar = BarangKeluar::findOrFail($id);

        // Hitung selisih antara jumlah baru dan jumlah lama
        $selisihJumlah = $request->input('Jumlah') - $barangKeluar->Jumlah;

        // Perbarui nilai atribut pada model BarangKeluar
        $barangKeluar->BarangID = $request->input('BarangID');
        $barangKeluar->Jumlah = $request->input('Jumlah');
        $barangKeluar->Deskripsi = $request->input('Deskripsi');
        $barangKeluar->Jenis = $request->input('Jenis');

        // Simpan perubahan
        $barangKeluar->save();

        // Kurangi atau tambahkan stok barang di tabel barang berdasarkan selisih jumlah
        $barang = Barang::find($request->BarangID);
        $barang->StockQuantity -= $selisihJumlah;
        $barang->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('barangkeluars.index')->with('success', 'Barang Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BarangKeluar = BarangKeluar::findOrFail($id);
        $BarangKeluar->delete();

        return redirect()->route('barangkeluars.index')->with('success', 'Barang Deleted Successfully.');
    }

    public function CetakBarangKeluarForm()
    {
        return view('barangkeluars.cetak');
    }

    public function CetakBarangPerbulan($from, $to)
    {
        $CetakBarangK = BarangKeluar::with('barangs')->whereBetween('Tanggal', [$from, $to])->get();
        return view('barangkeluars.cetakperbulan', compact('CetakBarangK'));
    }
}
