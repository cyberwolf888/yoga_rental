<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Operator Fucntion
    |--------------------------------------------------------------------------
    */
    public function operator()
    {
        $model = User::where('type',2)->orderBy('id','desc')->get();
        return view('backend/users/operator',[
            'model'=>$model
        ]);
    }

    public function create_operator()
    {
        $model = new User();
        return view('backend/users/form_operator',[
            'model'=>$model
        ]);
    }

    public function store_operator(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'status' => 'required'
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->type = 2;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.users.operator.manage');
    }

    public function show_operator($id)
    {
        //
    }

    public function edit_operator($id)
    {
        $model = User::findOrFail($id);
        return view('backend/users/form_operator',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_operator(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'status' => 'required'
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->type = 2;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.users.operator.manage');
    }



    /*
    |--------------------------------------------------------------------------
    | Admin Fucntion
    |--------------------------------------------------------------------------
    */
    public function admin()
    {
        //
    }

    public function create_admin()
    {
        //
    }

    public function store_admin(Request $request)
    {
        //
    }

    public function show_admin($id)
    {
        //
    }

    public function edit_admin($id)
    {
        //
    }

    public function update_admin(Request $request, $id)
    {
        //
    }

}
