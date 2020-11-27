<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $casts = [
     "option_data" => "array"
];
     protected $table = "bagian";
  protected $fillable = ['id_bagian','nama_bagian','created_at','updated_at'];
  public function User()
  {
  	return $this->hasMany(User::class);
  }
}
