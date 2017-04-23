<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kendaraan;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KendaraanController extends Controller
{
    public function index()
    {
        $model = Kendaraan::orderBy('id','desc')->get();
        return view('backend/kendaraan/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Kendaraan();
        return view('backend/kendaraan/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'merek' => 'required|max:100',
            'warna' => 'required|max:50',
            'plat_no' => 'required|max:10',
            'status' => 'required|max:11|alpha_num',
            'harga' => 'required|max:11|alpha_num',
            'kmmeter' => 'required|max:11|alpha_num',
            'image' => 'required|image|max:3500'
        ]);
        $path = base_path('images/kendaraan/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $model = new Kendaraan();
        $model->nama = $request->nama;
        $model->image = $file->basename;
        $model->merek = $request->merek;
        $model->type = $request->type;
        $model->warna = $request->warna;
        $model->plat_no = $request->plat_no;
        $model->status = $request->status;
        $model->harga = $request->harga;
        $model->kmmeter = $request->kmmeter;
        $model->tgl_service = $request->tgl_service;
        $model->save();

        return redirect()->route('backend.kendaraan.manage');
    }

    public function show($id)
    {
        $model = Kendaraan::findOrFail($id);
        $service = Service::where('kendaraan_id',$id)->orderBy('id','Desc')->get();
        return view('backend/kendaraan/detail',['model'=>$model,'service'=>$service]);
    }

    public function edit($id)
    {
        $model = Kendaraan::findOrFail($id);
        return view('backend/kendaraan/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'merek' => 'required|max:100',
            'warna' => 'required|max:50',
            'plat_no' => 'required|max:10',
            'status' => 'required|max:11|alpha_num',
            'harga' => 'required|max:11|alpha_num',
            'kmmeter' => 'required|max:11|alpha_num',
            'image' => 'image|max:3500'
        ]);

        $model = Kendaraan::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = base_path('images/kendaraan/');
            if(is_file($path.$model->image)){
                unlink($path.$model->image);
            }
            $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $model->image = $file->basename;
        }

        $model->nama = $request->nama;
        $model->merek = $request->merek;
        $model->type = $request->type;
        $model->warna = $request->warna;
        $model->plat_no = $request->plat_no;
        $model->status = $request->status;
        $model->harga = $request->harga;
        $model->kmmeter = $request->kmmeter;
        $model->tgl_service = $request->tgl_service;
        $model->save();

        return redirect()->route('backend.kendaraan.manage');
    }

    public function destroy($id)
    {
        //
    }
}
