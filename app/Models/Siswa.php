<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    
    public function Poin()
    {
        return $this->belongsTo(Poin::class);
    }
    
    public function Riwayat()
    {
        return $this->belongsTo(Poin::class);
    }
    
    public function Kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }
    
    public function Penghargaan()
    {
        return $this->hasOne(Penghargaan::class, 'id', 'penghargaan_id');
    }
}
