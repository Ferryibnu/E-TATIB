<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';

    public function Kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }

    public function Poin()
    {
        return $this->belongsTo(Poin::class);
    }

    public function Riwayat()
    {
        return $this->belongsTo(Poin::class);
    }
}
