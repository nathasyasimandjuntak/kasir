<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Redirect, DB, Hash, File, Validator, Session, Auth;
class UsersController extends Controller
{
  public function index()
  {
    $data = array();
    $data['users'] = Users::all();
    return view('users.main', $data);
  }
  public function create(Request $request)
  {
    $data = array();
    $data['id'] = '';
    $data['edit'] = '';
    $data['data'] = null;

    return view('users.add', $data);
  }
  public function edit(Request $request)
  {
    // return $request->all();
    $data = array();
    $data['id'] = $request->id;
    $data['edit'] = 'true';
    $data['data'] = Users::find($request->id);

    if ($data) {
      return view('users.add', $data);
    }
  }
  public function store(Request $request)
  {
    if ($request->edit == 'false') {
      $newdata = new Users;
    } else {
      $newdata = Users::find($request->id);
      if ($newdata) {
        // code...
      } else {
        $newdata = new Users;
      }
    }
    $this->validate($request, [
      'nama' => 'required|min:4',
      'username' => 'required|min:4|unique:users',
      'password' => 'required',
    ]);

    $newdata->nama = $request->nama;
    $newdata->username = $request->username;
    $newdata->password = bcrypt($request->password);
    $newdata->role = $request->role;
    $newdata->save();
    if ($newdata) {
      return Redirect::route('users');
    }
    return 'false';
  }
  public function show(Request $request)
  {
    $id = $request->id;
    $data['data'] = Users::where('id_user', $id)->first();
    return view('users.show', $data);
  }
  public function destroy(Request $request)
  {
    $data = Users::find($request->id);
    if ($data) {
      $data->delete();
      return Redirect::route('users');
    }
    return 'false';
  }
  public function login()
  {
    return view('users.login');
  }
  public function loginPost(Request $request)
  {
    // return $request->all();
    $nama = $request->nama;
    $password = $request->password;
    $username = $request->username;
    $role = $request->role;


   $data = Users::where('username', $username)->first();
    if ($data->role == 1) {
      if ($data) {
        if (Hash::check($password, $data->password)) {
          Session::put('nama', $data->nama);
          Session::put('username', $data->username);
          Session::put('role', $data->role);
          Session::put('login', TRUE);
          return redirect('admin/dashboard');
        }
        return redirect('login')->with('alert', 'bye');
      }
    }
    else if ($data->role == 2) {
      if ($data) {
        if (Hash::check($password, $data->password)) {
          Session::put('nama', $data->nama);
          Session::put('username', $data->username);
          Session::put('role', $data->role);
          Session::put('login', TRUE);
          return redirect('admin/dashboard');
        }
        return redirect('login')->with('alert', 'bye');
      }
    }
    else if ($data->role == 3) {
      if ($data) {
        if (Hash::check($password, $data->password)) {
          Session::put('nama', $data->nama);
          Session::put('username', $data->username);
          Session::put('role', $data->role);
          Session::put('login', TRUE);
          return redirect('admin/dashboard');
        }
        return redirect('login')->with('alert', 'bye');
      }
    }
  }
  public function logout()
  {
    Session::flush();
    return Redirect::route('login');
  }
}
