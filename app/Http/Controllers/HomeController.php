<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/home');
    }

    public function mobil()
    {
        $model = Kendaraan::where('type',2)->orderBy('id', 'desc')->paginate(5);
        return view('frontend/mobil',[
            'model'=>$model
        ]);
    }

    public function motor()
    {
        $model = Kendaraan::where('type',1)->orderBy('id', 'desc')->paginate(5);
        return view('frontend/motor',[
            'model'=>$model
        ]);
    }
}
