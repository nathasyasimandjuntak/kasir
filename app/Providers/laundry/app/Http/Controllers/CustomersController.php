<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Redirect, DB, Hash, File, Validator, Session, Auth;
class CustomersController extends Controller
{
    public function index()
    {
      $data = array();
      $data['customers'] = Customers::all();
      return view('customers.main', $data);
    }
    public function create(Request $request)
    {

      $data = array();
      $data['id'] = '';
      $data['edit'] = '';
      $data['data'] = null;

      return view('customers.add', $data);
    }
    public function edit(Request $request)
    {

      $data = array();
      $data['id'] = $request->id;
      $data['edit'] = 'true';
      $data['data'] = Customers::find($request->id);

      if ($data) {
        return view('customers.add', $data);
      }
    }
    public function store(Request $request)
    {
      if ($request->edit == 'false') {
        $newdata = new Customers;
      } else {
        $newdata = Customers::find($request->id);
        if ($newdata) {
          // code...
        }else {
          $newdata = new Customers;
        }
      }
      $newdata->nama_customer = $request->nama_customer;
      $newdata->alamat = $request->alamat;
      $newdata->jenis_kelamin = $request->jenis_kelamin;
      $newdata->telepon = $request->telepon;
      $newdata->keterangan = $request->keterangan;
      $newdata->save();
      if ($newdata) {
        return Redirect::route('customers');
      }
      return 'false';
    }
    public function show(Request $request)
    {
      $id = $request->id;
      $data['data'] = Customers::where('id_customer', $id)->first();
      return view('customers.show', $data);
    }
    public function destroy(Request $request)
    {
      $data = Customers::find($request->id);
      if ($data) {
        $data->delete();
        return Redirect::route('customers');
      }
      return false;
    }





}
