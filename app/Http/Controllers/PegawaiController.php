<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pegawai;
use Auth,Redirect,File,DB, Validator, Session, Hash;

class PegawaiController extends Controller
{
    public function index()
    {
      $data = array();
      $data['pegawai'] = Pegawai::join('users','users.id_user','pegawai.user_id')->get();
      return view('admin.pegawai.main',$data);
    }
    public function create(Request $request){
      $data = array();
      $data['edit'] = '';
      $data['id'] = '';
      $data['pegawai'] = Pegawai::all();
      $data['users'] = Users::all();

      if (isset($request->edit) && !empty($request->edit) && !empty($request->id)) {
        if ($request->edit == 'edit') {
          $data['id'] = $request->id;
          $data['edit'] = 'true';
          $data['users'] = Users::all();
          $data['data'] = Pegawai::find($request->id);
        }
      }else {
        $data['edit'] = 'false';
      }

      return view('admin.pegawai.add',$data);
    }
    public function store(Request $request)
  {
    if ($request->edit=='false') {
      $newdata = new Pegawai;
    } else {
      $newdata = Pegawai::find($request->id);
      if ($newdata) {
        //
      }else {
        $newdata = new Pegawai;
      }
    }
    $newdata->nama = $request->nama;
    $newdata->alamat = $request->alamat;
    $newdata->tanggal_lahir = $request->tanggal_lahir;
    $newdata->jenis_kelamin = $request->jenis_kelamin;
    $newdata->tahun_kepegawaian = date('Y');
    $newdata->user_id = $request->user_id;
    $newdata->save();
    if ($newdata) {
      session()->flash('status', 'Task was successful!');
      session()->flash('type', 'success');
      return Redirect::route('pegawai');
    }
    return 'false';
  }
}
