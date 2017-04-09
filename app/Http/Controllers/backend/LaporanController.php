<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function priod()
    {
        return view('backend/laporan/priod');
    }

    public function result(Request $request)
    {
        $bulan = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'Nopember',12=>'Desember'];
        $model = Transaksi::whereRaw('MONTH(created_at)= "'.$request->bulan.'"');
        $total_profit = \DB::select("SELECT sum(denda+total) AS total_profit FROM transaksi WHERE status = 2 AND MONTH(created_at)=".$request->bulan);
        $total_transaksi = $model->count();
        $total_success = Transaksi::whereRaw('MONTH(created_at)= "'.$request->bulan.'"')->whereRaw('status = 2')->count();
        $persen = (100/$total_transaksi)*$total_success;

        $service = Service::whereRaw('MONTH(created_at)= "'.$request->bulan.'"')->get();
        $total_service = \DB::select("SELECT sum(total) AS total_service FROM service WHERE MONTH(created_at)=".$request->bulan);
        return view('backend/laporan/result',[
            'model'=>$model->get(),
            'total_profit'=>$total_profit['0']->total_profit,
            'persen'=>$persen,
            'total_transaksi'=>$total_transaksi,
            'service'=>$service,
            'total_service'=>$total_service['0']->total_service,
            'periode'=>$bulan[$request->bulan]
        ]);
    }
}
