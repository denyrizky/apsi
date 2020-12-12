<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_waktu');
            $table->string('nama_instansi');
            $table->string('alamat_tempat_donor');
            $table->string('nama_koordinator');
            $table->string('No_Hp');
            $table->string('id_mobil')->unique();
            $table->string('id_pegawai')->unique();
            $table->string('id_barang')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
