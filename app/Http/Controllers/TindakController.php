<?php

namespace App\Http\Controllers;

use App\Models\Tindak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TindakController extends Controller
{
    public function index() {
        $tindak = Tindak::all();

        return view('data_master.tindak', [
            'tindak' => $tindak,
        ]);
    }

    public function tambah(Request $request)
    {
       $tindak = new Tindak();
       $tindak->tindak_lanjut = $request->tindak_lanjut;
       $tindak->range = $request->range;
       $tindak->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $editTindak = Tindak::find($id);
        $editTindak->tindak_lanjut = $request->tindak_lanjut;
        $editTindak->range = $request->range;
        $editTindak->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Tindak::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
