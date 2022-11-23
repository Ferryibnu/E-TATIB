<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::all();
        $kelas11 = Kelas::where('id', 13)->first()->kelas;
        $sub = substr($kelas11,-10,-2);
        // dd($sub);

        return view('data_master.kelas', [
            'kelas' => $kelas,
        ]);
    }

    public function tambah(Request $request)
    {
       $kelas = new Kelas();
       $kelas->kelas = $request->kelas;
       $kelas->jurusan = substr($request->kelas,-10,-2);
       $kelas->grade = substr($request->kelas,0,2);
       $kelas->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $editkelas = Kelas::find($id);
        $editkelas->kelas = $request->kelas;
        $editkelas->kelas = substr($request->kelas,-10,-2);
        $editkelas->grade = substr($request->kelas,0,2);
        $editkelas->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Kelas::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
