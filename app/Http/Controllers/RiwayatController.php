<?php

namespace App\Http\Controllers;
use App\Models\Riwayat;
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

    public function reset()
    {
        foreach (Riwayat::all() as $e) { 
            $e->delete();
        }
        Alert::success('Hapus Sukses', 'Semua Data berhasil dihapus');
        return redirect()->back();
    }
}
