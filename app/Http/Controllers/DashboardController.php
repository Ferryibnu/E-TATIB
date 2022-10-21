<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Poin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_pelanggar = Poin::distinct('siswa_id')->count();
        $cowok = Siswa::where('jns_kelamin', 'L')->count();
        $cewek = Siswa::where('jns_kelamin', 'P')->count();

        //Badge
        $badge_ringan = Poin::whereBetween('catatan', ['Peringatan ke-1', 'Peringatan ke-2'])->count();
        $badge_sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->count();
        $badge_berat = Poin::where('catatan', '=', 'Skorsing')->count();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();

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

        if(Auth::user()->level == 'admin') {

                return view('poin.beranda', [
                    'total_pelanggar' => $total_pelanggar,
                    'cowok' => $cowok,
                    'cewek' => $cewek,
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
                    //badge
                    'badge_ringan' => $badge_ringan,
                    'badge_sedang' => $badge_sedang,
                    'badge_berat' => $badge_berat,
                    'total_siswa' => $total_siswa,
                    'total_pelanggaran' => $total_pelanggaran,
                ]);
        } else {
                return view('frontend.index');
        }
    }

    public function triwulan(Request $request)
    {
        $this->validate($request, [
                'triwulan' => '',
    
        ]);

        if($request->triwulan == 1) {
                $bulan = Carbon::create('january')->format('m');
                $bulan1 = Carbon::create('february')->format('m');
                $bulan2 =  Carbon::create('march')->format('m');
                //Kategori Ringan

                $ringan =  Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $bulan)
                ->count();
                $ringan1 = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=', $bulan1)
                ->count();
                $ringan2 = Poin::where('kategori','=', 'ringan')
                ->whereMonth('created_at', '=',$bulan2)
                ->count();

                //Kategori sedang
                $sedang =  Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $bulan)
                ->count();
                $sedang1 = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=', $bulan1)
                ->count();
                $sedang2 = Poin::where('kategori','=', 'sedang')
                ->whereMonth('created_at', '=',$bulan2)
                ->count();

                //Kategori berat
                $berat =  Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $bulan)
                ->count();
                $berat1 = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=', $bulan1)
                ->count();
                $berat2 = Poin::where('kategori','=', 'berat')
                ->whereMonth('created_at', '=',$bulan2)
                ->count();

                $pdf = PDF::loadview('poin.triwulan_pdf', compact('ringan', 'ringan1', 'ringan2', 'sedang', 'sedang1', 'sedang2', 'berat', 'berat1', 'berat2', 'bulan', 'bulan1', 'bulan2' ));
                return $pdf->stream();

        }
    }
}
