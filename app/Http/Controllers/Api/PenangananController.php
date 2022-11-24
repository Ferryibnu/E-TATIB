<?php

namespace App\Http\Controllers\Api;

use App\Models\Poin;
use App\Models\Siswa;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenangananController extends Controller
{
    public function ringan(){
        $ringan = Poin::whereBetween('catatan', ['Panggilan Wali Kelas ke-1', 'Panggilan Wali Kelas ke-2'])->get();
        return response()->json($ringan);
    }

    public function sedang(){
        $sedang = Poin::whereBetween('catatan', ['Panggilan Orang Tua ke-1', 'Panggilan Orang Tua ke-3'])->get();        
        return response()->json($sedang);
    }

    public function berat(){
        $berat = Poin::where('catatan', '=', 'Skorsing')->get();
        return response()->json($berat);
    }
}
