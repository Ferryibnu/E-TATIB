<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;  

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 90; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('siswa')->insert([
    			'nisn' => $faker->numerify('##########'),
    			'nama' => $faker->name,
    			'no_telp' => $faker->phoneNumber('id_ID'),
    			'agama' => $faker->randomElement(['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Buddha']),
                'tgl_lahir' => $faker->date,
                'tempat_lahir' => $faker->city,
                'kelas_id' => $faker->numberBetween(1,10),
                'jns_kelamin' => $faker->randomElement(['L' ,'P']),
        ]);
        }   
    }
}