<?php

namespace App\Http\Controllers;
use App\Models\Riwayat;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Poin;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();
        $pelanggaran = Pelanggaran::all();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggar = Poin::distinct('siswa_id')->count(); //untuk badge menu pelanggar
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu riwayatPelanggaran

        // dd($RiwayatTotal);

        return view('riwayat.index', [
            'riwayat' => $riwayat,
            'pelanggaran' => $pelanggaran,
            'total_siswa' => $total_siswa,
            'total_pelanggar' => $total_pelanggar,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }
}
