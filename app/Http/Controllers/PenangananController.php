<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Siswa;
use App\Models\Riwayat;
use RealRashid\SweetAlert\Facades\Alert;

class PenangananController extends Controller
{
    public function ringan(){
        $ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->get();

        //Badge
        $badge_ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::whereBetween('catatan', ['Skorsing', 'Dikeluarkan dari Sekolah'])->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.ringan', [
            'ringan' => $ringan,
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
        
        //Badge
        $badge_ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::whereBetween('catatan', ['Skorsing', 'Dikeluarkan dari Sekolah'])->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.sedang', [
            'sedang' => $sedang,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
        ]);
    }

    public function berat(){
        $berat = Poin::whereBetween('catatan', ['Skorsing', 'Dikeluarkan dari Sekolah'])->get();

        //Badge
        $badge_ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::whereBetween('catatan', ['Skorsing', 'Dikeluarkan dari Sekolah'])->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        return view('penanganan.berat', [
            'berat' => $berat,
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
        if($poin->status == 'Belum Selesai'){
            $poin->status = 'Selesai';
            $poin->update();

            Alert::success('Sukses', 'Status Pelanggaran Berhasil Diupdate');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Status Pelanggaran Sudah Berstatus Sukses');
            return redirect()->back();
        }
        
    }
}
