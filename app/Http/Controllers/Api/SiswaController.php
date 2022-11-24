<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \App\Models\Siswa;
use App\Models\User;
use App\Http\Controllers\Controller;


class SiswaController extends Controller
{
    public function index()
    {
        return Siswa::all();
    }
    
    public function tambah(Request $request)
    {
        $jikaAda = Siswa::where('nisn', $request->nisn)->first();

        if($jikaAda){
            return "Gagal Menambahkan !!!, Siswa Telah Terdaftar";
        } else {
            $addUser = new User;
            $addUser->name = $request->nama;
            $addUser->email = $request->nisn;
            $addUser->level = "user";
            $addUser->password = bcrypt("TATIB123");
            $addUser->save();

            $addSiswa = new Siswa;
            $addSiswa->users_id = $addUser->id;
            $addSiswa->nisn = $request->nisn;
            $addSiswa->nama = $request->nama;
            $addSiswa->rfid = $request->rfid;
            $addSiswa->agama = $request->agama;
            $addSiswa->no_telp = $request->no_telp;
            $addSiswa->kelas_id = $request->kelas;
            $addSiswa->tempat_lahir = $request->tempat_lahir;
            $addSiswa->tgl_lahir = $request->tgl_lahir;
            $addSiswa->jns_kelamin = $request->jns_kelamin;
            $addSiswa->save();

            return "Siswa Berhasil Ditambahkan";
        }
    }

    public function edit($id, Request $request)
    {
        $editSiswa = Siswa::find($id);
        $editSiswa->nama = $request->nama;
        $editSiswa->rfid = $request->rfid;
        $editSiswa->kelas_id = $request->kelas;
        $editSiswa->tempat_lahir = $request->tempat_lahir;
        $editSiswa->tgl_lahir = $request->tgl_lahir;
        $editSiswa->no_telp = $request->no_telp;
        $editSiswa->update();

        return "User Berhasil Diedit";
    }

    public function hapus($id)
    {
        $siswa = Siswa::find($id);
        User::find($siswa->users_id)->delete();
        $siswa->delete();

        return "User Berhasil Dihapus";
    }
}
