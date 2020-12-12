<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPendonor extends Model
{

    protected $table = 'data_pendonors';
    protected $fillable = [
        'reg_id',
        'ktp',
        'nama',
        'kelurahan',
        'kecamatan',
        'alamat',
        'kodepos',
        'jk',
        'TL',
        'TglL',
        'status',
        'goldar',
        'notel',

    ];

    static function getLastID(){

        $getLastData = DB::table('data_pendonors')->orderBy('id','DESC')->first();

        // contoh nya cem mana gan P001? yangkaya dulu tiket gblk
        // P001 3 digit aja?yoi okay

        if(empty($getLastData)){
            return 'P001';
        }else{
            
            if(empty($getLastData->reg_id)){
                return 'P001';
            }else{

                $temp = $getLastData->reg_id;
                $removeInitial = substr($temp,1);
                $increment = $removeInitial + 1;
                $arrange = 'P'.sprintf('%03d',$increment);

                return $arrange;
            }
            
        }

    }

}
