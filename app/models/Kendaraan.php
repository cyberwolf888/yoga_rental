<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    const S_TESERDIA = 1;
    const S_TIDAK_TESERDIA = 0;
    const S_SEDANG_DISEWA = 2;

    public function getTglService()
    {
        $tgl_service=[];
        for ($i=1; $i<=31; $i++){
            $tgl_service[$i]=$i;
        }
        return $tgl_service;
    }

    public function getStatus()
    {
        $status = ['1'=>'Tersedia', '2'=>'Sedang Disewa','3'=>'Tidak Disewakan'];
        return $status[$this->status];
    }

    public function getType()
    {
        $type = ['1'=>"Sepeda Motor", '2'=>"Mobil"];
        return $type[$this->type];
    }
}
