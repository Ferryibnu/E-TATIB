<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use \App\Models\Siswa;
use App\Models\Poin;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Riwayat;

class PoinController extends Controller
{
    public function index()
    {
        $siswaPoin = Poin::all();
        $pelanggaran = Pelanggaran::all();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggar = Poin::distinct('siswa_id')->count(); //untuk badge menu pelanggar
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu riwayatPelanggaran

        $poinTotal = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
                    ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                    ->select("siswa_id", "nama", "nisn", "pelanggaran_id", "pelanggaran", DB::raw('COUNT(pelanggaran_id) as total'))
                    ->having('total', '>=', 3)
                    ->groupBy('siswa_id')
                    ->groupBy('nama')
                    ->groupBy('nisn')
                    ->groupBy('pelanggaran')
                    ->groupBy('pelanggaran_id')
                    ->orderBy('total')
                    ->get();

        // dd($poinTotal);
        $resetAwal = Carbon::createFromFormat('m-d H:i:s', '10-17 14:12:00')->format('m-d H:i:s');
        $resetEnd = Carbon::createFromFormat('m-d H:i:s', '10-17 14:12:02')->format('m-d H:i:s');
        $today = Date('m-d H:i:s');
        if($today >= $resetAwal && $today <= $resetEnd){
            Poin::truncate();
        }
        return view('poin.index', [
            'siswaPoin' => $siswaPoin,
            'poinTotal' => $poinTotal,
            'pelanggaran' => $pelanggaran,
            'total_siswa' => $total_siswa,
            'total_pelanggar' => $total_pelanggar,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }
    
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'siswa_id' => '',
            'nisn' => '',
            'pelanggaran_id' => '',
            'pencatat' => '',
        ]);
        
        $getNRP = Siswa::where('nisn', $request->nisn)->first();
        // dd($getNRP->id);
       
        if($getNRP){

            $addPoin = new Poin;
            $addPoin->siswa_id = $getNRP->id;
            $addPoin->pelanggaran_id = $request->pelanggaran_id;
            $addPoin->pencatat = $request->pencatat;
            $addPoin->save();

            Alert::success('Sukses Tambah', 'Data Berhasil Ditambahkan');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menambahkan', 'NISN yang Anda Masukkan Salah!!!');
            return redirect()->back();
        }
        
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'pelanggaran_id' => '',
            'pencatat' => '',
        ]);
        $editPoin = Poin::find($id);
        $editPoin->pelanggaran_id = $request->pelanggaran_id;
        $editPoin->pencatat = $request->pencatat;
        $editPoin->update();

        Alert::success('Edit Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
        Poin::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
    
    public function reset()
    {
        $riwayat = Poin::first();
        if(isset($riwayat)) {
            Poin::query()->each(function ($oldRecord) {
                $newRecord = $oldRecord->replicate();
                $newRecord->setTable('riwayat');
                $newRecord->tgl_pelanggaran = $oldRecord->created_at;
                $newRecord->save();
    
                $oldRecord->delete();
            });
    
            Alert::success('Hapus Sukses', 'Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::error('Hapus Gagal', 'Data Pelanggaran Kosong!!!');
            return redirect()->back();
        }
    }
    
}
