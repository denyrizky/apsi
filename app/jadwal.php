<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = [
        'tanggal_waktu',
        'nama_instansi',
        'alamat_tempat_donor',
        'nama_koordinator',
        'No_Hp',
        'id_mobil',
        'id_pegawai',
        'id_barang',
    ];
}
