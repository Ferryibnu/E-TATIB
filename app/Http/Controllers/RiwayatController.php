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
        //Badge
        $badge_ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

        // dd($RiwayatTotal);

        return view('riwayat.index', [
            'riwayat' => $riwayat,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
        ]);
    }

    public function hapus($id)
    {
        Riwayat::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
