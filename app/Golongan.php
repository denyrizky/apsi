<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
  protected $casts = [
     "option_data" => "array"
];	
  protected $table = "golongan";
  protected $fillable = ['id_golongan','golongan','gaji_pokok','created_at','updated_at'];
  public function User()
  {
  	return $this->hasMany(User::class);
  }
}
