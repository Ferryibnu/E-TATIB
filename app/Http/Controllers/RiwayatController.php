<?php

namespace App\Http\Controllers;
use App\Models\Riwayat;
use App\Models\Siswa;
use App\Models\Poin;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();

        return view('riwayat.index', [
            'riwayat' => $riwayat,
        ]);
    }

    public function hapus($id)
    {
        Riwayat::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
