<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    public function getTglService()
    {
        $tgl_service=[];
        for ($i=1; $i<=31; $i++){
            $tgl_service[$i]=$i;
        }
        return $tgl_service;
    }
}
