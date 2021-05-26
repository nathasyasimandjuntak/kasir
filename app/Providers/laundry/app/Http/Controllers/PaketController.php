<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Redirect, DB, Hash, File, Validator, Session, Auth;

class PaketController extends Controller
{
  public function index(){

    $data = array();
    $data['paket'] = Paket::all();
    return view('paket.main', $data);
  }
  public function create(Request $request)
  {
    $data = array();
    $data['id'] = '';
    $data['edit'] = '';
    $data['data'] = null;
    // return $data;
    return view('paket.add', $data);
  }
  public function edit(Request $request)
  {
    $data = array();
    $data['id'] = $request->id;
    $data['edit'] = 'true';
    $data['data'] = Paket::find($request->id);

    if ($data) {
      // code...
      return view('paket.add', $data);
    }
  }

  public function store(Request $request)
  {
    if ($request->edit == 'false') {
      $newdata = new Paket;
    } else {
      $newdata = Paket::find($request->id);
      if ($newdata) {
        // code...
      } else {
        $newdata = new Paket;
      }
    }
    $newdata->nama_paket = $request->nama_paket;
    $newdata->harga = $request->harga;
    $newdata->save();

    if ($newdata) {
      return Redirect::route('paket');
    }
    return 'false';
  }
  public function show(Request $request)
  {
    $id = $request->id;
    $data['data'] = Paket::where('id_paket', $id)->first();
    return view('paket.show', $data);
  }
  public function destroy(Request $request)
  {
    $data = Paket::find($request->id);
    if ($data) {
      $data->delete();
      return Redirect::route('paket');
    }
    return 'false';
  }
}
