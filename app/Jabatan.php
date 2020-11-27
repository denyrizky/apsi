<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  protected $casts = [
     "option_data" => "array"
];
     protected $table = "jabatan";
  protected $fillable = ['id_jabatan','jabatan','tunjangan','created_at','updated_at'];
  public function User()
  {
  	return $this->hasMany(User::class);
  }
}
