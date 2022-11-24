<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Penghargaan;
use App\Http\Controllers\Controller;

class PenghargaanController extends Controller
{
    public function index() {
        $penghargaan = Penghargaan::all();

        return response()->json($penghargaan);
    }

    public function tambah(Request $request)
    {
       $peng = new penghargaan();
       $peng->kriteria = $request->kriteria;
       $peng->poin = $request->poin;
       $peng->save();
        
       return response()->json("Data Berhasil Ditambahkan");
    }

    public function edit($id, Request $request)
    {
        $editPeng = penghargaan::find($id);
        $editPeng->kriteria = $request->kriteria;
        $editPeng->poin = $request->poin;
        $editPeng->update();

        return response()->json("Data Berhasil Diedit");
    }

    public function hapus($id)
    {
        penghargaan::find($id)->delete();

        return response()->json("Data Berhasil Dihapus");
    }
}
