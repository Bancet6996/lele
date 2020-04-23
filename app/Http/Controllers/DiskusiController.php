<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Lelang;
use App\Pertanyaan;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function tanya(Request $request, $id){
        if (Lelang::where('status', 'ditutup')->where('id_barang', $id)->first()) {
            return redirect()->back();
        } else {
            Pertanyaan::create([
                'pertanyaan' => $request->pertanyaan,
                'id_barang' => $id,
                'id_user' => auth()->user()->id,
            ]);
            return redirect()->back()->with('message', 'Berhasil mengirim pertanyaan, tunggu jawabannya ya !');
        }
    }

    public function ubahTanya(Request $request, $id){
        $pertanyaan = Pertanyaan::find($id);
        if (Lelang::where('status', 'ditutup')->where('id_barang', $pertanyaan->id_barang)->first()) {
            return redirect()->back();
        } else {
            if ($pertanyaan->id_user != auth()->user()->id) {
                return redirect()->back();
            } else {
                $pertanyaan->pertanyaan = $request->pertanyaan;
                $pertanyaan->save();
                return redirect()->back()->with('message', 'Berhasil mengubah pertanyaan');
            }
        }
    }

    public function hapusTanya($id){ 
        $pertanyaan = Pertanyaan::find($id);
        if (Lelang::where('status', 'ditutup')->where('id_barang', $pertanyaan->id_barang)->first()) {
            return redirect()->back();
        } else {
            if ($pertanyaan->id_user != auth()->user()->id) {
                return redirect()->back();
            } else {
                Pertanyaan::where('id', $id)->delete();
                return redirect()->back()->with('message', 'Berhasil menghapus pertanyaan');
            }
        }
    }

    public function jawab(Request $request, $id){
        $pertanyaan = Pertanyaan::find($id);
        if (Lelang::where('status', 'ditutup')->where('id_barang', $pertanyaan->id_barang)->first()) {
            return redirect()->back();
        } else {
            Jawaban::create([
                'jawaban' => $request->jawaban,
                'id_pertanyaan' => $id,
                'id_barang' => $pertanyaan->id_barang,
                'id_user' => auth()->user()->id,
            ]);

            return redirect()->back()->with('message', 'Berhasil menjawab pertanyaan');
        }
    }

    public function ubahJawaban(Request $request, $id){
        $jawaban = Jawaban::find($id);
        if (Lelang::where('status', 'ditutup')->where('id_barang', $jawaban->id_barang)->first()) {
            return redirect()->back();
        } else {
            $jawaban->jawaban = $request->jawaban;
            $jawaban->id_user = auth()->user()->id;
            $jawaban->save();

            return redirect()->back()->with('message', 'Berhasil mengubah jawaban');
        }
    }

    public function hapusJawaban($id){
        $jawaban = Jawaban::find($id);
        if (Lelang::where('status', 'ditutup')->where('id_barang', $jawaban->id_barang)->first()) {
            return redirect()->back();
        } else {
            Jawaban::where('id', $id)->delete();

            return redirect()->back()->with('message', 'Berhasil menghapus jawaban');
        }
    }

    public static function jawaban($string){
        return Jawaban::select('users.name', 'jawaban.created_at', 'jawaban.jawaban', 'jawaban.id')->join('users', 'jawaban.id_user', '=', 'users.id')->where('id_pertanyaan', $string)->first();
    }

    public static function cekJawaban($string){
        return Jawaban::join('users', 'jawaban.id_user', '=', 'users.id')->where('id_pertanyaan', $string)->count();
    }
}
