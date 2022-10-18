<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;
    protected $table = 'poin';

    public function Siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function Pelanggaran()
    {
        return $this->hasOne(Pelanggaran::class, 'id', 'pelanggaran_id');
    }
}
