<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenangananController extends Controller
{
    public function ringan(){
        $siswa = Siswa::all();
        $ringan = Poin::whereBetween('catatan', ['Panggilan Wali Kelas ke-1', 'Panggilan Wali Kelas ke-2'])->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        return view('penanganan.ringan', [
            'siswa' => $siswa,
            'ringan' => $ringan,
            'totalPoin' => $totalPoin,
        ]);
    }

    public function sedang(){
        $siswa = Siswa::all();
        $sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        return view('penanganan.sedang', [
            'siswa' => $siswa,
            'sedang' => $sedang,
            'totalPoin' => $totalPoin,
        ]);
    }

    public function berat(){
        $siswa = Siswa::all();
        $berat = Poin::where('catatan', '=', 'Skorsing')->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        return view('penanganan.berat', [
            'siswa' => $siswa,
            'berat' => $berat,
            'totalPoin' => $totalPoin,
        ]);
    }

    public function edit($id){
        $poin = Poin::find($id);
        $poin->status = 'Selesai';
        $poin->update();

        Alert::success('Sukses', 'Status Pelanggaran Berhasil Diupdate');
        return redirect()->back();
    }
}
