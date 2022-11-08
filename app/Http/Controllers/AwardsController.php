<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AwardsController extends Controller
{
    public function index() {
        $siswa_awards = Siswa::whereNotNull('penghargaan_id')->get();
        $awards = Penghargaan::all();


        return view('siswa.penghargaan', [
            'siswa_awards' => $siswa_awards,
            'awards' => $awards,
        ]);
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nisn' => '',
            'penghargaan_id' => '',
        ]);
        
        $getNRP = Siswa::where('nisn', $request->nisn)->first();
       
        if($getNRP){
            $addPoin = Siswa::find($getNRP->id);
            $addPoin->penghargaan_id = $request->penghargaan_id;
            $addPoin->update();

            Alert::success('Sukses Tambah', 'Data Berhasil Ditambahkan');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menambahkan', 'NISN yang Anda Masukkan Salah!!!');
            return redirect()->back();
        }
    }

    public function edit($id, Request $request)
    {
        $editPeng = siswa::find($id);
        $editPeng->penghargaan_id = $request->penghargaan_id;
        $editPeng->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $awards = Siswa::find($id);
        $awards->penghargaan_id = null;
        $awards->update();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

}
