<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $data['user'] = User::where('level', 'admin')->get();
        $data['judul'] = 'Daftar Administrator';
        $data['sub'] = 'Admin';
        return view('admin/table/list', $data);
    }

    public function tambah(Request $request){
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rule);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_helper' => $request->password,
            'level' => 'admin',
        ]);

        return redirect()->back()->with('message', 'Berhasil menambahkan admin');
    }

    public function ubah(Request $request, $id){
        $rule = [
            'name' => 'required',
            'email' => 'required',
        ];
        $this->validate($request, $rule);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password === null) {
            # code...
        } else {
            $user->password = Hash::make($request->password);
            $user->password_helper = $request->password;
        }
        $user->save();
        return redirect()->back()->with('message', 'Berhasil mengubah data admin');
    }

    public function hapus($id){
        $status = User::where('id', $id)->delete();
        if($status){
            return redirect()->back()->with('message', 'Berhasil menghapus admin');
        }
        else{
            return redirect()->back();
        }      
    }
}
