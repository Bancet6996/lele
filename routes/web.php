<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', 'IndexController@indexUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lelangan/{id}', 'BarangController@detail');
Route::get('/get-barang', 'BarangController@getBarang');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', 'IndexController@indexAdmin');
    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/tambah', 'BarangController@tambah');
    Route::post('/barang', 'BarangController@kirim');
    Route::get('/barang/ubah/{id}', 'BarangController@ubah');
    Route::patch('/barang/{id}', 'BarangController@simpan');
    Route::delete('/barang/{id}/hapus', 'BarangController@hapus');
    Route::get('/hasil', 'BarangController@hasil');
    Route::post('/lelangan/{id}/jawab', 'DiskusiController@jawab');
    Route::patch('/lelangan/{id}/jawab/ubah', 'DiskusiController@ubahJawaban');
    Route::delete('/lelangan/{id}/jawab/hapus', 'DiskusiController@hapusJawaban');
});

Route::middleware(['auth', 'petugas'])->group(function(){
    Route::get('/lelang', 'LelangController@index');
    Route::post('/barang/buka/{id}', 'LelangController@buka');
    Route::patch('/barang/tutup/{id}', 'LelangController@tutup');
    Route::delete('/barang/batal/{id}', 'LelangController@batal');
    Route::get('/kategori', 'KategoriController@index');
    Route::post('/kategori/tambah', 'KategoriController@kirim');
    Route::post('/kategori/{id}/ubah', 'KategoriController@ubah');
    Route::delete('/kategori/{id}/hapus', 'KategoriController@hapus');
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin/tambah', 'AdminController@tambah');
    Route::patch('/admin/{id}/ubah', 'AdminController@ubah');
    Route::delete('/admin/{id}/hapus', 'AdminController@hapus');
});

Route::middleware(['auth', 'masyarakat'])->group(function(){
    Route::post('/lelangan/{id}/tawar', 'LelangController@tawar');
    Route::delete('/lelangan/{id}/batal', 'LelangController@batalNawar');
    Route::get('/tawaran', 'LelangController@daftarTawaran');
    Route::post('/lelangan/{id}/tanya', 'DiskusiController@tanya');
    Route::patch('/lelangan/{id}/tanya/ubah', 'DiskusiController@ubahTanya');
    Route::delete('/lelangan/{id}/tanya/hapus', 'DiskusiController@hapusTanya');
});
