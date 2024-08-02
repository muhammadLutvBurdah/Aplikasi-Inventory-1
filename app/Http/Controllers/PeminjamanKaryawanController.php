<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanKaryawan;
use App\Karyawan;
use App\Barang;
use App\User;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class PeminjamanKaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $PeminjamanKaryawans = PeminjamanKaryawan::with('karyawan', 'barang')
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('karyawan', function ($q) use ($search) {
                    $q->where('NamaKaryawan', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('PeminjamanKaryawanID', 'desc') // Urutkan data berdasarkan ID secara terbalik (dari yang terbaru ke yang paling lama)
            ->get();
    
        return view('peminjamankaryawans.index', compact('PeminjamanKaryawans', 'search'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        $barangs = Barang::all();

        return view('peminjamankaryawans.create', compact('karyawans', 'barangs'));
    }

    public function store(Request $request)
    {
        $rules = [
            'Nik' => 'required|exists:karyawan,Nik',
            'NamaKaryawan' => 'nullable',
            'Jabatan' => 'nullable',
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

                $PeminjamanKaryawans = new PeminjamanKaryawan();
                $PeminjamanKaryawans->Status = $request->status;

                if ($request->status === 'menetap') {
                    $PeminjamanKaryawans->BatasPengembalian = null;
                    $PeminjamanKaryawans->TanggalPengembalian = null;
                    $PeminjamanKaryawans->JumlahKembali = null;
                } elseif ($request->status === 'kembali') {
                    $PeminjamanKaryawans->BatasPengembalian = $request->input('BatasPengembalian');
                    $PeminjamanKaryawans->TanggalPengembalian = $request->input('TanggalPengembalian');
                    $PeminjamanKaryawans->JumlahKembali = $request->input('JumlahKembali');
                }

                $PeminjamanKaryawans->Tanggal = Carbon::now();

                $PeminjamanKaryawans->Nik = $request->input('Nik');
                $PeminjamanKaryawans->NamaKaryawan = $request->input('NamaKaryawan');
                $PeminjamanKaryawans->Jabatan = $request->input('Jabatan');

                $PeminjamanKaryawans->BarangID = $barangID;
                $PeminjamanKaryawans->Jumlah = $jumlah;

                $PeminjamanKaryawans->Petugas = $request->input('Petugas');
                $PeminjamanKaryawans->TanggalPengembalian = $request->input('TanggalPengembalian');
                $PeminjamanKaryawans->JumlahKembali = $request->input('JumlahKembali');
                $PeminjamanKaryawans->save();

                $barang->StockQuantity -= $jumlah;
                $barang->save();
            }

            if ($request->input('cetak') == 'Cetak') {

                return redirect()->route('peminjamankaryawans.bukti', $request->input('Nik'));
            } else {
                return redirect()->route('peminjamankaryawans.index')->with('success', 'Transaksi Created Successfully.');
            }
        });
    }
    public function show($id)
    {
        $PeminjamanKaryawans = PeminjamanKaryawan::with('karyawan', 'barang', 'user')->findOrFail($id);
        return view('peminjamankaryawans.show', compact('PeminjamanKaryawans'));
    }


    public function edit($id)
    {
        $karyawans = Karyawan::all();
        $barangs = Barang::all();

        $peminjamankaryawan = PeminjamanKaryawan::find($id);
        $peminjamankaryawan->Tanggal = Carbon::now()->toDateString();

        return view('peminjamankaryawans.edit', compact('karyawans', 'barangs', 'peminjamankaryawan'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'Nik' => 'required|exists:karyawan,Nik',
            'NamaKaryawan' => 'nullable',
            'Jabatan' => 'nullable',
            'Order' => 'required|array',
            'Petugas' => 'nullable',
            'TanggalPengembalian' => 'nullable|date',
            'JumlahKembali' => 'nullable|numeric',
        ];

        $this->validate($request, $rules);

        $PeminjamanKaryawans = new PeminjamanKaryawan();
        $PeminjamanKaryawans = PeminjamanKaryawan::findOrFail($id);

        if ($request->input('status') === 'menetap') {
            $PeminjamanKaryawans->BatasPengembalian = null;
        } elseif ($request->input('status') === 'kembali') {
            $PeminjamanKaryawans->BatasPengembalian = $request->input('BatasPengembalian');
        }

        $PeminjamanKaryawans->Tanggal = Carbon::now();

        $PeminjamanKaryawans->Nik = $request->input('Nik');
        $PeminjamanKaryawans->NamaKaryawan = $request->input('NamaKaryawan');
        $PeminjamanKaryawans->Jabatan = $request->input('Jabatan');

        $PeminjamanKaryawans->BarangID = $request->input('BarangID');
        $PeminjamanKaryawans->Jumlah = $request->input('Jumlah');
        $PeminjamanKaryawans->Petugas = $request->input('Petugas');
        $PeminjamanKaryawans->TanggalPengembalian = $request->input('TanggalPengembalian');
        $PeminjamanKaryawans->JumlahKembali = $request->input('JumlahKembali');

        $PeminjamanKaryawans->save();

        $barang = Barang::find($request->BarangID);
        $barang->StockQuantity += $request->JumlahKembali;
        $barang->save();

        return redirect()->route('peminjamankaryawans.index')->with('success', 'Transaksi Updated Successfully.');
    }

    public function destroy($id)
    {
        $PeminjamanKaryawans = PeminjamanKaryawan::findOrFail($id);
        $PeminjamanKaryawans->delete();

        return redirect()->route('peminjamankaryawans.index')->with('success', 'Transaksi Deleted Successfully.');
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

        // Menyimpan data keranjang di session
        session()->push('keranjang', $cartItem);

        // Memberikan respons sukses atau gagal ke frontend
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    public function saveCartToPeminjaman(Request $request)
    {
        // Mendapatkan data keranjang dari session
        $keranjang = session('keranjang', []);

        // Validasi data keranjang sesuai kebutuhan

        // Simpan data keranjang ke dalam tabel peminjaman siswa
        // Implementasikan logika penyimpanan data sesuai struktur aplikasi Anda

        // Hapus data keranjang dari session
        session()->forget('keranjang');

        // Memberikan respons sukses atau gagal ke frontend
        return redirect()->route('peminjamankaryawans.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function CetakKaryawanForm()
    {
        return view('peminjamankaryawans.cetak');
    }

    public function CetakKaryawanPerbulan($from, $to)
    {
        $CetakPerbulan = PeminjamanKaryawan::with('karyawan', 'barang')->whereBetween('created_at', [$from, $to])->get();
        return view('peminjamankaryawans.cetakperbulan', compact('CetakPerbulan'));
    }

    public function StrukBukti($Nik)
    {
        return view('peminjamankaryawans.struk', compact('Nik'));
    }

    public function CetakBukti(Request $request, $Nik, $Tanggal)
    {
        $data = PeminjamanKaryawan::where('Nik', $Nik)
            ->whereDate('Tanggal', $Tanggal)
            ->get();
        $pdf = PDF::loadview('peminjamankaryawans.bukti', ['data' => $data]);
        // dd($data);
        return $pdf->stream('cetak_bukti.pdf');
    }

    public function getKaryawanData($nik)
    {
        $karyawan = Karyawan::where('Nik', $nik)->first();

        if ($karyawan) {
            return response()->json([
                'NamaKaryawan' => $karyawan->NamaKaryawan,
                'Jabatan' => $karyawan->Jabatan->NamaJabatan,
            ]);
            // dd($siswa);
        } else {

            return response()->json(['error' => 'Karyawan not found'], 404);
        }
    }
}
