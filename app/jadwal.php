<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = [
        'tgl',
        'alamatt',
        'namak',
        'hape',
        'id_mobil',
        'id_pegawai',
        'id_barang',
        'nama',
    ];
}
