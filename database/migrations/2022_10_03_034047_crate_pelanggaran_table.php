<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CratePelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pelanggaran')->nullable();
            $table->string('penghargaan')->nullable();
            $table->integer('poin')->nullable();
            $table->integer('kategori')->nullable();
            $table->timestamps();

            // $table->foreign('kategori_id')->references('id')->on('kategori')
            //       ->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggaran');
    }
}
