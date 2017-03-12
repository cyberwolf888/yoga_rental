<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    const S_NEW = 1;
    const S_FINSIH = 2;
    const S_CANCELED = 0;

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan','kendaraan_id');
    }

    public function getStatus()
    {
        $status = ['Canceled','Proses','Selesai'];
        return $status[$this->status];
    }
}
