<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PeminjamanKaryawan;
use App\PeminjamanSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        //    Jadi ini logika ketika siapa yang login maka dia sudah punya halaman nya tersendiri
        if (Auth::check()) {

            $countPeminjamanSiswa = PeminjamanSiswa ::all()->count();
            $countPeminjamanKaryawan = PeminjamanKaryawan ::all()->count();

            $barangdash = Barang::all();
            // dd($barangdash);
            $jsonBarang = array();
            foreach ($barangdash as $barang) {
                $jsonBarang['labels'][] = $barang->NamaBarang;
                $jsonBarang['data'][] = $barang->StockQuantity;
            }
            if (Auth::user()->role == 'admin') {
                return view('dashboard.home', compact('jsonBarang', 'countPeminjamanSiswa', 'countPeminjamanKaryawan'));
            } elseif (Auth::user()->role == 'petugas') {
                return view('dashboard.petugas', compact('jsonBarang', 'countPeminjamanSiswa', 'countPeminjamanKaryawan'));
            }
        }
    }
}
