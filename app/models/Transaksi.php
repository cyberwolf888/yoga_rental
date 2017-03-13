<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getIdType()
    {
        $type = [1=>'KTP',2=>'SIM',3=>'PASPOR',4=>'KITAS'];
        return $type[$this->id_type];
    }

    public function getDenda()
    {
        $denda = 0;
        $tgl_kembali = date('Y-m-d',strtotime(date("Y-m-d", strtotime($this->tgl_sewa)) . " +".$this->durasi."days"));
        if(strtotime(date('Y-m-d'))>strtotime($tgl_kembali)){
            $end = Carbon::parse($tgl_kembali);
            $now = Carbon::now();
            $length = $now->diffInDays($end);

            $denda = $this->kendaraan->harga * $length;
        }
        return $denda;
    }
}
