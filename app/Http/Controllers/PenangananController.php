<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenangananController extends Controller
{
    public function ringan(){
        $ringan = Poin::where('catatan', 'Panggilan Wali Kelas')->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        //Badge
        $badge_ringan = Poin::where('catatan', 'Panggilan Wali Kelas')->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.ringan', [
            'ringan' => $ringan,
            'totalPoin' => $totalPoin,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
        ]);
    }

    public function sedang(){
        $sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();
        
        //Badge
        $badge_ringan = Poin::where('catatan', 'Panggilan Wali Kelas')->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.sedang', [
            'sedang' => $sedang,
            'totalPoin' => $totalPoin,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
        ]);
    }

    public function berat(){
        $berat = Poin::where('catatan', '=', 'Skorsing')->get();
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        // dd($berat);
        //Badge
        $badge_ringan = Poin::where('catatan', 'Panggilan Wali Kelas')->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.berat', [
            'berat' => $berat,
            'totalPoin' => $totalPoin,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
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
