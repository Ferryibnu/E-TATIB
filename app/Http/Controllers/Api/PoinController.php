<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use \App\Models\Siswa;
use App\Models\Poin;
use App\Models\Tindak;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PoinController extends Controller
{
    public function index()
    {
        $poin = Poin::with(['siswa.kelas', 'pelanggaran'])->get();
        
        // Format the poin data and calculate total points
        $formattedPoin = $poin->map(function ($dataPoin) {
            // Find the siswa_id based on siswa_nisn
            $siswaId = $dataPoin->siswa->id;
            
            // Calculate total points for the siswa_id
            $total_poin = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->select(DB::raw('SUM(pelanggaran.poin) as total'))
                ->where('siswa_id', '=', $siswaId)
                ->value('total');
            
            return [
                'siswa_nisn' => $dataPoin->siswa->nisn,
                'siswa_nama' => $dataPoin->siswa->nama,
                'siswa_kelas' => $dataPoin->siswa->kelas->kelas,
                'pelanggaran' => $dataPoin->pelanggaran->pelanggaran,
                'poin_pelanggaran' => $dataPoin->pelanggaran->poin,
                'pencatat' => $dataPoin->pencatat,
                'kategori' => $dataPoin->kategori,
                'tanggal_pelanggaran' => \Carbon\Carbon::parse($dataPoin->created_at)->format('d M Y H:i:s'),
                'total_poin' => $total_poin,
            ];
        });

        // Return the formatted poin data
        return response()->json($formattedPoin);
        
    }
    
    public function tambah(Request $request)
    {
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
            return "Data Sukses Ditambahkan";
        } else {
            return "GAGAL!!!, NISN yang dimasukkan salah!!";
        }
        
    }

    public function edit($id, Request $request)
    {
        $editPoin = Poin::find($id);
        $editPoin->pelanggaran_id = $request->pelanggaran_id;
        $editPoin->pencatat = $request->pencatat;
        $editPoin->update();

        return "Data Sukses Diedit";
    }

    public function hapus($id)
    {
        Poin::find($id)->delete();

        return "Data Sukses Dihapus";
    }
}
