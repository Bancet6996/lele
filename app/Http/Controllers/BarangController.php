<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Diskusi;
use App\Gambar;
use App\Kategori;
use App\Lelang;
use App\RiwayatLelang;
use Illuminate\Http\Request;
use App\Http\Controllers\LelangController;
use App\Jawaban;
use App\Pertanyaan;

class BarangController extends Controller
{
    public function index(){
        $data['barang'] = Barang::select('barang.id', 'barang.gambar_barang', 'barang.nama_barang', 'barang.harga_awal', 'users.name')->join('users', 'barang.id_user', 'users.id')->orderBy('barang.id', 'desc')->get();
        $data['judul'] = 'Daftar Barang';
        $data['sub'] = 'Barang';
        return view('admin/table/list', $data);
    }
    
    public function detail($id){
        if (LelangController::sudahDitutup($id)) {
            $data['lelang'] = Lelang::select('barang.gambar_barang', 'barang.nama_barang', 'barang.definisi_barang', 'barang.deskripsi_barang', 'barang.harga_awal', 'users.name', 'barang.id')->join('barang', 'lelang.id_barang', '=', 'barang.id')->join('users', 'lelang.id_user', '=', 'users.id')->where('id_barang', $id)->first();
        } else {
            $data['lelang'] = Lelang::select('barang.gambar_barang', 'barang.nama_barang', 'barang.definisi_barang', 'barang.deskripsi_barang', 'barang.harga_awal', 'barang.id')->join('barang', 'lelang.id_barang', '=', 'barang.id')->where('id_barang', $id)->first();
        }
        // $data['barang'] = Barang::where('id', $id)->first();
        $data['terbesar'] = RiwayatLelang::where('id_barang', $id)->max('nominal');
        $data['cek_lelang'] = Lelang::join('barang', 'lelang.id_barang', '=', 'barang.id')->where('id_barang', $id)->count();
        // $data['gambar'] = Gambar::where('id_barang', $id)->get();
        $data['riwayat'] = RiwayatLelang::select('users.name', 'riwayat_lelang.nominal', 'riwayat_lelang.created_at')->join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->join('users', 'riwayat_lelang.id_user', '=', 'users.id')->where('riwayat_lelang.id_barang', $id)->orderBy('riwayat_lelang.id', 'desc')->get();
        $data['cek_riwayat'] = RiwayatLelang::join('barang', 'riwayat_lelang.id_barang', '=', 'barang.id')->join('users', 'riwayat_lelang.id_user', '=', 'users.id')->where('riwayat_lelang.id_barang', $id)->count();
        $data['pertanyaan'] = Pertanyaan::select('users.name', 'pertanyaan.pertanyaan', 'pertanyaan.created_at', 'pertanyaan.id', 'pertanyaan.id_user')->join('users', 'pertanyaan.id_user', '=', 'users.id')->where('id_barang', $id)->get();
        if ($data['cek_lelang'] != 0) {
            return view('user/goods/detail', $data);
        } else {
            return redirect()->back();
        }        
    }

    public function tambah(){
        $data['kategori'] = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin/table/form', $data);
    }

    public function ubah($id){
        $data['barang'] = Barang::find($id);
        // $data['gambar'] = Gambar::where('id_barang', $id)->get();
        $data['kategori'] = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin/table/form', $data);
    }

    public function hasil(){
        $data['lelang'] = Lelang::select('barang.id', 'barang.nama_barang', 'barang.harga_awal', 'lelang.harga_akhir', 'users.name', 'lelang.updated_at')->join('barang', 'lelang.id_barang', '=', 'barang.id')->join('users', 'lelang.id_user', '=', 'users.id')->where('status', 'ditutup')->orderBy('id', 'desc')->get();
        $data['judul'] = 'Hasil Pelelangan';
        $data['sub'] = 'Hasil';
        return view('admin/hasil/list', $data);
    }

    public function kirim(Request $request){
        $rule = [
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'kategori' => 'required',
            'deskripsi_barang' => 'required',
            'gambar_barang' => 'required',
        ];
        $this->validate($request, $rule);

        $gambar = $request->file('gambar_barang');
        $nama_baru = auth()->user()->name. '-'. rand(). '.'. $gambar->getClientOriginalExtension();
        $gambar->move(public_path('gambar_barang'), $nama_baru);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_awal' => $request->harga_awal,
            'definisi_barang' => $request->definisi_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'gambar_barang' => $nama_baru,
            'id_user' => auth()->user()->id,
            'kategori' => $request->kategori,
        ]);
            
            
        return redirect('/barang')->with('message', 'Barang berhasil ditambahkan');
    }

    public function simpan(Request $request, $id){
        $rule = [
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'kategori' => 'required',
            'deskripsi_barang' => 'required',
        ];
        $this->validate($request, $rule);

        $gambar = $request->file('gambar_barang');
        
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_awal = $request->harga_awal;
        $barang->definisi_barang = $request->definisi_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        if ($gambar != null) {
            $nama_baru = auth()->user()->name. '-' .rand().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar_barang'), $nama_baru);
            $barang->gambar_barang = $nama_baru;
        }        
        $barang->kategori = $request->kategori;
        $barang->save();

        return redirect('/barang')->with('message', 'Barang berhasil diubah');
    }

    public function hapus($id){
        $lelang = Lelang::where('status', 'ditutup')->where('id_barang', $id)->first();
        if($lelang){
            return redirect()->back();
        }
        else{
            Barang::where('id', $id)->delete();
            return redirect()->back()->with('message', 'Berhasil menghapus barang');
        }
    }

    public function getBarang(){
        $barang = Barang::get();
        return json_encode($barang);
    }
}
