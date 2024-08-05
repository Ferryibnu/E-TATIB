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
        $nisn = str_pad($row['nisn'], 10, '0', STR_PAD_LEFT);
        $jikaAda = Siswa::where('nisn', $nisn)->first();

        if($jikaAda){
            $siswa = Siswa::where('nisn', $nisn)->first();
            if($row['rfid'] != null) {
                $siswa->rfid = $row['rfid'];
            } else {
                //nothing
            }
            if(isset($row['no_wa'])) {
                $siswa->no_telp = $row['no_wa'];
            } else {
                //nothing
            }
            $siswa->update();

            Alert::success('Sukses', 'Data berhasil diimport');
        } else {
            Alert::error('Gagal Menambahkan', 'Data NISN Tidak Ditemukan');
        }
    }
        
}