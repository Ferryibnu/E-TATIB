<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelanggaran_id')->nullable();
            $table->integer('siswa_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nisn')->nullable();
            $table->string('kelas')->nullable();
            $table->string('pencatat')->nullable();
            $table->string('catatan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('status')->nullable();
            $table->string('tgl_pelanggaran')->nullable();
            $table->timestamps();

            $table->foreign('pelanggaran_id')->references('id')->on('pelanggaran')
                  ->onDelete('set null')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
}
