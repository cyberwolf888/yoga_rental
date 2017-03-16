<?php

namespace App\Http\Controllers\Backend;

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
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));
        $model = Transaksi::whereRaw('created_at >= "'.$start_date.'"')->whereRaw('created_at <= "'.$end_date.'"');
        $total_profit = \DB::select("SELECT sum(denda+total) AS total_profit FROM transaksi WHERE status = 2");
        $total_transaksi = $model->count();
        $total_success = Transaksi::whereRaw('created_at >= "'.$start_date.'"')->whereRaw('created_at <= "'.$end_date.'"')->whereRaw('status = 2')->count();
        $persen = (100/$total_transaksi)*$total_success;
        return view('backend/laporan/result',[
            'model'=>$model->get(),
            'total_profit'=>$total_profit['0']->total_profit,
            'persen'=>$persen,
            'total_transaksi'=>$total_transaksi,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);
    }
}
