<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Poin;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_pelanggar = Poin::distinct('siswa_id')->count();
        $pelanggaran = Poin::all()->count();
        $prestasi = Siswa::whereNotNull('penghargaan_id')->count();

        //Kategori Ringan
        $ringan_jan = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('january')->format('m'))
                ->count();
        $ringan_feb = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('february')->format('m'))
                ->count();
        $ringan_mar = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('march')->format('m'))
                ->count();
        $ringan_apr = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('april')->format('m'))
                ->count();
        $ringan_may = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('may')->format('m'))
                ->count();
        $ringan_june = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('june')->format('m'))
                ->count();
        $ringan_july = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=',  Carbon::create('july')->format('m'))
                ->count();
        $ringan_aug = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('august')->format('m'))
                ->count();
        $ringan_sep = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('september')->format('m'))
                ->count();
        $ringan_oct = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('october')->format('m'))
                ->count();
        $ringan_nov = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('november')->format('m'))
                ->count();
        $ringan_dec = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', Carbon::create('december')->format('m'))
                ->count();

        //Kategori Ringan
        $sedang_jan = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('january')->format('m'))
                ->count();
        $sedang_feb = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('february')->format('m'))
                ->count();
        $sedang_mar = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('march')->format('m'))
                ->count();
        $sedang_apr = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('april')->format('m'))
                ->count();
        $sedang_may = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('may')->format('m'))
                ->count();
        $sedang_june = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('june')->format('m'))
                ->count();
        $sedang_july = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=',  Carbon::create('july')->format('m'))
                ->count();
        $sedang_aug = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('august')->format('m'))
                ->count();
        $sedang_sep = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('september')->format('m'))
                ->count();
        $sedang_oct = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('october')->format('m'))
                ->count();
        $sedang_nov = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('november')->format('m'))
                ->count();
        $sedang_dec = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', Carbon::create('december')->format('m'))
                ->count();

        // Kategori Berat
        $berat_jan = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('january')->format('m'))
                ->count();
        $berat_feb = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('february')->format('m'))
                ->count();
        $berat_mar = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('march')->format('m'))
                ->count();
        $berat_apr = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('april')->format('m'))
                ->count();
        $berat_may = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('may')->format('m'))
                ->count();
        $berat_june = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('june')->format('m'))
                ->count();
        $berat_july = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=',  Carbon::create('july')->format('m'))
                ->count();
        $berat_aug = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('august')->format('m'))
                ->count();
        $berat_sep = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('september')->format('m'))
                ->count();
        $berat_oct = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('october')->format('m'))
                ->count();
        $berat_nov = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('november')->format('m'))
                ->count();
        $berat_dec = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', Carbon::create('december')->format('m'))
                ->count();

        //Chart Kelas
        $kelas10 = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('grade', '10');
                });
        })->count();
        $kelas11 = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('grade', '11');
                });
        })->count();
        $kelas12 = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('grade', '12');
                });
        })->count();

        //Chart Jurusan
        $tkj = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'TKJ');
                });
        })->count();
        $rpl = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'RPL');
                });
        })->count();
        $ph = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'PH');
                });
        })->count();
        $dkv = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'DKV');
                });
        })->count();
        $mm = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'MM');
                });
        })->count();
        $pspt = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'PSPT');
                });
        })->count();
        $ak = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'AK');
                });
        })->count();
        $akl = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'AKL');
                });
        })->count();
        $bd = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'BD');
                });
        })->count();
        $bdp = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'BDP');
                });
        })->count();
        $mp = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', 'MP');
                });
        })->count();
        $otkp = Poin::whereHas('siswa', function ($query) {
                $query->whereHas('kelas', function ($query1) {
                        $query1->where('jurusan', '11 OTKP');
                });
        })->count();

        //Chart Kategori
        $sikap = Poin::whereHas('pelanggaran', function ($query) {
                $query->where('golongan', 'Sikap Perilaku');
        })->count();

        $kerajinan = Poin::whereHas('pelanggaran', function ($query) {
                $query->where('golongan', 'Kerajinan');
        })->count();

        $kerapian = Poin::whereHas('pelanggaran', function ($query) {
                $query->where('golongan', 'Kerapian');
        })->count();

        return view('poin.beranda', [
        'total_pelanggar' => $total_pelanggar,
        'pelanggaran' => $pelanggaran,
        'prestasi' => $prestasi,
        //ringan
        'ringan_jan' => $ringan_jan,
        'ringan_feb' => $ringan_feb,
        'ringan_mar' => $ringan_mar,
        'ringan_apr' => $ringan_apr,
        'ringan_may' => $ringan_may,
        'ringan_june' => $ringan_june,
        'ringan_july' => $ringan_july,
        'ringan_aug' => $ringan_aug,
        'ringan_sep' => $ringan_sep,
        'ringan_oct' => $ringan_oct,
        'ringan_nov' => $ringan_nov,
        'ringan_dec' => $ringan_dec,
        //sedang
        'sedang_jan' => $sedang_jan,
        'sedang_feb' => $sedang_feb,
        'sedang_mar' => $sedang_mar,
        'sedang_apr' => $sedang_apr,
        'sedang_may' => $sedang_may,
        'sedang_june' => $sedang_june,
        'sedang_july' => $sedang_july,
        'sedang_aug' => $sedang_aug,
        'sedang_sep' => $sedang_sep,
        'sedang_oct' => $sedang_oct,
        'sedang_nov' => $sedang_nov,
        'sedang_dec' => $sedang_dec,
        //berat
        'berat_jan' => $berat_jan,
        'berat_feb' => $berat_feb,
        'berat_mar' => $berat_mar,
        'berat_apr' => $berat_apr,
        'berat_may' => $berat_may,
        'berat_june' => $berat_june,
        'berat_july' => $berat_july,
        'berat_aug' => $berat_aug,
        'berat_sep' => $berat_sep,
        'berat_oct' => $berat_oct,
        'berat_nov' => $berat_nov,
        'berat_dec' => $berat_dec,
        //chart Kategori
        'sikap' => $sikap,
        'kerajinan' => $kerajinan,
        'kerapian' => $kerapian,
        //chart Kelas
        'kelas10' => $kelas10,
        'kelas11' => $kelas11,
        'kelas12' => $kelas12,
        //CHART JURUSAN
        'tkj' => $tkj,
        'rpl' => $rpl,
        'ph' => $ph,
        'dkv' => $dkv,
        'mm' => $mm,
        'pspt' => $pspt,
        'ak' => $ak,
        'akl' => $akl,
        'bd' => $bd,
        'bdp' => $bdp,
        'mp' => $mp,
        'otkp' => $otkp,
        ]);
   }

   public function dashboardSiswa()
    {
        if(Auth::user() && Auth::user()->level == "user"){
                $idUser = Auth::user()->id;
                $siswa_withID = Siswa::where('users_id', $idUser)->first();
                $siswaPoin = Poin::where('siswa_id', $siswa_withID->id)->get();
                $totalPoin = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->select(DB::raw('SUM(pelanggaran.poin) as total'))
                ->orderBy('total')
                ->where('siswa_id', '=', $siswa_withID->id)
                ->first();
                
                if(isset($siswa_withID->penghargaan->poin)) {
                        $total = $totalPoin->total-$siswa_withID->penghargaan->poin;
                        // dd($total);
                } else {
                        $total = $totalPoin->total;
                }
                //Membuat QR Code
                $qrCode = QrCode::size(250)->generate($siswa_withID->nisn);
                return view('frontend.index', [
                        'siswa_withID' => $siswa_withID,
                        'total' => $total,
                        'siswaPoin' => $siswaPoin,
                        'qrCode' => $qrCode,
        ]);
        } else {
                return view('frontend.index');
        }
        
    }
    public function fotoProfil(Request $request)
    {
        $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images',$filename,'public');
        $user = User::find(Auth::id());
        $user->image = $filename;
        $user->update();

        Alert::success('Upload Sukses', 'Foto berhasil ditambahkan');
        return redirect()->back();
    }
}
