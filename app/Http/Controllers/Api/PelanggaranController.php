<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class PelanggaranController extends Controller
{
    public function index() {
        $pelanggaran = Pelanggaran::all();

        return response()->json($pelanggaran);
    }

    public function tambah(Request $request)
    {
       $pel = new Pelanggaran();
       $pel->pelanggaran = $request->pelanggaran;
       $pel->poin = $request->poin;
       $pel->save();
        
       return response()->json("Data Berhasil Ditambahkan");
    }

    public function edit($id, Request $request)
    {
        $editPel = Pelanggaran::find($id);
        $editPel->pelanggaran = $request->pelanggaran;
        $editPel->poin = $request->poin;
        $editPel->update();

        return response()->json("Data Berhasil Diupdate");
    }

    public function hapus($id)
    {
        Pelanggaran::find($id)->delete();

        return response()->json("Data Berhasil Dihapus");
    }
}
