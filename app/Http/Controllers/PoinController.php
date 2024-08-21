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
    public function getSiswaList(Request $request)
    {
        $search = $request->input('q');
        $siswaList = Siswa::with('kelas')
            ->where('nisn', 'LIKE', "%{$search}%")
            ->orWhere('nama', 'LIKE', "%{$search}%")
            ->orWhereHas('kelas', function($query) use ($search) {
                $query->where('kelas', 'LIKE', "%{$search}%");
            })
            ->get()
            ->map(function ($siswa) {
                return [
                    'id' => $siswa->id,
                    'text' => $siswa->nisn . ' - ' . $siswa->nama . ' - ' . $siswa->kelas->kelas,
                ];
            });

        return response()->json($siswaList);
    }


    public function index(Request $request)
    {
        $awal_bulan = date('Y-m-01');
        $hari_ini = date('Y-m-d'); 
        $tambah = $stop_date = date('Y-m-d', strtotime($hari_ini . ' +1 day'));
        // dd($request->tgl);
        if($request->tgl == 'all') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->get();
            $date = null;
        } else if ($request->tgl_awal == '' && $request->tgl_akhir == '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$awal_bulan, $tambah])->get();
            $date = date('d M Y', strtotime($awal_bulan)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
            $page = null;
        } else if($request->tgl_awal != '' && $request->tgl_akhir == '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$request->tgl_awal, $tambah])->get();
            $date = date('d M Y', strtotime($request->tgl_awal)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
            $page = null;
        } else if($request->tgl_awal != '' && $request->tgl_akhir != '') {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();
            $date = date('d M Y', strtotime($request->tgl_awal)) . ' s/d ' . date('d M Y', strtotime($request->tgl_akhir));
            $page = null;
        } else {
            $siswaPoin = Poin::orderBy('id', 'DESC')->whereBetween('created_at', [$hari_ini, $tambah])->get();
            $date = date('d M Y', strtotime($hari_ini)) . ' s/d ' . date('d M Y', strtotime($hari_ini));
            $page = null;
        }        

        // $siswaList = Siswa::select('id', 'nisn', 'nama', 'rfid')->get();
        
        $siswaList = Siswa::all();
        $pelanggaran = Pelanggaran::all();
        // $url = url()->full();
        // $siswaPoin->setPath($url);
        
        return view('poin.index', [
            'siswaPoin' => $siswaPoin,
            'siswaList' => $siswaList,
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
            'pelanggaran_id' => '',
            'pencatat' => '',
            'tanggal_pelanggaran' => '',
        ]);
        $getNRP = Siswa::where('id', $request->siswa_id)->first();

        // dd($request->siswa_id);
       
        if($getNRP){
            $addPoin = new Poin;
            $addPoin->siswa_id = $getNRP->id;
            $addPoin->pelanggaran_id = $request->pelanggaran_id;
            $addPoin->pencatat = Auth::user()->name;
            $addPoin->created_at = $request->tanggal_pelanggaran;
            $addPoin->save();

            $jumlah = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
            ->select(DB::raw('SUM(pelanggaran.poin) as total'))
            ->orderBy('total')
            ->where('siswa_id', '=', $getNRP->id)
            ->first();

            $addPoin1 = Poin::find($addPoin->id);
            $pelanggaran = Pelanggaran::find($addPoin->pelanggaran_id);
            $nama_pelanggaran = $pelanggaran->pelanggaran;
            $poin_pelanggaran = $pelanggaran->poin;

            $created_at = $addPoin1->created_at;
            $tanggal = \Carbon\Carbon::parse($created_at)->format('d M Y');

            // Get the day of the week in Indonesian
            $hari = \Carbon\Carbon::parse($created_at)->locale('id')->dayName;

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

            // data whatsapp
            $data = [
                "10 MP 1" => [

                    "kelas" => "10 MP 1",
                    "name" => "Susilo Tondo Widodo",
                    "phone1" => "085645510050",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "10 MP 2" => [
                    "kelas" => "10 MP 2",
                    "name" => "Lukas Agustinus, S.Pd",
                    "phone1" => "081333363303",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "10 MP 3" => [
                    "kelas" => "10 MP 3",
                    "name" => "Charlis Anindya H.",
                    "phone1" => "085645801549",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "10 MP 4" => [
                    "kelas" => "10 MP 4",
                    "name" => "Tressyana Diraswati N., S.Pd",
                    "phone1" => "085334263789",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "10 AK 1" => [
                    "kelas" => "10 AK 1",
                    "name" => "Duratul Aliyah, S.Pd",
                    "phone1" => "081252029174",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "10 AK 2" => [
                    "kelas" => "10 AK 2",
                    "name" => "Dwina N W",
                    "phone1" => "081233525250",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "10 AK 3" => [
                    "kelas" => "10 AK 3",
                    "name" => "Farida Muzayyanah, S.Ag",
                    "phone1" => "081313807375",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "10 AK 4" => [
                    "kelas" => "10 AK 4",
                    "name" => "Barid Nazih El Fikri, S.Pd",
                    "phone1" => "082293774343",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "10 ML 1" => [
                    "kelas" => "10 ML 1",
                    "name" => "Reny Dwi Susanti, S.Pd",
                    "phone1" => "081335083090",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "10 ML 2" => [
                    "kelas" => "10 ML 2",
                    "name" => "Amirul Fatah S.ag, M.PdI",
                    "phone1" => "082132331505",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "10 BD 1" => [
                    "kelas" => "10 BD 1",
                    "name" => "Dra. Istikomah, MM",
                    "phone1" => "081357801770",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "10 BD 2" => [
                    "kelas" => "10 BD 2",
                    "name" => "Ana Puspitasari, S.Pd",
                    "phone1" => "085785767993",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "10 DKV 1" => [
                    "kelas" => "10 DKV 1",
                    "name" => "Wuryaningsih",
                    "phone1" => "085646440652",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "10 DKV 2" => [
                    "kelas" => "10 DKV 2",
                    "name" => "Hera Herdiyanto spd",
                    "phone1" => "082333037261",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "10 DKV 3" => [
                    "kelas" => "10 DKV 3",
                    "name" => "Yunitaningrum DC",
                    "phone1" => "081259536877",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "10 RPL 1" => [
                    "kelas" => "10 RPL 1",
                    "name" => "Wannugroho pasma",
                    "phone1" => "081333079900",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "10 RPL 2" => [
                    "kelas" => "10 RPL 2",
                    "name" => "Drs. Joko Prastowo",
                    "phone1" => "081234281007",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "10 TKJ 1" => [
                    "kelas" => "10 TKJ 1",
                    "name" => "Muslik, S.Pd",
                    "phone1" => "081357497779",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "10 TKJ 2" => [
                    "kelas" => "10 TKJ 2",
                    "name" => "Hermanto, S.Pd.I",
                    "phone1" => "085649426634",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "10 PSPT 1" => [
                    "kelas" => "10 PSPT 1",
                    "name" => "Teguh Pribadi, ST",
                    "phone1" => "081234582217",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "10 PSPT 2" => [
                    "kelas" => "10 PSPT 2",
                    "name" => "Nur Aminatus Solikhah,SE",
                    "phone1" => "081654915776",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "10 PH 1" => [
                    "kelas" => "10 PH 1",
                    "name" => "Nur Chalimatusa'dijah, M.PdI",
                    "phone1" => "081332154215",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "10 PH 2" => [
                    "kelas" => "10 PH 2",
                    "name" => "Bagus Priyatno, S.St.Par",
                    "phone1" => "082139444737",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "10 PH 3" => [
                    "kelas" => "10 PH 3",
                    "name" => "Nur Wahidah, S.Pd",
                    "phone1" => "087852507376",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "11 MP 1" => [
                    "kelas" => "11 MP 1",
                    "name" => "Rona Ani Widjaya, S.Pd",
                    "phone1" => "081357907100",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "11 MP 2" => [
                    "kelas" => "11 MP 2",
                    "name" => "Endang Dwi Purwanti, S.Pd, MM",
                    "phone1" => "085851147490",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "11 MP 3" => [
                    "kelas" => "11 MP 3",
                    "name" => "Ema Frinentia Liberta",
                    "phone1" => "087794457797",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "11 MP 4" => [
                    "kelas" => "11 MP 4",
                    "name" => "Aminatus Syaadah",
                    "phone1" => "081803109576",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "11 AK 1" => [
                    "kelas" => "11 AK 1",
                    "name" => "Endar Fajar Ramadhan, S.Pd",
                    "phone1" => "08563224228",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "11 AK 2" => [
                    "kelas" => "11 AK 2",
                    "name" => "Sari Okta Rahmalina, S.Pd",
                    "phone1" => "08115002780",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "11 AK 3" => [
                    "kelas" => "11 AK 3",
                    "name" => "Dra. Sumiatun",
                    "phone1" => "081615411048",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "11 AK 4" => [
                    "kelas" => "11 AK 4",
                    "name" => "Endang Poerwaningsih, S.Pd",
                    "phone1" => "089528923018",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "11 ML 1" => [
                    "kelas" => "11 ML 1",
                    "name" => "Raniah Bajri",
                    "phone1" => "082257036761",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "11 ML 2" => [
                    "kelas" => "11 ML 2",
                    "name" => "Putri Islamiyah, S.Pd",
                    "phone1" => "089616075346",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "11 BD 1" => [
                    "kelas" => "11 BD 1",
                    "name" => "Dra. Sakti Harini, MM",
                    "phone1" => "085156771551",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "11 BD 2" => [
                    "kelas" => "11 BD 2",
                    "name" => "Tutik Asmiasih,S.Pd.I",
                    "phone1" => "081803170633",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "11 DKV 1" => [
                    "kelas" => "11 DKV 1",
                    "name" => "Eko Septiawan",
                    "phone1" => "082245492027",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "11 DKV 2" => [
                    "kelas" => "11 DKV 2",
                    "name" => "Aminatul Muhlisyah",
                    "phone1" => "081938325603",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "11 DKV 3" => [
                    "kelas" => "11 DKV 3",
                    "name" => "Andina Witaning Sari",
                    "phone1" => "082139128629",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "11 RPL 1" => [
                    "kelas" => "11 RPL 1",
                    "name" => "Gigieh Roessajanto",
                    "phone1" => "081331520095",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "11 RPL 2" => [
                    "kelas" => "11 RPL 2",
                    "name" => "Winarsono, M.Pd.",
                    "phone1" => "081330110860",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "11 TKJ 1" => [
                    "kelas" => "11 TKJ 1",
                    "name" => "Ita Kurniawati",
                    "phone1" => "085746189095",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "11 TKJ 2" => [
                    "kelas" => "11 TKJ 2",
                    "name" => "Nanik Sulastri",
                    "phone1" => "81235186280",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "11 PSPT 1" => [
                    "kelas" => "11 PSPT 1",
                    "name" => "Drs. Rahmat Iskandar",
                    "phone1" => "082335603494",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "11 PSPT 2" => [
                    "kelas" => "11 PSPT 2",
                    "name" => "Retno Ariyani, S.Pd.MM",
                    "phone1" => "083830462947",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "11 PSPT 3" => [
                    "kelas" => "11 PSPT 3",
                    "name" => "Mochammad Arsyad",
                    "phone1" => "085733554077",
                    "contact1" => "Jefri Mahardika",
                    "phone2" => "085733801213"
                ],
                "11 PH 1" => [
                    "kelas" => "11 PH 1",
                    "name" => "Suningtyas Harti, S.Pd",
                    "phone1" => "081553121004",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "11 PH 2" => [
                    "kelas" => "11 PH 2",
                    "name" => "Ayani",
                    "phone1" => "081234573676",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "12 MP 1" => [
                    "kelas" => "12 MP 1",
                    "name" => "Dra. Dwi Sudarwati",
                    "phone1" => "081331622811",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "12 MP 2" => [
                    "kelas" => "12 MP 2",
                    "name" => "Dra. Sri Peni Wulansari",
                    "phone1" => "08123208422",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "12 MP 3" => [
                    "kelas" => "12 MP 3",
                    "name" => "Tri Wulaning P., M.Pd, MM",
                    "phone1" => "08155159811",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "12 MP 4" => [
                    "kelas" => "12 MP 4",
                    "name" => "Dra. Sulastri, MM",
                    "phone1" => "085730000765",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "12 MP 5" => [
                    "kelas" => "12 MP 5",
                    "name" => "Dra. Ari Astuti",
                    "phone1" => "081330170835",
                    "contact1" => "Windy",
                    "phone2" => "082234399296"
                ],
                "12 AK 1" => [
                    "kelas" => "12 AK 1",
                    "name" => "Dra. Lilik Alfiah, M.M., M.Pd.",
                    "phone1" => "085163599224",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "12 AK 2" => [
                    "kelas" => "12 AK 2",
                    "name" => "Setyo Budiwati, MM, M.Pd",
                    "phone1" => "081703450518",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "12 AK 3" => [
                    "kelas" => "12 AK 3",
                    "name" => "Prestiwati, S.Pd",
                    "phone1" => "081235066861",
                    "contact1" => "Romy Setyo Wibowo",
                    "phone2" => "085331226070"
                ],
                "12 AK 4" => [
                    "kelas" => "12 AK 4",
                    "name" => "Pudji Prihastuti",
                    "phone1" => "081231463226",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "12 AK 5" => [
                    "kelas" => "12 AK 5",
                    "name" => "Dra. Sri Minarni",
                    "phone1" => "081615476099",
                    "contact1" => "Siswantiningrum",
                    "phone2" => "081938575344"
                ],
                "12 BD 1" => [
                    "kelas" => "12 BD 1",
                    "name" => "Siti Romelah, S.Pd, MM",
                    "phone1" => "085648125909",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "12 BD 2" => [
                    "kelas" => "12 BD 2",
                    "name" => "Novita Larasati",
                    "phone1" => "089666557089",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "12 DKV 1" => [
                    "kelas" => "12 DKV 1",
                    "name" => "Yose Auliandi, S.ST",
                    "phone1" => "083840030399",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "12 DKV 2" => [
                    "kelas" => "12 DKV 2",
                    "name" => "Asmu'in",
                    "phone1" => "089531359081",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "12 DKV 3" => [
                    "kelas" => "12 DKV 3",
                    "name" => "Rohib Al Faisal Sutopo, S.T",
                    "phone1" => "081335850642",
                    "contact1" => "Ana Puspita",
                    "phone2" => "085785767993"
                ],
                "12 RPL 1" => [
                    "kelas" => "12 RPL 1",
                    "name" => "Jefri Mahardika Efendi, S.Pd",
                    "phone1" => "085733801213",
                    "contact1" => "Jefri M",
                    "phone2" => "085733801213"
                ],
                "12 RPL 2" => [
                    "kelas" => "12 RPL 2",
                    "name" => "Siswantiningrum",
                    "phone1" => "081938575344",
                    "contact1" => "Siswatiningrum",
                    "phone2" => "081938575344"
                ],
                "12 TKJ 1" => [
                    "kelas" => "12 TKJ 1",
                    "name" => "Yektiono, S.ST, M.Pd",
                    "phone1" => "085850990147",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "12 TKJ 2" => [
                    "kelas" => "12 TKJ 2",
                    "name" => "Cheby Marse, S.Pd",
                    "phone1" => "081233520545",
                    "contact1" => "Cheby M",
                    "phone2" => "081233520545"
                ],
                "12 PSPT 1" => [
                    "kelas" => "12 PSPT 1",
                    "name" => "Khoirun nisa'",
                    "phone1" => "085850830004",
                    "contact1" => "Jefri M",
                    "phone2" => "085733801213"
                ],
                "12 PSPT 2" => [
                    "kelas" => "12 PSPT 2",
                    "name" => "Dra. Titik Widhayanti, S.ST",
                    "phone1" => "085175164074",
                    "contact1" => "Jefri M",
                    "phone2" => "085733801213"
                ],
                "12 PSPT 3" => [
                    "kelas" => "12 PSPT 3",
                    "name" => "Choirun Selamet",
                    "phone1" => "085785965321",
                    "contact1" => "Jefri M",
                    "phone2" => "085733801213"
                ],
                "12 PH 1" => [
                    "kelas" => "12 PH 1",
                    "name" => "Ekowati Sulistyorini, S.Pd, MM",
                    "phone1" => "081332011429",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ],
                "12 PH 2" => [
                    "kelas" => "12 PH 2",
                    "name" => "Titin Soepriatin, S.Pd, MM",
                    "phone1" => "081229669705",
                    "contact1" => "Ollyvia F",
                    "phone2" => "082331844984"
                ]
            ];
            
            $kelas_key = $getNRP->kelas->kelas;
            if (isset($data[$kelas_key])) {
                $result = $data[$kelas_key];
                // Output the phone1 and phone2
                $hp_walas =  $result['phone1'];
                $hp_bk =  $result['phone2'];

                $br = "\n\n"; // membuat new lines.

                $msg_wa = 'Assalamulaikum wr.wb. Kami dari *TATIB SMK Negeri 1 Surabaya* menginformasikan bahwa: ' 
                        . $br . 'Pada hari '.$hari.' tanggal '.$tanggal.'. Siswa bernama ' . '*' . $getNRP->nama . '*' . ' dari kelas ' . '*' . $getNRP->kelas->kelas . '*' . 
                        ' telah melakukan pelanggaran ' . '*' . $nama_pelanggaran . '*' . 
                        '  dengan  skor pelanggaran:  ' . '*' . $poin_pelanggaran . ' poin*.'.$br.'Sehingga akumulasi point pelanggaran menjadi ' . '*' . $jumlah->total . ' poin*.' . $br
                        ;
                //WHATSAPP API\
                if($jumlah->total >= 30 &&  $jumlah->total < 50) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan untuk pembinaan menemui wali kelas.*' . $br;
                } else if($jumlah->total >= 50 &&  $jumlah->total < 100) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan orang tua (pertama) untuk menemui wali kelas.*' . $br;
                } else if($jumlah->total >= 100 &&  $jumlah->total < 150) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan orang tua (kedua) untuk  menemui walas dan di dampingi BK.*' . $br;
                } else if($jumlah->total >= 150 &&  $jumlah->total < 200) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan orang tua (ketiga) untuk menemui walas di dampingi BK dan kaprog.*' . $br;
                } else if($jumlah->total >= 200 &&  $jumlah->total < 250) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan orang tua (keempat) untuk menenmui walas di dampingi BK, kaprog, waka kesiswaan.*' . $br;
                } else if($jumlah->total >= 250) {
                    $msg_wa = $msg_wa . '*Mohon untuk siswa bersangkutan segera memenuhi panggilan orang tua (kelima) untuk menemui walas dan di dampingi BK, kaprog, waka kesiswaan, dan kepsek.*' . $br;
                }
                
                $msg_wa = $msg_wa . 'Terimakasih atas kerjasamanya.';
                $curl = curl_init();
    
                // First target
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 50,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $getNRP->no_telp, // ini no telp dari ortu siswa
                        'message' => $msg_wa,
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: EBLcVu1Ug3fPwaa4y!dq' // ini Key dari Whatsapp API fonnte.com
                    ),
                ));

                $response1 = curl_exec($curl); // eksekusi
    
                // Walas target
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 50,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $hp_walas, // ini no telp dari ortu siswa
                        'message' => $msg_wa,
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: EBLcVu1Ug3fPwaa4y!dq' // ini Key dari Whatsapp API fonnte.com
                    ),
                ));

                $response2 = curl_exec($curl); // eksekusi
    
                // BK target
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 50,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $hp_bk, // ini no telp dari ortu siswa
                        'message' => $msg_wa,
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
    
    public function autofillNull(Request $request)
    {
        $tambah =  str_pad($request->nisn, 10, '0', STR_PAD_LEFT);
        // $getFields = Siswa::where('nisn',$request->nisn)->first();
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('nisn', $tambah)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }

    public function autoRFID(Request $request)
    {
        $tambah = ltrim($request->rfid, '0');
        $getFields = Siswa::join('kelas', 'kelas.id', '=', 'kelas_id')
                    ->where('rfid', $tambah)
                    ->first();
        // dd($getFields);
        return response()->json($getFields);
    }
}
