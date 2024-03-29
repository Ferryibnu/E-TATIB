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
            'tindak_lanjut' => 'Panggilan Wali Kelas ke-1',
            'kategori' => 'ringan',
            'range' => '30-35',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Wali Kelas ke-2',
            'kategori' => 'ringan',
            'range' => '36-55',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke-1',
            'kategori' => 'sedang',
            'range' => '56-75',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke-2',
            'kategori' => 'sedang',
            'range' => '76-95',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Panggilan Orang Tua ke-3',
            'kategori' => 'sedang',
            'range' => '96-149',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Skorsing',
            'range' => '150-249',
            'kategori' => 'berat',
            
        ]);

        DB::table('tindak')->insert([
            'tindak_lanjut' => 'Dikeluarkan dari Sekolah',
            'kategori' => 'berat',
            'range' => '250',
            
        ]);
    }
}
