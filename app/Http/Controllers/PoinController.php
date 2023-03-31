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
use Illuminate\Pagination\Paginator;

class PoinController extends Controller
{
    public function index(Request $request)
    {
        if($request->tgl == 'all') {
            $siswaPoin = Poin::paginate(10);
            $date = null;
        } elseif($request->tgl == null) {
            $siswaPoin = Poin::whereDate('created_at', date('Y-m-d'))->paginate(10);
            $date = date('d-m-Y');
            $page = null;
        } else {
            $siswaPoin = Poin::whereDate('created_at', $request->tgl)->paginate(10);
            $date = date('d-m-Y', strtotime($request->tgl));
            $page = null;
        }
        $pelanggaran = Pelanggaran::all();
        $url = url()->full();
        $siswaPoin->setPath($url);
        
        return view('poin.index', [
            'siswaPoin' => $siswaPoin,
            // 'poinTotal' => $poinTotal,
            'pelanggaran' => $pelanggaran,
            'date' => $date,
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
            
            //WHATSAPP API
            if($jumlah->total <= 56 ) {
                //Jika skor pelanggaran kurang dari 56 poin (tindak lanjut pelanggaran kategori ringan) maka tidak akan dikirim peringatan via WA.
            } else {
                $br = "\n\n"; //membuat new lines.

                //deadline 1 minggu
                $tgl = date_modify($addPoin1->created_at, "+ 7 days");
                $tenggat = date('d-m-Y', strtotime($tgl));

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                'target' => $getNRP->no_telp, //ini no telp dari ortu siswa
                'message' => 'Assalamulaikum wr.wb. Kami dari *TATIB SMK Negeri 1 Surabaya* menginformasikan bahwa: ' . $br . 'Siswa bernama ' . '*'.$getNRP->nama. '*' . ' dari kelas ' . '*' . $getNRP->kelas->kelas . '*' . ' telah melakukan pelanggaran tata tertib sehingga mendapatkan tindak lanjut '. '*' . $addPoin1->catatan . '*' .' dengan total skor pelanggaran: ' . '*' . $jumlah->total . ' poin*.' . $br . 'Mohon untuk segera memenuhi panggilan TATIB sampai dengan tanggal ' . $tenggat . $br . 'Terimakasih atas perhatiannya. Wassalamualaikum wr.wb.',
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: EBLcVu1Ug3fPwaa4y!dq' //ini Key dari Whatsapp API fonnte.com
                ),
                ));
                
                $response = curl_exec($curl);

                curl_close($curl);
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
        $editPoin->created_at = $request->tgl;
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
        $tambah = "000" . $request->rfid;
        // $getFields = Siswa::where('nisn',$request->nisn)->first();
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('rfid', $tambah)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }

    public function autoRFID2(Request $request)
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
