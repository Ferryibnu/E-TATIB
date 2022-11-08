<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenghargaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penghargaan')->insert([
            'kriteria' => 'Prestasi Tingkat Nasional',
            'poin' => 100,
            
        ]);
        
        DB::table('penghargaan')->insert([
            'kriteria' => 'Prestasi Tingkat Provinsi',
            'poin' => 75,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Prestasi Tingkat Kota/Kabupaten',
            'poin' => 50,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Prestasi Tingkat Kecamatan',
            'poin' => 25,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Mengikuti lomba sebagai peserta (tidak juara)',
            'poin' => 10,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Mengikuti pelatihan LDKS',
            'poin' => 15,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Diangkat menjadi ketua OSIS',
            'poin' => 25,
            
        ]);

        DB::table('penghargaan')->insert([
            'kriteria' => 'Diangkat menjadi pengurus OSIS',
            'poin' => 20,
            
        ]);

    }
}
