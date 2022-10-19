<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Import\ImportSiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use \App\Models\Siswa;
use App\Models\User;
use App\Models\Poin;
use App\Models\Riwayat;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count(); //untuk badge menu pelanggar
        $riwayatPelanggaran = Riwayat::all()->count(); //untuk badge menu pelanggar
        
        $totalPoin = Poin::join('siswa', 'poin.siswa_id', '=', 'siswa.id')
        ->join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select("siswa_id",DB::raw('SUM(pelanggaran.poin) as total'))
        ->groupBy('siswa_id')
        ->orderBy('total')
        ->get();

        
        // dd($totalPoin);
        return view('siswa.index', [
            'siswa' => $siswa,
            'totalPoin' => $totalPoin,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
            'kelas' => $kelas,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }
    
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => '',
            'kelas' => '',
            'agama' => '',
            'no_telp' => '',
            'tempat_lahir' => '',
            'tgl_lahir' => '',
            'jns_kelamin' => '',
        ]);
        
        $jikaAda = Siswa::where('nisn', $request->nisn)->first();

        if($jikaAda){
            Alert::error('Gagal Menambahkan', 'Pegawai Telah Terdaftar');
            return redirect()->back();
        } else {
            $addUser = new User;
            $addUser->name = $request->nama;
            $addUser->email = $request->nisn;
            $addUser->password = bcrypt("TATIB123");
            $addUser->save();

            $addSiswa = new Siswa;
            $addSiswa->users_id = $addUser->id;
            $addSiswa->nisn = $request->nisn;
            $addSiswa->nama = $request->nama;
            $addSiswa->agama = $request->agama;
            $addSiswa->no_telp = $request->no_telp;
            $addSiswa->kelas_id = $request->kelas;
            $addSiswa->tempat_lahir = $request->tempat_lahir;
            $addSiswa->tgl_lahir = $request->tgl_lahir;
            $addSiswa->jns_kelamin = $request->jns_kelamin;
            $addSiswa->save();

            Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'nama' => '',
            'kelas' => '',
            'tempat_lahir' => '',
            'tgl_lahir' => '',
            'no_telp' => '',
        ]);

        $editSiswa = Siswa::find($id);
        $editSiswa->nama = $request->nama;
        $editSiswa->kelas_id = $request->kelas;
        $editSiswa->tempat_lahir = $request->tempat_lahir;
        $editSiswa->tgl_lahir = $request->tgl_lahir;
        $editSiswa->no_telp = $request->no_telp;
        $editSiswa->update();

        Alert::success('Edit Sukses', 'Data berhasil diedit');
        return redirect()->back();
    }

    public function hapus($id)
    {
       Siswa::find($id)->delete();

        Alert::success('Hapus Sukses', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function profile($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $siswaPoin = Poin::where('siswa_id', $id)->get();
        $riwayatPelanggaran = Riwayat::all()->count();
        $totalPoin = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select(DB::raw('SUM(pelanggaran.poin) as total'))
        ->orderBy('total')
        ->where('siswa_id', '=', $id)
        ->first();

        $total_siswa = Siswa::all()->count(); //untuk badge menu siswa
        $total_pelanggaran = Poin::all()->count();; //untuk badge menu pelanggar

        //Membuat QR Code
        $qrCode = QrCode::size(200)->generate($siswa->nisn);
        return view('siswa.profile', [
            'siswa' => $siswa,
            'totalPoin' => $totalPoin,
            'siswaPoin' => $siswaPoin,
            'qrCode' => $qrCode,
            'total_siswa' => $total_siswa,
            'total_pelanggaran' => $total_pelanggaran,
            'riwayatPelanggaran' => $riwayatPelanggaran,
        ]);
    }

    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
    
        // upload ke folder file_siswa di dalam folder public
        $file->move('public',$nama_file);
    
        // import data
        Excel::import(new ImportSiswa, public_path('/public/'.$nama_file));
    
        // alihkan halaman kembali
        return redirect('/siswa');
    }
    
    public function cetak_pdf($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $siswaPoin = Poin::where('siswa_id', $id)->get();
        $totalPoin = Poin::join('pelanggaran', 'poin.pelanggaran_id', '=', 'pelanggaran.id')
        ->select(DB::raw('SUM(pelanggaran.poin) as total'))
        ->orderBy('total')
        ->where('siswa_id', '=', $id)
        ->first();
        $pdf = PDF::loadview('siswa/siswa_pdf', compact('siswa', 'siswaPoin','totalPoin'));
        return $pdf->stream();
    }
}