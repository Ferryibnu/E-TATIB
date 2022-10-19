<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pelanggaran;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'level' => 'user',
            'password' => bcrypt('user')
        ]);

        $this->call([
            KelasSeeder::class,
            PelanggaranSeeder::class,
            // SiswaSeeder::class,
        ]);
    }
}
