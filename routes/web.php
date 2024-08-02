<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RuangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');

// Auth::routes();
//dashboard
Route::get('home', 'dashboardController@index')->name('dashboard.home');

//ruang
Route::group(['middleware' => ['admin']], function () {
    // Route::resource('ruangs', 'ruangController');
    Route::get('ruangs', 'ruangController@index')->name('ruangs.index');
    Route::get('ruangs/create', 'ruangController@create')->name('ruangs.create');
    Route::post('ruangs', 'ruangController@store')->name('ruangs.store');
    Route::get('ruangs/{id}/edit', 'ruangController@edit')->name('ruangs.edit');
    Route::put('ruangs/{id}', 'ruangController@update')->name('ruangs.update');
    Route::delete('ruangs/{id}', 'ruangController@destroy')->name('ruangs.destroy');
});


//kelas
Route::group(['middleware' => ['admin']], function () {
    Route::get('kelass', 'kelasController@index')->name('kelass.index');
    Route::get('kelass/create', 'kelasController@create')->name('kelass.create');
    Route::post('kelass', 'kelasController@store')->name('kelass.store');
    Route::get('kelass/{id}/edit', 'kelasController@edit')->name('kelass.edit');
    Route::put('kelass/{id}', 'kelasController@update')->name('kelass.update');
    Route::delete('kelass/{id}', 'kelasController@destroy')->name('kelass.destroy');
});

//jabatan
Route::group(['middleware' => ['admin']], function () {
    Route::get('jabatan', 'jabatanController@index')->name('jabatans.index');
    Route::get('jabatan/create', 'jabatanController@create')->name('jabatans.create');
    Route::post('jabatan', 'jabatanController@store')->name('jabatans.store');
    Route::get('jabatan/{id}/edit', 'jabatanController@edit')->name('jabatans.edit');
    Route::put('jabatan/{id}', 'jabatanController@update')->name('jabatans.update');
    Route::delete('jabatan/{id}', 'jabatanController@destroy')->name('jabatans.destroy');
});

//siswa
Route::group(['middleware' => ['admin']], function () {
    Route::get('siswa', 'siswaController@index')->name('siswas.index');
    Route::get('siswa/create', 'siswaController@create')->name('siswas.create');
    Route::post('siswa', 'siswaController@store')->name('siswas.store');
    Route::get('siswa/{id}/edit', 'siswaController@edit')->name('siswas.edit');
    Route::put('siswa/{id}', 'siswaController@update')->name('siswas.update');
    Route::delete('siswa/{id}', 'siswaController@destroy')->name('siswas.destroy');
    Route::get('siswas/cetak', 'siswaController@Cetak')->name('siswas.cetak');
    Route::get('cetaksiswa', 'siswaController@CetakSiswa')->name('siswas.cetaksiswa');
});

//karyawan
Route::group(['middleware' => ['admin']], function () {
    Route::get('karyawan', 'karyawanController@index')->name('karyawans.index');
    Route::get('karyawan/create', 'karyawanController@create')->name('karyawans.create');
    Route::post('karyawan', 'karyawanController@store')->name('karyawans.store');
    Route::get('karyawan/{id}/edit', 'karyawanController@edit')->name('karyawans.edit');
    Route::put('karyawan/{id}', 'karyawanController@update')->name('karyawans.update');
    Route::delete('karyawan/{id}', 'karyawanController@destroy')->name('karyawans.destroy');
    Route::get('cetak', 'karyawanController@Cetak')->name('karyawans.cetak');
    Route::get('cetakkaryawan', 'karyawanController@CetakKaryawan')->name('karyawans.cetakkaryawan');
});

//barang
Route::group(['middleware' => ['admin']], function () {
    Route::get('barang', 'barangController@index')->name('barangs.index');
    Route::get('barang/create', 'barangController@create')->name('barangs.create');
    Route::post('barang', 'barangController@store')->name('barangs.store');
    Route::get('barang/{id}/edit', 'barangController@edit')->name('barangs.edit');
    Route::put('barang/{id}', 'barangController@update')->name('barangs.update');
    Route::delete('barang/{id}', 'barangController@destroy')->name('barangs.destroy');
});

//barangmasuk
Route::group(['middleware' => ['admin']], function () {
    Route::get('barangmasuk', 'BarangMasukController@index')->name('barangmasuks.index');
    Route::get('barangmasuk/create', 'BarangMasukController@create')->name('barangmasuks.create');
    Route::post('barangmasuk', 'BarangMasukController@store')->name('barangmasuks.store');
    Route::get('barangmasuk/{id}/edit', 'BarangMasukController@edit')->name('barangmasuks.edit');
    Route::put('barangmasuk/{id}', 'BarangMasukController@update')->name('barangmasuks.update');
    Route::delete('barangmasuk/{id}', 'BarangMasukController@destroy')->name('barangmasuks.destroy');
});

    Route::group(['middleware' => ['admin']], function () {
    Route::get('barangmasuks/cetak', 'BarangMasukController@CetakBarangMasukForm')->name('barangmasuks.cetak');
    Route::get('/cetak-bmbln/{from}/{to}', 'BarangMasukController@CetakBarangPerbulan')->name('cetak-bmbln');
});
//barangkeluar
Route::group(['middleware' => ['admin']], function () {
    Route::get('barangkeluar', 'BarangKeluarController@index')->name('barangkeluars.index');
    Route::get('barangkeluar/create', 'BarangKeluarController@create')->name('barangkeluars.create');
    Route::post('barangkeluar', 'BarangKeluarController@store')->name('barangkeluars.store');
    Route::get('barangkeluar/{id}/edit', 'BarangKeluarController@edit')->name('barangkeluars.edit');
    Route::put('barangkeluar/{id}', 'BarangKeluarController@update')->name('barangkeluars.update');
    Route::delete('barangkeluar/{id}', 'BarangKeluarController@destroy')->name('barangkeluars.destroy');
});

    Route::group(['middleware' => ['admin']], function () {
    Route::get('barangkeluars/cetak', 'BarangKeluarController@CetakBarangKeluarForm')->name('barangkeluars.cetak');
    Route::get('/cetak-bkbln/{from}/{to}', 'BarangKeluarController@CetakBarangPerbulan')->name('cetak-bkbln');
});

