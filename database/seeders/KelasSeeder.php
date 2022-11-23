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
            'jurusan' => 'TKJ', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 TKJ 2', 
            'jurusan' => 'TKJ', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 TKJ 1', 
            'jurusan' => 'TKJ', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 TKJ 2', 
            'jurusan' => 'TKJ', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 TKJ 1', 
            'jurusan' => 'TKJ', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 TKJ 2', 
            'jurusan' => 'TKJ', 
            'grade' => '12',
        ]);

        // RPL
        DB::table('kelas')->insert([
            'kelas' => '10 RPL 1', 
            'jurusan' => 'RPL', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 RPL 2', 
            'jurusan' => 'RPL', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 RPL 1', 
            'jurusan' => 'RPL', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 RPL 2', 
            'jurusan' => 'RPL', 
            'grade' => '11',
        ]);
        DB::table('kelas')->insert([
            'kelas' => '12 RPL 1', 
            'jurusan' => 'RPL', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 RPL 2', 
            'jurusan' => 'RPL', 
            'grade' => '12',
        ]);
        
        // PH
        DB::table('kelas')->insert([
            'kelas' => '10 PH 1', 
            'jurusan' => 'RPL', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 PH 2', 
            'jurusan' => 'PH', 
            'grade' => '10',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '11 PH 1', 
            'jurusan' => 'PH', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 PH 2', 
            'jurusan' => 'PH', 
            'grade' => '11',
        ]);
        DB::table('kelas')->insert([
            'kelas' => '12 PH 1', 
            'jurusan' => 'PH', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 PH 2', 
            'jurusan' => 'PH', 
            'grade' => '12',
        ]);

        // DKV
        DB::table('kelas')->insert([
            'kelas' => '10 DKV 1', 
            'jurusan' => 'DKV', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 DKV 2', 
            'jurusan' => 'DKV', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 DKV 3', 
            'jurusan' => 'DKV', 
            'grade' => '10',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '11 DKV 1', 
            'jurusan' => 'DKV', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 DKV 2', 
            'jurusan' => 'DKV', 
            'grade' => '11',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '12 DKV 1', 
            'jurusan' => 'DKV', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 DKV 2', 
            'jurusan' => 'DKV', 
            'grade' => '12',
        ]);
        
        // MM
        DB::table('kelas')->insert([
            'kelas' => '10 MM 1', 
            'jurusan' => 'MM', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 MM 2', 
            'jurusan' => 'MM', 
            'grade' => '10',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '11 MM 1', 
            'jurusan' => 'MM', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 MM 2', 
            'jurusan' => 'MM', 
            'grade' => '11',
        ]);
        DB::table('kelas')->insert([
            'kelas' => '12 MM 1', 
            'jurusan' => 'MM', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 MM 2', 
            'jurusan' => 'MM', 
            'grade' => '12',
        ]);

        // PSPT
        DB::table('kelas')->insert([
            'kelas' => '10 PSPT 1', 
            'jurusan' => 'PSPT', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 PSPT 2', 
            'jurusan' => 'PSPT', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 PSPT 3', 
            'jurusan' => 'PSPT', 
            'grade' => '10',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '11 PSPT 1', 
            'jurusan' => 'PSPT', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 PSPT 2', 
            'jurusan' => 'PSPT', 
            'grade' => '11',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '12 PSPT 1', 
            'jurusan' => 'PSPT', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 PSPT 2', 
            'jurusan' => 'PSPT', 
            'grade' => '12',
        ]);
        
        // AK
        DB::table('kelas')->insert([
            'kelas' => '10 AK 1', 
            'jurusan' => 'AK', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 AK 2', 
            'jurusan' => 'AK', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 AK 3', 
            'jurusan' => 'AK', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 AK 4', 
            'jurusan' => 'AK', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 AK 5', 
            'jurusan' => 'AK', 
            'grade' => '10',
        ]);
        
        // AKL
        DB::table('kelas')->insert([
            'kelas' => '11 AKL 1', 
            'jurusan' => 'AKL', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 AKL 2', 
            'jurusan' => 'AKL', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 AKL 3', 
            'jurusan' => 'AKL', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 AKL 4', 
            'jurusan' => 'AKL', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 AKL 5', 
            'jurusan' => 'AKL', 
            'grade' => '11',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '12 AKL 1', 
            'jurusan' => 'AKL', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 AKL 2', 
            'jurusan' => 'AKL', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 AKL 3', 
            'jurusan' => 'AKL', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 AKL 4', 
            'jurusan' => 'AKL', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 AKL 5', 
            'jurusan' => 'AKL', 
            'grade' => '12',
        ]);

        // BD
        DB::table('kelas')->insert([
            'kelas' => '10 BD 1', 
            'jurusan' => 'BD', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 BD 2', 
            'jurusan' => 'BD', 
            'grade' => '10',
        ]);

        // BDP
        DB::table('kelas')->insert([
            'kelas' => '11 BDP 1', 
            'jurusan' => 'BDP',
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 BDP 2', 
            'jurusan' => 'BDP', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 BDP 1', 
            'jurusan' => 'BDP', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 BDP 2', 
            'jurusan' => 'BDP', 
            'grade' => '12',
        ]);

        // MP
        DB::table('kelas')->insert([
            'kelas' => '10 MP 1', 
            'jurusan' => 'MP', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 MP 2', 
            'jurusan' => 'MP', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 MP 3', 
            'jurusan' => 'MP', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 MP 4', 
            'jurusan' => 'MP', 
            'grade' => '10',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '10 MP 5', 
            'jurusan' => 'MP', 
            'grade' => '10',
        ]);
        
        // OTKP
        DB::table('kelas')->insert([
            'kelas' => '11 OTKP 1', 
            'jurusan' => 'OTKP', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 OTKP 2', 
            'jurusan' => 'OTKP', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 OTKP 3', 
            'jurusan' => 'OTKP', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 OTKP 4', 
            'jurusan' => 'OTKP', 
            'grade' => '11',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '11 OTKP 5', 
            'jurusan' => 'OTKP', 
            'grade' => '11',
        ]);
        
        DB::table('kelas')->insert([
            'kelas' => '12 OTKP 1', 
            'jurusan' => 'OTKP', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 OTKP 2', 
            'jurusan' => 'OTKP', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 OTKP 3', 
            'jurusan' => 'OTKP', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 OTKP 4', 
            'jurusan' => 'OTKP', 
            'grade' => '12',
        ]);

        DB::table('kelas')->insert([
            'kelas' => '12 OTKP 5', 
            'jurusan' => 'OTKP', 
            'grade' => '12',
        ]);

    }
}
