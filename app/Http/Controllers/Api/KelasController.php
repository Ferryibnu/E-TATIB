<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index() {
        // return response()->json([Kelas::all()]);
        return Kelas::all();
    }

    public function tambah(Request $request)
    {
       $kelas = new Kelas();
       $kelas->kelas = $request->kelas;
       $kelas->jurusan = substr($request->kelas,3,-2);
       $kelas->grade = substr($request->kelas,0,2);
       $kelas->save();
        
       return "Data Kelas Berhasil Ditambahkan";
    }

    public function edit($id, Request $request)
    {
        $editkelas = Kelas::find($id);
        $editkelas->kelas = $request->kelas;
        $editkelas->jurusan = substr($request->kelas,3,-2);
        $editkelas->grade = substr($request->kelas,0,2);
        $editkelas->update();

        
       return "Data Kelas Berhasil Diubah";
    }

    public function hapus($id)
    {
        Kelas::find($id)->delete();

        
       return "Data Kelas Berhasil Dihapus";
    }
}
