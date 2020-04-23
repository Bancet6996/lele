<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Lelang;
use App\RiwayatLelang;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index(){
        $data['lelang'] = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('status', 'dibuka')->orderBy('lelang.id', 'desc')->get();
        $data['cek_lelang'] = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('status', 'dibuka')->count();
        $data['cek_barang'] = Barang::count();
        $data['judul'] = 'Daftar Pelelangan';
        $data['sub'] = 'Lelang';
        return view('admin/lelang/list', $data);
    }

    public function daftarTawaran(){
        $data['riwayat'] = RiwayatLelang::join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->where('riwayat_lelang.id_user', auth()->user()->id)->where('lelang.status', 'dibuka')->get();
        $data['riwayatt'] = RiwayatLelang::join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->where('riwayat_lelang.id_user', auth()->user()->id)->get();
        $data['cek_riwayat'] = RiwayatLelang::join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->where('riwayat_lelang.id_user', auth()->user()->id)->where('lelang.status', 'dibuka')->count();
        $data['cek_riwayatt'] = RiwayatLelang::join('lelang', 'riwayat_lelang.id_lelang', '=', 'lelang.id')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->where('riwayat_lelang.id_user', auth()->user()->id)->count();
        return view('user/goods/mylist', $data);
    }

    public function buka($id){
        $barang = Barang::find($id);
        $lelang = Lelang::where('id_barang', $id)->first();
        if ($lelang) {
            return redirect()->back()->with('message', $barang->nama_barang .' sudah dibuka');
        } else {
            Lelang::create([
                'status' => 'dibuka',
                'id_barang' => $barang->id,
            ]);
            return redirect()->back()->with('message', $barang->nama_barang .' telah dibuka untuk dilelang <a href="/lelang">Cek disini</a>');
        }
    }

    public function tutup($id){
        if ($this->sudahAda($id) === null) {
            return redirect()->back();
        } else {
            $lelang = Lelang::where('id_barang', $id)->first();
            $barang = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('id_barang', $id)->first();
            $akhir = RiwayatLelang::where('id_lelang', $lelang->id)->where('id_barang', $id)->max('nominal');
            $pemenang = RiwayatLelang::where('id_lelang', $lelang->id)->where('id_barang', $id)->where('nominal', $akhir)->first();

            $lelang->harga_akhir = $akhir;
            $lelang->status = 'ditutup';
            $lelang->id_user = $pemenang->id_user;
            $lelang->save();
            return redirect()->back()->with('message', $barang->nama_barang .' telah ditutup dari pelelangan');
        }
    }

    public function batal($id){
        if ($this->sudahAda($id)) {
            return redirect()->back();
        } else {
            $status = Lelang::where('id_barang', $id)->delete();
            if($status){
                return redirect()->back()->with('message', 'Berhasil membatalkan barang dari pelelangan');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function tawar(Request $request, $id){
        $lelang = Lelang::select('lelang.id')->join('barang', 'lelang.id_barang', '=', 'barang.id')->where('id_barang', $id)->where('status', 'dibuka')->first();
        $riwayat = RiwayatLelang::where('id_barang', $id)->max('nominal');
        if ($lelang === null || $lelang->harga_awal >= $request->nominal || $riwayat >= $request->nominal) {
            return redirect()->back();
        } else {
            RiwayatLelang::create([
                'nominal' => $request->nominal,
                'id_lelang' => $lelang->id,
                'id_barang' => $id,
                'id_user' => auth()->user()->id,
            ]);
            return redirect()->back()->with('message', 'Berhasil menawar dengan nominal Rp. ' .$request->nominal);
        }
    }

    public function batalNawar($id){
        $lelang = Lelang::where('status', 'ditutup')->where('id_barang', $id)->first();
        if ($lelang) {
            return redirect()->back();
        } else {
            RiwayatLelang::where('id_barang', $id)->where('id_user', auth()->user()->id)->delete();
            return redirect()->back()->with('message', 'Berhasil membatalkan penawaran');
        }
    }

    public static function sudahDibuka($string){
        return Lelang::where('id_barang', $string)->where('status', 'dibuka')->first();
    }

    public static function sudahDitutup($string){
        return Lelang::where('id_barang', $string)->where('status', 'ditutup')->first();
    }

    public static function tawaranTertinggi($string){
        return RiwayatLelang::where('id_barang', $string)->max('nominal');
    }

    public static function sudahAda($string){
        return RiwayatLelang::where('id_barang', $string)->first();
    }

    public static function sudahNawar($string, $string2){
        return RiwayatLelang::where('id_barang', $string)->where('id_user', $string2)->first();
    }

    public static function tawaran($string){
        return RiwayatLelang::where('id_barang', $string)->where('id_user', auth()->user()->id)->first();
    }

    public static function orangMenawar($string){
        return RiwayatLelang::where('id_barang', $string)->count();
    }

    public static function menang($string, $string2){
        return Lelang::where('status', 'ditutup')->where('id_user', $string)->where('id_barang', $string2)->first();
    }

    public static function kalah($string){
        return Lelang::where('status', 'ditutup')->where('id_barang', $string)->first();
    }
}
