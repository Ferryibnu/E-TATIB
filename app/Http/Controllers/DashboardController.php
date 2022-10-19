<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Poin;
use App\Models\Riwayat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $today = Date('m');
        
        $total_siswa = Siswa::all()->count();
        $total_pelanggar = Poin::distinct('siswa_id')->count();
        $riwayatPelanggaran = Riwayat::all()->count();
        $total_pelanggaran = Poin::all()->count();
        $cowok = Siswa::where('jns_kelamin', 'L')->count();
        $cewek = Siswa::where('jns_kelamin', 'P')->count();


        $jan = Carbon::create('january')->format('m');
        $feb = Carbon::create('february')->format('m');
        $mar = Carbon::create('march')->format('m');
        $apr = Carbon::create('april')->format('m');
        $may = Carbon::create('may')->format('m');
        $june = Carbon::create('june')->format('m');
        $july = Carbon::create('july')->format('m');
        $aug = Carbon::create('august')->format('m');
        $sep = Carbon::create('september')->format('m');
        $oct = Carbon::create('october')->format('m');
        $nov = Carbon::create('november')->format('m');
        $dec = Carbon::create('december')->format('m');

        
        // if($today >= $july && $today <= $dec) {
        //         dd('bnr');
        // } else {
        //         dd('slh');
        // }

        //Kategori Ringan
        $ringan_jan = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $jan)
                ->count();
        $ringan_feb = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $feb)
                ->count();
        $ringan_mar = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $mar)
                ->count();
        $ringan_apr = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $apr)
                ->count();
        $ringan_may = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $may)
                ->count();
        $ringan_june = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $june)
                ->count();
        $ringan_july = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $july)
                ->count();
        $ringan_aug = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $aug)
                ->count();
        $ringan_sep = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $sep)
                ->count();
        $ringan_oct = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $oct)
                ->count();
        $ringan_nov = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $nov)
                ->count();
        $ringan_dec = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
                ->where('pelanggaran.kategori', 1)
                ->whereMonth('poin.created_at', '=', $dec)
                ->count();
                // dd($ringan_oct);
        if(Auth::user()->level == 'admin') {

                return view('poin.beranda', [
                    'total_siswa' => $total_siswa,
                    'total_pelanggar' => $total_pelanggar,
                    'total_pelanggaran' => $total_pelanggaran,
                    'riwayatPelanggaran' => $riwayatPelanggaran,
                    'cowok' => $cowok,
                    'cewek' => $cewek,
                    'july' => $july,
                    'today' => $today,
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
                ]);
        } else {
                return view('frontend.index');
        }
    }
}
