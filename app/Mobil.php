<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mobil extends Model
{
    protected $table = 'mobil_unit';
    protected $fillable = [
        'Nama_instansi',
        'Alamat_instansi',
        'Alamat_Tempat_Donor',
        'tanggal_waktu_pelaksanaan',
        'Nama_Koordinator',
        'Telp_Hp',
        'Email',
        'Jumlah_pendonor',
    ];
}
