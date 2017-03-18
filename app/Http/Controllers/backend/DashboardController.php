<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //dd(\DB::table('transaksi')->select(\DB::Raw('SUM(total+denda) as profit'))->whereRaw("MONTH(created_at) = ".date('m'))->get());
        $chart = '[';
        for($i=1; $i<=12; $i++){
            $_profit = \DB::table('transaksi')->select(\DB::Raw('SUM(total+denda) as profit'))->whereRaw("MONTH(created_at) = ".$i)->get()[0]->profit;
            $profit = $_profit == '' ? 0 : $_profit;
            $chart.='['.'"'.strtoupper(date('M', strtotime('01-' . $i . '-2017'))).'",'.$profit.'],';
        }
        $chart = substr($chart, 0, -1).']';
        //dd($chart);
        return view('backend/dashboard/index',[
            'chart'=>$chart
        ]);
    }
}
