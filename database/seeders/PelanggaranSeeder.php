<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak membawa buku penghubung dan kartu pelanggar',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membuat kegaduhan di kelas atau di sekolah',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak membawa buku penghubung dan kartu pelanggar',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mencoret-coret dinding, pintu, meja, kursi, pagar dan fasilitas sekolah',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa atau bermain kartu remi dan domino di sekolah',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menghidupkan dan mengendarai sepeda motor di area tertentu dalam sekolah',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Bermain bola di lapangan(tidak memakai baju OR) di koridor, dan di kelas',
            'poin' => 10,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Melindungi teman yang bersalah',
            'poin' => 15,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menghidupkan handphone waktu KBM',
            'poin' => 20,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berpacaran di Sekolah dan berduaan yang tidak pada mestinya',
            'poin' => 30,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berperilaku jorok atau asusila baik di dalam maupun di luar sekolah',
            'poin' => 40,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merayakan ulang tahun secara berlebihan',
            'poin' => 40,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membuang sampah tidak pada tempat sampah khusus yang ditentukan',
            'poin' => 40,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merusak taman dan tanaman yang ada di area sekolah',
            'poin' => 40,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menyalahgunakan uang SPP atau uang sekolah/kelas',
            'poin' => 50,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa atau membunyikan petasan di sekolah',
            'poin' => 50,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memalsukan surat izin masuk/keluar sekolah',
            'poin' => 70,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Meloncat jendela dan pagar sekolah',
            'poin' => 80,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merusak sarana dan prasarana sekolah.',
            'poin' => 80,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mengancam mengintimidasi / bullying teman sekelas / teman sekolah',
            'poin' => 100,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Bertindak tidak sopan/ melecehkan Kepala Sekolah, Guru dan Karyawan Sekolah',
            'poin' => 150,
            'kategori' => 3,
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mengancam / mengintimidasi Kepala Sekolah, Guru dan Karyawan Sekolah',
            'poin' => 150,
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Datang terlambat',
            'poin' => 10,
            
        ]);
    }
}