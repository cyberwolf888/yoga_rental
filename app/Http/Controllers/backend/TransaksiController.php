<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $model = Transaksi::orderBy('id','desc')->get();
        return view('backend/transaksi/manage',[
            'model'=>$model
        ]);
    }

    public function kendaraan()
    {
        $model = Kendaraan::where('status',Kendaraan::S_TESERDIA)->orderBy('id','desc')->get();
        return view('backend/transaksi/kendaraan',[
            'model'=>$model
        ]);
    }

    public function create($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $model = new Transaksi();
        return view('backend/transaksi/form',[
            'model'=>$model,
            'kendaraan'=>$kendaraan
        ]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'telp' => 'required|alpha_num|max:12',
            'alamat' => 'required',
            'id_type' => 'required|max:1|alpha_num',
            'id_no' => 'required|max:100',
            'tgl_sewa' => 'required',
            'durasi' => 'required|alpha_num|max:2',
            'id_image' => 'required|image|max:3500'
        ]);

        $path = base_path('images/transaksi/');
        $file = Image::make($request->file('id_image'))->resize(900, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $kendaraan = Kendaraan::findOrFail($id);

        $model = new Transaksi();
        $model->kendaraan_id = $id;
        $model->nama = $request->nama;
        $model->telp = $request->telp;
        $model->alamat = $request->alamat;
        $model->id_type = $request->id_type;
        $model->id_no = $request->id_no;
        $model->id_image = $file->basename;
        $model->tgl_sewa = date('Y/m/d',strtotime($request->tgl_sewa));
        $model->durasi = $request->durasi;
        $model->total = $kendaraan->harga*$model->durasi;
        $model->status = Transaksi::S_NEW;
        $model->save();

        return redirect()->route('backend.transaksi.manage');
    }

    public function show($id)
    {
        $model = Transaksi::findOrFail($id);
        $kendaraan = Kendaraan::findOrFail($model->kendaraan_id);

        return view('backend/transaksi/detail',[
            'model'=>$model,
            'kendaraan'=>$kendaraan
        ]);
    }

    public function finish($id)
    {
        $model = Transaksi::findOrFail($id);
        $model->status = Transaksi::S_FINSIH;
        $model->save();

        return redirect()->route('backend.transaksi.manage');
    }

    public function cancel($id)
    {
        $model = Transaksi::findOrFail($id);
        $model->status = Transaksi::S_CANCELED;
        $model->save();

        return redirect()->route('backend.transaksi.manage');
    }
}
