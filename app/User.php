<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table ="pegawai";
    protected $fillable = [
        'nama', 'username','nip','password','api_token'
    ];
    public function FunctionName($value='')
    {
        # code...
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }
      public function golongan(){
        return $this->belongsTo(Golongan::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
