<?php

namespace App\Http\Controllers\Import;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Siswa;
use App\Models\User;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSiswa implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new User;
        $user->email = $row['nisn'];
        $user->password = bcrypt("TATIB123");
        $user->save();
        
        $siswa = new Siswa;
        $siswa->user_id = $user->id;
        $siswa->nisn = $row['nisn'];
        $siswa->nama = $row['nama'];
        $siswa->kelas = $row['kelas'];
        $siswa->tempat_lahir = $row['tempat_lahir'];
        $siswa->tanggal_lahir = Date::excelToDateTimeObject($row['tanggal_lahir']);
        $siswa->jns_kelamin = $row['jns_kelamin'];
        $siswa->save();
    }
        
}