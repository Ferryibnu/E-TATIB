<?php

namespace App\Http\Controllers\Import;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Siswa;
use App\Models\User;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RealRashid\SweetAlert\Facades\Alert;

class ImportSiswa implements ToModel, WithHeadingRow
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
            Alert::error('Gagal Menambahkan', 'Siswa Telah Terdaftar');
        } else {
            $user = new User;
            $user->email = $row['nisn'];
            $user->name = $row['nama'];
            $user->level = "user";
            $user->password = bcrypt("TATIB123");
            $user->save();
            
            $getKelas = Kelas::where('kelas', $row['kelas'])->first();

            $siswa = new Siswa;
            $siswa->users_id = $user->id;
            $siswa->nisn = $row['nisn'];
            $siswa->nama = $row['nama'];
            $siswa->agama = $row['agama'];
            $siswa->kelas_id = $getKelas->id;
            $siswa->tempat_lahir = $row['tempat_lahir'];
            $siswa->tgl_lahir = Date::excelToDateTimeObject($row['tgl_lahir']);
            $siswa->jns_kelamin = $row['jns_kelamin'];
            $siswa->no_telp = $row['no_hp'];
            $siswa->save();
            Alert::success('Sukses', 'Data berhasil diimport');
        }
    }
        
}