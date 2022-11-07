<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Poin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelanggaranController extends Controller
{
    public function index() {
        $pelanggaran = Pelanggaran::all();

         //Badge
         $badge_ringan = Poin::whereBetween('catatan', ['Panggilan Wali Kelas ke-1', 'Panggilan Wali Kelas ke-2'])->count();
         $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
         $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
         $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
         $total_pelanggaran = Poin::all()->count();

        return view('data_master.pelanggaran', [
            'pelanggaran' => $pelanggaran,
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

       $pel = new Pelanggaran();
       $pel->pelanggaran = $request->pelanggaran;
       $pel->poin = $request->poin;
       $pel->save();
        
       Alert::success('Sukses Menambahkan', 'Data Berhasil Ditambahkan');
       return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        // $this->validate($request, [
        //     'pelanggaran_id' => '',
        //     'pencatat' => '',
        // ]);
        
        $editPel = Pelanggaran::find($id);
        $editPel->pelanggaran = $request->pelanggaran;
        $editPel->poin = $request->poin;
        $editPel->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Pelanggaran::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
