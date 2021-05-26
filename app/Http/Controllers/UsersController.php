<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Auth,Redirect,File,DB, Validator, Session, Hash;

class UsersController extends Controller
{
  public function index(Request $request){
    $data = array();
    $data['edit'] = '';
    $data['id'] = '';
    $data['barang'] = Users::all();

    if (isset($request->edit) && !empty($request->edit) && !empty($request->id)) {
      if ($request->edit == 'edit') {
        $data['id'] = $request->id;
        $data['edit'] = 'true';
        $data['data'] = Users::find($request->id);
      }
    }else {
      $data['edit'] = 'false';
    }

    return view('admin.users.add',$data);
  }
  public function store(Request $request)
  {
    if ($request->edit=='false') {
      $newdata = new Users;
    } else {
      $newdata = Users::find($request->id);
      if ($newdata) {
        //
      }else {
        $newdata = new Users;
      }
    }
    $newdata->username = $request->username;
    $newdata->email = $request->email;
    $newdata->password = $request->password;
    $newdata->role = $request->role;
    $newdata->save();
    if ($newdata) {
      session()->flash('status', 'Task was successful!');
      session()->flash('type', 'success');
      return Redirect::route('pegawaiCreate');
    }
    return 'false';
  }

}
