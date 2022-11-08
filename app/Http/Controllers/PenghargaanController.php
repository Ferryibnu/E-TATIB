<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghargaan;
use RealRashid\SweetAlert\Facades\Alert;

class PenghargaanController extends Controller
{
    public function index() {
        $penghargaan = Penghargaan::all();

        return view('data_master.penghargaan', [
            'penghargaan' => $penghargaan,
        ]);
    }

    public function tambah(Request $request)
    {
       $peng = new penghargaan();
       $peng->kriteria = $request->kriteria;
       $peng->poin = $request->poin;
       $peng->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $editPeng = penghargaan::find($id);
        $editPeng->kriteria = $request->kriteria;
        $editPeng->poin = $request->poin;
        $editPeng->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        penghargaan::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
