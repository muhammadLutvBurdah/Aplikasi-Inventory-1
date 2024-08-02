<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    // Method untuk menampilkan pesan dengan nama pengguna
    public function greeting(Request $request)
    {
        $namaUser = $request->input('nama');
        return view('greeting', ['namaUser' => $namaUser]);
    }
}
