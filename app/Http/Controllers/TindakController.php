<?php

namespace App\Http\Controllers;

use App\Models\Tindak;
use App\Models\Poin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TindakController extends Controller
{
    public function index() {
        $tindak = Tindak::all();

         //Badge
         $badge_ringan = Poin::where('catatan', 'Panggilan Wali Kelas')->count();
         $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
         $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
         $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
         $total_pelanggaran = Poin::all()->count();

        return view('data_master.tindak', [
            'tindak' => $tindak,
            //badge
            'badge_ringan' => $badge_ringan,
            'badge_sedang' => $badge_sedang,
            'badge_berat' => $badge_berat,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
        ]);
    }

    public function tambah(Request $request)
    {
        // $this->validate($request, [
        //     'pelanggaran' => '',
        // ]);

       $tindak = new Tindak();
       $tindak->tindak_lanjut = $request->tindak_lanjut;
       $tindak->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        // $this->validate($request, [
        //     'pelanggaran_id' => '',
        //     'pencatat' => '',
        // ]);
        
        $editTindak = Tindak::find($id);
        $editTindak->tindak_lanjut = $request->tindak_lanjut;
        $editTindak->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Tindak::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
