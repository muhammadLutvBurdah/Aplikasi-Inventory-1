<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanSiswa;
use App\Siswa;
use App\Barang;
use App\User;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class PeminjamanSiswaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $PeminjamanSiswas = PeminjamanSiswa::with('siswa', 'barang')
        ->when($search, function ($query) use ($search) {
            return $query->where('NamaSiswa', 'like', '%' . $search . '%');
        })
        ->orderBy('PeminjamanSiswaID', 'desc') // Urutkan data berdasarkan ID secara terbalik (dari yang terbaru ke yang paling lama)
        ->get();

    return view('peminjamansiswas.index', compact('PeminjamanSiswas', 'search'));
}

    public function create()
    {
        $peminjamansiswas =  new PeminjamanSiswa();
        $siswas = Siswa::all();
        $barangs = Barang::all();

        return view('peminjamansiswas.create', compact('siswas', 'barangs', 'peminjamansiswas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'Nisn' => 'required|exists:siswa,Nisn',
            'NamaSiswa' => 'nullable',
            'Kelas' => 'nullable',
            'Ruang' => 'nullable',
            'Order' => 'required|array',
            'Petugas' => 'nullable',
            'TanggalPengembalian' => 'nullable|date',
            'JumlahKembali' => 'nullable|numeric',
        ];

        $this->validate($request, $rules);

        return DB::transaction(function () use ($request) {
            foreach ($request->Order as $order) {
                $barangID = $order['BarangID'];
                $jumlah = $order['Jumlah'];

                $barang = Barang::findOrFail($barangID);
                if ($barang->StockQuantity - $jumlah < 0) {
                    return redirect()->back()
                        ->with('error', 'Stok tidak mencukupi!');
                }

                $PeminjamanSiswas = new PeminjamanSiswa();
                $PeminjamanSiswas->Status = $request->status;

                if ($request->status === 'menetap') {
                    $PeminjamanSiswas->BatasPengembalian = null;
                    $PeminjamanSiswas->TanggalPengembalian = null;
                    $PeminjamanSiswas->JumlahKembali = null;
                } elseif ($request->status === 'kembali') {
                    $PeminjamanSiswas->BatasPengembalian = $request->input('BatasPengembalian');
                    $PeminjamanSiswas->TanggalPengembalian = $request->input('TanggalPengembalian');
                    $PeminjamanSiswas->JumlahKembali = $request->input('JumlahKembali');
                }

                $PeminjamanSiswas->Tanggal = Carbon::now();
                $PeminjamanSiswas->Nisn = $request->input('Nisn');
                $PeminjamanSiswas->NamaSiswa = $request->input('NamaSiswa');
                $PeminjamanSiswas->Kelas = $request->input('Kelas');
                $PeminjamanSiswas->Ruang = $request->input('Ruang');

                $PeminjamanSiswas->BarangID = $barangID;
                $PeminjamanSiswas->Jumlah = $jumlah;

                $PeminjamanSiswas->Petugas = $request->input('Petugas');
                $PeminjamanSiswas->TanggalPengembalian = $request->input('TanggalPengembalian');
                $PeminjamanSiswas->JumlahKembali = $request->input('JumlahKembali');
                $PeminjamanSiswas->save();

                $barang->StockQuantity -= $jumlah;
                $barang->save();
            }

            if ($request->input('cetak') == 'Cetak') {

                return redirect()->route('peminjamansiswas.bukti', $request->input('Nisn'));
            } else {
                return redirect()->route('peminjamansiswas.index')->with('success', 'Transaksi Created Successfully.');
            }
        });
    }

    public function show($id)
    {
        $peminjamanSiswa = PeminjamanSiswa::with('siswa', 'barang')->findOrFail($id);
        return view('peminjamansiswas.show', compact('peminjamanSiswa'));
    }

    public function edit($id)
    {
        $siswas = Siswa::all();
        $barangs = Barang::all();

        $peminjamansiswa = PeminjamanSiswa::find($id);
        $peminjamansiswa->Tanggal = Carbon::now()->toDateString();

        return view('peminjamansiswas.edit', compact('siswas', 'barangs', 'peminjamansiswa'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rules = [
            'Nisn' => 'required|exists:siswa,Nisn',
            'NamaSiswa' => 'nullable',
            'Kelas' => 'nullable',
            'Ruang' => 'nullable',
            'Order' => 'required|array',
            'Petugas' => 'nullable',
            'TanggalPengembalian' => 'nullable|date',
            'JumlahKembali' => 'nullable|numeric',
        ];


        $this->validate($request, $rules);

        $PeminjamanSiswas = new PeminjamanSiswa();
        $PeminjamanSiswas = PeminjamanSiswa::findOrFail($id);

        if ($request->input('status') === 'menetap') {
            $PeminjamanSiswas->BatasPengembalian = null;
            $PeminjamanSiswas->TanggalPengembalian = null;
            $PeminjamanSiswas->JumlahKembali = null;
        } elseif ($request->input('status') === 'kembali') {
            $PeminjamanSiswas->BatasPengembalian = $request->input('BatasPengembalian');
            $PeminjamanSiswas->TanggalPengembalian = $request->input('TanggalPengembalian');
            $PeminjamanSiswas->JumlahKembali = $request->input('JumlahKembali');
        }

        $PeminjamanSiswas->Tanggal = Carbon::now();

        $PeminjamanSiswas->Nisn = $request->input('Nisn');
        $PeminjamanSiswas->NamaSiswa = $request->input('NamaSiswa');
        $PeminjamanSiswas->Kelas = $request->input('Kelas');
        $PeminjamanSiswas->Ruang = $request->input('Ruang');

        $PeminjamanSiswas->BarangID = $request->input('BarangID');
        $PeminjamanSiswas->Jumlah = $request->input('Jumlah');
        $PeminjamanSiswas->Petugas = $request->input('Petugas');
        $PeminjamanSiswas->TanggalPengembalian = $request->input('TanggalPengembalian');
        $PeminjamanSiswas->JumlahKembali = $request->input('JumlahKembali');

        $PeminjamanSiswas->save();

        $barang = Barang::find($request->BarangID);
        $barang->StockQuantity += $request->JumlahKembali;
        $barang->save();

        return redirect()->route('peminjamansiswas.index')->with('success', 'Transaksi Updated Successfully.');
    }

    public function destroy($id)
    {
        $PeminjamanSiswas = PeminjamanSiswa::findOrFail($id);
        $PeminjamanSiswas->delete();

        return redirect()->route('peminjamansiswas.index')->with('success', 'Transaksi Deleted Successfully.');
    }

    public function showCreateFormWithCart()
    {
        // Mendapatkan data keranjang dari session
        $keranjang = session('keranjang', []);
        // Mengirimkan data keranjang ke dalam form create
        return view('peminjamansiswas.create', ['keranjang' => $keranjang]);
    }

    public function addToCart(Request $request)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'BarangID' => 'required|exists:barang,BarangID',
            'Jumlah' => 'required|numeric',
        ]);

        // Mendapatkan data barang dari database
        $barang = Barang::findOrFail($request->BarangID);

        // Menambahkan barang ke dalam keranjang
        $cartItem = [
            'BarangID' => $barang->BarangID,
            'NamaBarang' => $barang->NamaBarang,
            'Jumlah' => $request->Jumlah,
        ];

        session()->push('keranjang', $cartItem);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    public function saveCartToPeminjaman(Request $request)
    {
        // Mendapatkan data keranjang dari session
        $keranjang = session('keranjang', []);

        session()->forget('keranjang');

        // Memberikan respons sukses atau gagal ke frontend
        return redirect()->route('peminjamansiswas.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function CetakSiswaForm()
    {
        return view('peminjamansiswas.cetak');
    }

    public function CetakSiswaPerbulan($from, $to)
    {
        $CetakPerbulan = PeminjamanSiswa::with('siswa', 'barang')->whereBetween('created_at', [$from, $to])->get();
        return view('peminjamansiswas.cetakperbulan', compact('CetakPerbulan'));
    }

    public function StrukBukti($Nisn)
    {
        // Query database untuk mendapatkan data berdasarkan NISN dan Tanggal
        return view('peminjamansiswas.struk', compact('Nisn'));
    }

    public function CetakBukti(Request $request, $Nisn, $Tanggal)
    {
        $data = PeminjamanSiswa::where('Nisn', $Nisn)
            ->whereDate('Tanggal', $Tanggal)
            ->get();
        $pdf = PDF::loadview('peminjamansiswas.bukti', ['data' => $data]);
        return $pdf->stream('cetak_bukti.pdf');
    }

    public function getSiswaData($nisn)
    {
        $siswa = Siswa::where('Nisn', $nisn)->first();

        if ($siswa) {
            return response()->json([
                'NamaSiswa' => $siswa->NamaSiswa,
                'Kelas' => $siswa->Kelas->NamaKelas,
                'Ruang' => $siswa->Ruang->NamaRuang,
            ]);
            // dd($siswa);
        } else {

            return response()->json(['error' => 'Siswa not found'], 404);
        }
    }
}
