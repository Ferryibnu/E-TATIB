<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed User
        User::create([
            'name' => 'Abdul Majid, S.Pd',
            'email' => '196207072007011010',
            'level' => 'admin',
            'password' => bcrypt('ADMIN123')
        ]);
        
        //Seed User
        User::create([
            'name' => 'Sunardi, S.Pd',
            'email' => '196709052008011010',
            'level' => 'admin',
            'password' => bcrypt('ADMIN123')
        ]);
        
        User::create([
            'name' => 'Ririn Wartinah, S.Pd',
            'email' => '197108302008012007',
            'level' => 'admin',
            'password' => bcrypt('ADMIN123')
        ]);
        
        User::create([
            'name' => 'Cheby Marse',
            'email' => '198103132008011006',
            'level' => 'admin',            
            'password' => bcrypt('ADMIN123')
        ]);
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('admin')
        ]);
        
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'level' => 'admin',
        //     'password' => bcrypt('admin')
        // ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'level' => 'user',
            'password' => bcrypt('user')
        ]);

        $this->call([
            KelasSeeder::class,
            PelanggaranSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}
