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
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membuat kegaduhan di kelas atau di sekolah',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak membawa buku penghubung dan kartu pelanggar',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mencoret-coret dinding, pintu, meja, kursi, pagar dan fasilitas sekolah',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa atau bermain kartu remi dan domino di sekolah',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menghidupkan dan mengendarai sepeda motor di area tertentu dalam sekolah',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Bermain bola di lapangan(tidak memakai baju OR) di koridor, dan di kelas',
            'poin' => 10,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Melindungi teman yang bersalah',
            'poin' => 15,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menghidupkan handphone waktu KBM',
            'poin' => 20,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berpacaran di Sekolah dan berduaan yang tidak pada mestinya',
            'poin' => 30,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berperilaku jorok atau asusila baik di dalam maupun di luar sekolah',
            'poin' => 40,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merayakan ulang tahun secara berlebihan',
            'poin' => 40,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membuang sampah tidak pada tempat sampah khusus yang ditentukan',
            'poin' => 40,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merusak taman dan tanaman yang ada di area sekolah',
            'poin' => 40,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menyalahgunakan uang SPP atau uang sekolah/kelas',
            'poin' => 50,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa atau membunyikan petasan di sekolah',
            'poin' => 50,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memalsukan surat izin masuk/keluar sekolah',
            'poin' => 70,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Meloncat jendela dan pagar sekolah',
            'poin' => 80,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Merusak sarana dan prasarana sekolah.',
            'poin' => 80,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mengancam mengintimidasi / bullying teman sekelas / teman sekolah',
            'poin' => 100,
            'golongan' => 'Sikap Perilaku',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Bertindak tidak sopan/ melecehkan Kepala Sekolah, Guru dan Karyawan Sekolah',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mengancam / mengintimidasi Kepala Sekolah, Guru dan Karyawan Sekolah',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa / merokok saat masih mengenakan seragam sekolah baik didalam/diluar sekolah',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Menyalahgunakan media sosial yang merugikan pihak lain yang berhubungan dengan sekolah',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berjudi dalam bentuk apapun di sekolah',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa senjata tajam, senjata api dsb. di sekolah.',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Terlibat langsung maupun tidak langsung perkelahian/tawuran di sekolah, di luar sekolah atau antar sekolah.',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mengikuti aliran/perkumpulan/geng terlarang/Komunitas LGBT dan radikalisme',
            'poin' => 150,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membuat atau memakai tatto di tubuh',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Melakukan pelecehan seksual (pemerkosaan dll)',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa, menggunakan atau mengedarkan miras dan narkoba',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Membawa dan/atau membuat VCD Porno, buku porno, majalah porno atau sesuatu yang berbau pornografi dan pornoaksi',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mencuri di sekolah dan di luar sekolah.',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memalsukan stempel sekolah, edaran sekolah atau tanda tangan Kepala Sekolah, guru dan karyawan sekolah.',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Terlibat dan atau melakukan tindakan kriminal',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Mencemarkan nama baik sekolah',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Terbukti hamil atau menghamili',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Terbukti menikah',
            'poin' => 250,
            'golongan' => 'Sikap Perilaku',
        ]);

        //Kerajinan
        
        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Datang terlambat',
            'poin' => 10,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Meninggalkan kelas tanpa izin.',
            'poin' => 10,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Di kantin saat jam pembelajaran.',
            'poin' => 10,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => "Tidak melaksanakan piket harian 7K dan jum'at bersih",
            'poin' => 10,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidur di kelas saat pelajaran berlangsung',
            'poin' => 10,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Pulang sebelum waktunya tanpa izin dari sekolah',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak mengikuti upacara',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak mengikuti kegiatan sekolah',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak mengikuti kegiatan ekstrakurikuler pramuka wajib',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak mengikuti pembiasaan membaca kitab suci agama',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak melakukan kegiatan literasi',
            'poin' => 20,
            'golongan' => 'Kerajinan',
            
        ]);

        //KERAPIAN

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak memakai seragam sesuai dengan ketentuan',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Seragam dicoret-coret.',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Melipat lengan baju, baju tidak dikancingkan, tidak rapi',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Berambut panjang tidak sesuai ketentuan (putra)',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak memakai kaos kaki sesuai ketentuanTidak memakai ikat pinggang sesuai dengan ketentuan',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Atribut seragam tidak lengkap',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Tidak memakai sepatu sesuai ketentuan',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memakai perhiasan berlebihan / tidak sesuai ketentuan',
            'poin' => 10,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memakai make-up berlebihan (putri)',
            'poin' => 30,
            'golongan' => 'Kerapian',
            
        ]);

        DB::table('pelanggaran')->insert([
            'pelanggaran' => 'Memakai tindik telinga lebih dari 1 (putri) dan tindik lidah',
            'poin' => 30,
            'golongan' => 'Kerapian',
            
        ]);

    }
}