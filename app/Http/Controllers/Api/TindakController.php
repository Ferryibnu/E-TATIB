<?php

namespace App\Http\Controllers\Api;

use App\Models\Tindak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TindakController extends Controller
{
    public function index() {
        $tindak = Tindak::all();

        return response()->json($tindak);
    }

    public function tambah(Request $request)
    {
       $tindak = new Tindak();
       $tindak->tindak_lanjut = $request->tindak_lanjut;
       $tindak->range = $request->range;
       $tindak->save();
        
       return response()->json("Data Berhasil Ditambahkan");
    }

    public function edit($id, Request $request)
    {
        $editTindak = Tindak::find($id);
        $editTindak->tindak_lanjut = $request->tindak_lanjut;
        $editTindak->range = $request->range;
        $editTindak->update();

        return response()->json("Data Berhasil Diedit");
    }

    public function hapus($id)
    {
        Tindak::find($id)->delete();

        return response()->json("Data Berhasil Dihapus");
    }
}
