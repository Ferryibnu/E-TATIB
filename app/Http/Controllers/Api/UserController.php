<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return User::where('level','admin')->get();
    }

    public function tambah(Request $request)
    {
        $jikaAda = User::where('name', $request->name)->first();

        if($jikaAda){
            return "Gagal Menambahkan !!!, User Telah Terdaftar";
        } else {
            $tambahUser = new User();
            $tambahUser->name = $request->name;
            $tambahUser->email = $request->email;
            $tambahUser->password = Hash::make($request->password);
            $tambahUser->level = 'admin';
            $tambahUser->status = $request->status;
            $tambahUser->save();

            return "User Berhasil Ditambahkan";
        }
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        User::find($id)->delete();
        
        
        return "User Berhasil Dihapus";
    }
}