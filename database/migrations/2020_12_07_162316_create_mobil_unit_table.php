<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama_instansi');
            $table->string('Alamat_instansi');
            $table->string('Alamat_Tempat_Donor');
            $table->date('tanggal_waktu_pelaksanaan');
            $table->string('Nama_Koordinator');
            $table->string('Telp_Hp');
            $table->string('Email');
            $table->string('Jumlah_pendonor');
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
        Schema::dropIfExists('mobil_unit');
    }
}
