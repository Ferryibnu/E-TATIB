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

        
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu riwayatPelanggaran

        return view('penanganan.ringan', [
            'ringan' => $ringan,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }

    public function sedang(){
        $sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->get();
        
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu riwayatPelanggaran

        return view('penanganan.sedang', [
            'sedang' => $sedang,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }

    public function berat(){
        $berat = Poin::whereBetween('catatan', ['Skorsing', 'Dikeluarkan dari Sekolah'])->get();

        
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu riwayatPelanggaran

        return view('penanganan.berat', [
            'berat' => $berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
            'riwayatPelanggaran' => $riwayatPelanggaran,
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
