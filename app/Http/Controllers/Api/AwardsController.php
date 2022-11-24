<?php

namespace App\Http\Controllers\Api;

use App\Models\Penghargaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AwardsController extends Controller
{
    public function index() {
        $siswa_awards = Siswa::whereNotNull('penghargaan_id')->get();
        return response()->json($siswa_awards);
    }

    public function tambah(Request $request)
    {
        $getNRP = Siswa::where('nisn', $request->nisn)->first();
       
        if($getNRP){
            $addPoin = Siswa::find($getNRP->id);
            $addPoin->penghargaan_id = $request->penghargaan_id;
            $addPoin->update();

            return response()->json("Data Berhasil Ditambahkan");
        } else {
            return response()->json("Gagal Menambahkan, NISN yang dimasukkan Salah!!!");
        }
    }

    public function edit($id, Request $request)
    {
        $editPeng = siswa::find($id);
        $editPeng->penghargaan_id = $request->penghargaan_id;
        $editPeng->update();
        return response()->json("Data Berhasil Diedit");
    }

    public function hapus($id)
    {
        $awards = Siswa::find($id);
        $awards->penghargaan_id = null;
        $awards->update();

        return response()->json("Data Berhasil Dihapus");
    }

}
