<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelanggaranController extends Controller
{
    public function index() {
        $pelanggaran = Pelanggaran::all();

        return view('data_master.pelanggaran', [
            'pelanggaran' => $pelanggaran,
        ]);
    }

    public function tambah(Request $request)
    {
       $pel = new Pelanggaran();
       $pel->pelanggaran = $request->pelanggaran;
       $pel->poin = $request->poin;
       $pel->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $editPel = Pelanggaran::find($id);
        $editPel->pelanggaran = $request->pelanggaran;
        $editPel->poin = $request->poin;
        $editPel->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Pelanggaran::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
