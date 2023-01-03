<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use \App\Models\Siswa;
use App\Models\Poin;
use App\Models\Tindak;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PoinController extends Controller
{
    public function index()
    {
        $siswaPoin = Poin::all();
        $pelanggaran = Pelanggaran::all();
        
        return view('poin.index', [
            'siswaPoin' => $siswaPoin,
            // 'poinTotal' => $poinTotal,
            'pelanggaran' => $pelanggaran,
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
       
        if($getNRP){
            $addPoin = new Poin;
            $addPoin->siswa_id = $getNRP->id;
            $addPoin->pelanggaran_id = $request->pelanggaran_id;
            $addPoin->pencatat = Auth::user()->name;
            $addPoin->save();

            $jumlah = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
            ->select(DB::raw('SUM(pelanggaran.poin) as total'))
            ->orderBy('total')
            ->where('siswa_id', '=', $getNRP->id)
            ->first();

            $addPoin1 = Poin::find($addPoin->id);
            // dd($jumlah->total);
            if($jumlah->total  >= 10 && $jumlah->total <= 29) {
                $addPoin1->kategori = 'ringan';
                $addPoin1->update();

            } elseif($jumlah->total  >= 30 && $jumlah->total <= 35) {
                $tindak = Tindak::find(1);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();

            }elseif($jumlah->total >= 36 && $jumlah->total <= 55) {
                $tindak = Tindak::find(2);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();

            } elseif($jumlah->total >= 56 && $jumlah->total <= 75){
                $tindak = Tindak::find(3);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();

            } elseif($jumlah->total >= 76 && $jumlah->total <= 95){
                $tindak = Tindak::find(4);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();

            } elseif($jumlah->total >= 96 && $jumlah->total <= 149){
                $tindak = Tindak::find(5);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();
                
            } elseif($jumlah->total >= 150 && $jumlah->total <= 249){
                $tindak = Tindak::find(6);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();

            } else {
                $tindak = Tindak::find(7);
                $addPoin1->catatan = $tindak->tindak_lanjut;
                $addPoin1->status = 'Belum Selesai';
                $addPoin1->kategori = $tindak->kategori;
                $addPoin1->update();
            }
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
    public function autofill(Request $request)
    {
        $tambah = "00" . $request->nisn;
        // $getFields = Siswa::where('nisn',$request->nisn)->first();
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('nisn', $tambah)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }
    
    public function autofillNull(Request $request)
    {
        // $getFields = Siswa::where('nisn',$request->nisn)->first();
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('nisn', $request->nisn)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }

    public function autoRFID(Request $request)
    {
        $tambah = "00" . $request->rfid;
        // $getFields = Siswa::where('nisn',$request->nisn)->first();
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('rfid', $tambah)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }
}
