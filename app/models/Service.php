<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan','kendaraan_id');
    }
    public static function getService()
    {
        $model = \DB::select('SELECT k.*,s.service_date 
                FROM kendaraan AS k 
                LEFT JOIN (SELECT * FROM service WHERE MONTH(created_at) = '.date('m').') AS s 
                ON s.kendaraan_id = k.id 
                WHERE s.service_date IS NULL AND k.tgl_service <= '.date('d', strtotime("+3 days")));

        return $model;
    }
}
