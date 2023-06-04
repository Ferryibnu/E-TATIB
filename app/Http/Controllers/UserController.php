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
        $jikaAda = User::where('name', $request->name)->first();

        if($jikaAda){
            Alert::error('Gagal Menambahkan', 'User Telah Terdaftar');
            return redirect()->back();
        } else {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
    
            $image_path = $request->file('image')->store('img', 'public_uploads');
            $tambahUser = new User();
            $tambahUser->name = $request->name;
            $tambahUser->email = $request->email;
            $tambahUser->password = Hash::make($request->password);
            $tambahUser->level = 'admin';
            $tambahUser->image = $image_path;
            $tambahUser->status = $request->status;
            $tambahUser->save();

            Alert::success('Sukses Tambah', 'User baru berhasil ditambahkan');
            return redirect()->back();
        }
    }
    
    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image')->store('img', 'public_uploads');

        $editUser = User::find($id);
        $editUser->name = $request->name;
        $editUser->image = $image_path;
        $editUser->status = $request->status;
        $editUser->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
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