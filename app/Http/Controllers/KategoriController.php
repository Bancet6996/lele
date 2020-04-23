<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $data['kategori'] = Kategori::orderBy('nama_kategori', 'asc')->get();
        $data['judul'] = 'Kategori Barang';
        $data['sub'] = 'Kategori';
        return view('admin/table/list', $data);
    }

    public function kirim(Request $request){
        $rule = [
            'nama_kategori' => 'required',
        ];
        $this->validate($request, $rule);
        
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('message', 'Tambah kategori berhasil');
    }

    public function ubah(Request $request, $id){
        $rule = [
            'nama_kategori' => 'required',
        ];
        $this->validate($request, $rule);

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->back()->with('message', 'Berhasil mengubah kategori');
    }

    public function hapus($id){
        $status = Kategori::where('id', $id)->delete();
        if($status){
            return redirect()->back()->with('message', 'Berhasil menghapus kategori');
        }
        else{
            return redirect()->back();
        }        
    }
}
