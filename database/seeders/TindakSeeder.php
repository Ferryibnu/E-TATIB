<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TindakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Wali Kelas ke 1',
            'kategori' => 'ringan',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Wali Kelas  ke 2',
            'kategori' => 'ringan',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke 1',
            'kategori' => 'sedang',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke 2',
            'kategori' => 'sedang',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke 3',
            'kategori' => 'sedang',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Skorsing',
            'kategori' => 'berat',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Dikeluarkan dari Sekolah',
            'kategori' => 'berat',
            
        ]);
    }
}
