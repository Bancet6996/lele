<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\Lelang;
use App\RiwayatLelang;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function indexAdmin(){
        $data['masyarakat'] = User::where('level', 'masyarakat')->count();
        $data['pendapatan'] = Lelang::where('status', 'ditutup')->sum('harga_akhir');
        $data['dibuka'] = Lelang::where('status', 'dibuka')->count();
        $data['barang'] = Barang::count();
        $data['riwayat'] = RiwayatLelang::select('barang.gambar_barang', 'barang.nama_barang', 'barang.harga_awal', 'users.name as nama_penawar', 'riwayat_lelang.nominal', 'barang.id')->join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->join('users', 'riwayat_lelang.id_user', '=', 'users.id')->where('lelang.status', 'dibuka')->orderBy('riwayat_lelang.id', 'desc')->get();
        $data['cek_riwayat'] = RiwayatLelang::select('barang.gambar_barang', 'barang.nama_barang', 'barang.harga_awal', 'users.name as nama_penawar', 'riwayat_lelang.nominal', 'barang.id')->join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->join('users', 'riwayat_lelang.id_user', '=', 'users.id')->where('lelang.status', 'dibuka')->orderBy('riwayat_lelang.id', 'desc')->count();
        $data['jam'] = date("H");
        return view('admin/index/index', $data);
    }

    public function indexUser(){
        $data['lelang'] = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('status', 'dibuka')->orderBy('lelang.id', 'desc')->get();
        $data['kategori'] = Kategori::orderBy('nama_kategori', 'asc')->get();
        $data['cek_lelang'] = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('status', 'dibuka')->count();
        return view('user/index/index', $data);
    }
}
