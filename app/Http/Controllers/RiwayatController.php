<?php

namespace App\Http\Controllers;
use App\Models\Riwayat;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Poin;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();
        $pelanggaran = Pelanggaran::all();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggar = Poin::distinct('siswa_id')->count();
        $riwayatPelanggaran = Riwayat::all()->count();
        $total_pelanggaran = Poin::all()->count();

        // dd($RiwayatTotal);

        return view('riwayat.index', [
            'riwayat' => $riwayat,
            'pelanggaran' => $pelanggaran,
            'total_siswa' => $total_siswa,
            'total_pelanggar' => $total_pelanggar,
            'total_pelanggaran' => $total_pelanggaran,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }

    public function hapus($id)
    {
        Riwayat::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
