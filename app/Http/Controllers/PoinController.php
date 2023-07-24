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
        $awal_bulan = date('Y-m-01');
        $hari_ini = date('Y-m-d'); 
        $tambah = $stop_date = date('Y-m-d', strtotime($hari_ini . ' +1 day'));
        // dd($request->tgl);
        if($request->tgl == 'all') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->paginate(10);
            $date = null;
        } else if ($request->tgl_awal == '' && $request->tgl_akhir == '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$awal_bulan, $tambah])->paginate(10);
            $date = date('d M Y', strtotime($awal_bulan)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
            $page = null;
        } else if($request->tgl_awal != '' && $request->tgl_akhir == '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$request->tgl_awal, $tambah])->paginate(10);
            $date = date('d M Y', strtotime($request->tgl_awal)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
            $page = null;
        } else if($request->tgl_awal != '' && $request->tgl_akhir != '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->paginate(10);
            $date = date('d M Y', strtotime($request->tgl_awal)) . ' s/d ' . date('d M Y', strtotime($request->tgl_akhir));
            $page = null;
        } else {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$hari_ini, $tambah])->paginate(10);
            $date = date('d M Y', strtotime($hari_ini)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
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
            'awal_bulan' => $awal_bulan,
            'hari_ini' => $hari_ini,
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
                $br = "\n\n"; // membuat new lines.

                // Deadline 1 minggu
                $tgl = date_modify($addPoin1->created_at, "+ 7 days");
                $tenggat = date('d-m-Y', strtotime($tgl));

                $curl = curl_init();

                // First target
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
                        'target' => $getNRP->no_telp, // ini no telp dari ortu siswa
                        'message' => 'Assalamulaikum wr.wb. Kami dari *TATIB SMK Negeri 1 Surabaya* menginformasikan bahwa: ' . $br . 'Siswa bernama ' . '*' . $getNRP->nama . '*' . ' dari kelas ' . '*' . $getNRP->kelas->kelas . '*' . ' telah melakukan pelanggaran tata tertib sehingga mendapatkan tindak lanjut ' . '*' . $addPoin1->catatan . '*' . ' dengan total skor pelanggaran: ' . '*' . $jumlah->total . ' poin*.' . $br . 'Mohon untuk segera memenuhi panggilan TATIB sampai dengan tanggal ' . $tenggat . $br . 'Terimakasih atas perhatiannya. Wassalamualaikum wr.wb.',
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: EBLcVu1Ug3fPwaa4y!dq' // ini Key dari Whatsapp API fonnte.com
                    ),
                ));

                $response1 = curl_exec($curl); // eksekusi

                // Second target
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
                        'target' => '081259536877', // Second target number
                        // 'target' => '081993973552', // Second target number
                        'message' => 'Assalamulaikum wr.wb. Kami dari *TATIB SMK Negeri 1 Surabaya* menginformasikan bahwa: ' . $br . 'Siswa bernama ' . '*' . $getNRP->nama . '*' . ' dari kelas ' . '*' . $getNRP->kelas->kelas . '*' . ' telah melakukan pelanggaran tata tertib sehingga mendapatkan tindak lanjut ' . '*' . $addPoin1->catatan . '*' . ' dengan total skor pelanggaran: ' . '*' . $jumlah->total . ' poin*.' . $br . 'Mohon untuk segera memenuhi panggilan TATIB sampai dengan tanggal ' . $tenggat . $br . 'Terimakasih atas perhatiannya. Wassalamualaikum wr.wb.',
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: EBLcVu1Ug3fPwaa4y!dq' // ini Key dari Whatsapp API fonnte.com
                    ),
                ));

                $response2 = curl_exec($curl); // eksekusi

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
