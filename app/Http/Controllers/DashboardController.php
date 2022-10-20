<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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

        //Kategori Ringan
        $ringan_jan = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $jan)
                ->count();
        $ringan_feb = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $feb)
                ->count();
        $ringan_mar = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $mar)
                ->count();
        $ringan_apr = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $apr)
                ->count();
        $ringan_may = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $may)
                ->count();
        $ringan_june = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $june)
                ->count();
        $ringan_july = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $july)
                ->count();
        $ringan_aug = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $aug)
                ->count();
        $ringan_sep = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $sep)
                ->count();
        $ringan_oct = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $oct)
                ->count();
        $ringan_nov = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $nov)
                ->count();
        $ringan_dec = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $dec)
                ->count();

        //Kategori Ringan
        $sedang_jan = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $jan)
                ->count();
        $sedang_feb = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $feb)
                ->count();
        $sedang_mar = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $mar)
                ->count();
        $sedang_apr = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $apr)
                ->count();
        $sedang_may = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $may)
                ->count();
        $sedang_june = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $june)
                ->count();
        $sedang_july = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $july)
                ->count();
        $sedang_aug = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $aug)
                ->count();
        $sedang_sep = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $sep)
                ->count();
        $sedang_oct = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $oct)
                ->count();
        $sedang_nov = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $nov)
                ->count();
        $sedang_dec = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $dec)
                ->count();

        // Kategori Berat
        $berat_jan = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $jan)
                ->count();
        $berat_feb = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $feb)
                ->count();
        $berat_mar = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $mar)
                ->count();
        $berat_apr = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $apr)
                ->count();
        $berat_may = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $may)
                ->count();
        $berat_june = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $june)
                ->count();
        $berat_july = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $july)
                ->count();
        $berat_aug = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $aug)
                ->count();
        $berat_sep = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $sep)
                ->count();
        $berat_oct = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $oct)
                ->count();
        $berat_nov = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $nov)
                ->count();
        $berat_dec = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $dec)
                ->count();

        if(Auth::user()->level == 'admin') {

                return view('poin.beranda', [
                    'total_siswa' => $total_siswa,
                    'total_pelanggar' => $total_pelanggar,
                    'total_pelanggaran' => $total_pelanggaran,
                    'riwayatPelanggaran' => $riwayatPelanggaran,
                    'cowok' => $cowok,
                    'cewek' => $cewek,
                    'today' => $today,
                    //bulan
                    'jan' => $jan,
                    'feb' => $feb,
                    'mar' => $mar,
                    'apr' => $apr,
                    'may' => $may,
                    'june' => $june,
                    'july' => $july,
                    'aug' => $aug,
                    'sep' => $sep,
                    'oct' => $oct,
                    'nov' => $nov,
                    'dec' => $dec,
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
                ]);
        } else {
                return view('frontend.index');
        }
    }
}
