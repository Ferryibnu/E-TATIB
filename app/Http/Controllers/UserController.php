<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('level','admin')->get();

        return view('user.index', [
            'user' => $user
        ]);
    }

    public function tambah(Request $request)
    {
        $tambahUser = new User();
        $tambahUser->name = $request->name;
        $tambahUser->email = $request->email;
        $tambahUser->password = Hash::make($request->password);
        $tambahUser->level = 'admin';
        $tambahUser->save();

        Alert::success('Sukses Tambah', 'User baru berhasil ditambahkan');
        return redirect()->back();
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        User::find($id)->delete();
        
        Alert::success('Sukses Hapus', 'User berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect()->back();
    }
}