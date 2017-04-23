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

    public function bulanan(Request $request)
    {
        $bulan = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'Nopember',12=>'Desember'];
        $model = Transaksi::whereRaw('MONTH(created_at)= "'.$request->bulan.'"')->whereRaw('YEAR(created_at)= "'.$request->tahun.'"');
        $total_profit = \DB::select("SELECT sum(denda+total) AS total_profit FROM transaksi WHERE status = 2 AND MONTH(created_at)=".$request->bulan." AND YEAR(created_at)=".$request->tahun);
        $total_transaksi = $model->count();
        $total_success = Transaksi::whereRaw('MONTH(created_at)= "'.$request->bulan.'"')->whereRaw('YEAR(created_at)= "'.$request->tahun.'"')->whereRaw('status = 2')->count();

        $persen = $total_transaksi >0 ? (100/$total_transaksi)*$total_success : 0;

        $service = Service::whereRaw('MONTH(created_at)= "'.$request->bulan.'"')->get();
        $total_service = \DB::select("SELECT sum(total) AS total_service FROM service WHERE MONTH(created_at)=".$request->bulan);
        return view('backend/laporan/bulanan',[
            'model'=>$model->get(),
            'total_profit'=>$total_profit['0']->total_profit,
            'persen'=>$persen,
            'total_transaksi'=>$total_transaksi,
            'service'=>$service,
            'total_service'=>$total_service['0']->total_service,
            'periode'=>$bulan[$request->bulan]." - ".$request->tahun
        ]);
    }

    public function tanggal(Request $request)
    {
        $model = Transaksi::whereRaw('created_at>="'.$request->start_date.'"')->whereRaw('created_at<="'.$request->end_date.'"');
        $total_profit = \DB::select('SELECT sum(denda+total) AS total_profit FROM transaksi WHERE status = 2 AND created_at>="'.$request->start_date.'" AND created_at<="'.$request->end_date.'"');
        $total_transaksi = $model->count();
        $total_success = Transaksi::whereRaw('created_at>="'.$request->start_date.'"')->whereRaw('created_at<="'.$request->end_date.'"')->whereRaw('status = 2')->count();

        $persen = $total_transaksi >0 ? (100/$total_transaksi)*$total_success : 0;

        $service = Service::whereRaw('created_at>="'.$request->start_date.'"')->whereRaw('created_at<="'.$request->end_date.'"')->get();
        $total_service = \DB::select('SELECT sum(total) AS total_service FROM service WHERE created_at>="'.$request->start_date.'" AND created_at<="'.$request->end_date.'"');
        return view('backend/laporan/tanggal',[
            'model'=>$model->get(),
            'total_profit'=>$total_profit['0']->total_profit,
            'persen'=>$persen,
            'total_transaksi'=>$total_transaksi,
            'service'=>$service,
            'total_service'=>$total_service['0']->total_service,
            'periode'=>$request->start_date." - ".$request->end_date
        ]);
    }
}
