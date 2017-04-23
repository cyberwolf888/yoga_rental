<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kendaraan;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function index()
    {
        $model = Service::orderBy('id','desc')->get();
        return view('backend/service/manage',['model'=>$model]);
    }

    public function create($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $model = new Service();
        return view('backend/service/form',[
            'model'=>$model,
            'kendaraan'=>$kendaraan
        ]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'service_date' => 'required',
            'total' => 'required|max:11|alpha_num',
            'image' => 'required|image|max:3500'
        ]);

        $path = base_path('images/service/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $model = new Service();
        $model->kendaraan_id = $id;
        $model->service_date = date('Y/m/d', strtotime($request->service_date));
        $model->total = $request->total;
        $model->pic = $request->pic;
        $model->image = $file->basename;
        $model->save();

        return redirect()->route('backend.service.manage');
    }

    public function show($id)
    {
        $model = Service::findOrFail($id);
        $kendaraan = Kendaraan::findOrFail($model->kendaraan_id);

        return view('backend/service/detail',[
            'model'=>$model,
            'kendaraan'=>$kendaraan
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
