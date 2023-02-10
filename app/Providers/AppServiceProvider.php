<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use App\Models\Poin;
use App\Models\Siswa;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        Paginator::useBootstrap();
        \View::composer('*', function ($view) {
            $badge_ringan = Poin::whereBetween('catatan', ['Panggilan Wali Kelas ke-1', 'Panggilan Wali Kelas ke-2'])->count();
            $badge_sedang = Poin::where('kategori', 'sedang')->count();
            $badge_berat = Poin::where('kategori', 'berat')->count();
            $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
            $total_pelanggaran = Poin::all()->count();
            
            $view->with('badge_ringan', $badge_ringan);
            $view->with('badge_sedang', $badge_sedang);
            $view->with('badge_berat', $badge_berat);
            $view->with('total_siswa', $total_siswa);
            $view->with('total_pelanggaran', $total_pelanggaran);
            
        });
    }
}
