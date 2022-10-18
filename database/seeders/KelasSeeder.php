<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'kelas' => '10 TKJ 1', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 TKJ 2', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 TKJ 1', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 TKJ 2', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 TKJ 1', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 TKJ 2', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 RPL 1', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 RPL 2', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 RPL 1', 
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 RPL 1', 
        ]);
    }
}
