<?php

namespace App\Http\Controllers\Import;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Siswa;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RealRashid\SweetAlert\Facades\Alert;

class ImportRFID implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $jikaAda = Siswa::where('nisn', $row['nisn'])->first();

        if($jikaAda){
            $siswa = Siswa::where('nisn', $row['nisn'])->first();
            $siswa->rfid = $row['rfid'];
            $siswa->no_telp = $row['no_wa'];
            $siswa->update();

            Alert::success('Sukses', 'Data berhasil diimport');
        } else {
            Alert::error('Gagal Menambahkan', 'Data NISN Tidak Ditemukan');
        }
    }
        
}