//
Route::group(['middleware' => ['petugas']], function () {
    Route::get('peminjamankaryawan', 'PeminjamanKaryawanController@index')->name('peminjamankaryawans.index');
    Route::get('peminjamankaryawan/create', 'PeminjamanKaryawanController@create')->name('peminjamankaryawans.create');
    Route::post('peminjamankaryawan', 'PeminjamanKaryawanController@store')->name('peminjamankaryawans.store');
    Route::get('peminjamankaryawan/{id}', 'PeminjamanKaryawanController@show')->name('peminjamankaryawans.show');
    Route::get('peminjamankaryawan/{id}/edit', 'PeminjamanKaryawanController@edit')->name('peminjamankaryawans.edit');
    Route::put('peminjamankaryawan/{id}', 'PeminjamanKaryawanController@update')->name('peminjamankaryawans.update');
    Route::delete('peminjamankaryawan/{id}', 'PeminjamanKaryawanController@destroy')->name('peminjamankaryawans.destroy');
    Route::post('peminjamankaryawan/add-to-cart', 'PeminjamanKaryawanController@addToCart')->name('peminjamankaryawans.addToCart');
    Route::post('peminjamankaryawan/save-cart', 'PeminjamanKaryawanController@saveCartToPeminjaman')->name('peminjamankaryawans.saveCartToPeminjaman');
    Route::get('peminjamankaryawans/struk/{Nik}', 'PeminjamanKaryawanController@StrukBukti')->name('peminjamankaryawans.bukti');
    Route::get('cetak_buktipdf/{ik}/{Tanggal}', 'PeminjamanKaryawanController@CetakBukti')->name('cetak_bukti.pdf');
    Route::get('/getKaryawanData/{nik}', 'PeminjamanKaryawanController@getKaryawanData')->name('getKaryawanData');
});

    Route::group(['middleware' => ['admin']], function () {
    Route::get('peminjamankaryawans/cetak', 'PeminjamanKaryawanController@CetakKaryawanForm')->name('peminjamankaryawans.cetak');
    Route::get('/cetak-blnk/{from}/{to}', 'PeminjamanKaryawanController@CetakKaryawanPerbulan')->name('cetak-bln');
});

//peminjamansiswa
Route::group(['middleware' => ['petugas']], function () {
    Route::get('peminjamansiswa', 'PeminjamanSiswaController@index')->name('peminjamansiswas.index');
    Route::get('peminjamansiswa/create', 'PeminjamanSiswaController@create')->name('peminjamansiswas.create');
    Route::post('peminjamansiswa', 'PeminjamanSiswaController@store')->name('peminjamansiswas.store');
    Route::get('peminjamansiswa/{id}', 'PeminjamanSiswaController@show')->name('peminjamansiswas.show');
    Route::get('peminjamansiswa/{id}/edit', 'PeminjamanSiswaController@edit')->name('peminjamansiswas.edit');
    Route::put('peminjamansiswa/{id}', 'PeminjamanSiswaController@update')->name('peminjamansiswas.update');
    Route::delete('peminjamansiswa/{id}', 'PeminjamanSiswaController@destroy')->name('peminjamansiswas.destroy');
    Route::post('peminjamansiswa/add-to-cart', 'PeminjamanSiswaController@addToCart')->name('peminjamansiswas.addToCart');
    Route::post('peminjamansiswa/save-cart', 'PeminjamanSiswaController@saveCartToPeminjaman')->name('peminjamansiswas.saveCartToPeminjaman');
    Route::get('peminjamansiswas/struk/{Nisn}', 'PeminjamanSiswaController@StrukBukti')->name('peminjamansiswas.bukti');
    Route::get('cetak_buktipdff/{Nisn}/{Tanggal}', 'PeminjamanSiswaController@CetakBukti')->name('cetak_bukti.pdf');
    Route::get('/getSiswaData/{nisn}', 'PeminjamanSiswaController@getSiswaData')->name('getSiswaData');
});

    Route::group(['middleware' => ['admin']], function () {
    Route::get('peminjamansiswas/cetak', 'PeminjamanSiswaController@CetakSiswaForm')->name('peminjamansiswas.cetak');
    Route::get('/cetak-bln/{from}/{to}', 'PeminjamanSiswaController@CetakSiswaPerbulan')->name('cetak-bln');
});  
    
    

//greeting
Route::get('register', 'UserController@register')->name('register');
Route::post('/greeting', 'UserController@greeting')->name('greeting');

//semua Auth
Auth::routes();



// ... Rute-rute admin yang sudah Anda tambahkan sebelumnya


Auth::routes();
