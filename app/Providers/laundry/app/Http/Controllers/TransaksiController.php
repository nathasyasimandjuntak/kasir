<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Users;
use App\Models\Customers;
use Redirect, DB, Hash, File, Validator, Session, Auth;

class TransaksiController extends Controller
{
  public function index()
  {
    $data = array();
    $data['transaksi'] = Transaksi::leftJoin('customers','customers.id_customer','transaksi.customer_id')
                                    ->join('users','users.id_user','transaksi.user_id')->get();
    return view('transaksi.main', $data);
  }
  public function create(Request $request)
  {
    $data = array();
    $data['id'] = '';
    $data['edit'] = '';
    $data['customers'] = Customers::all();
    $data['users'] = Users::all();
    $data['data'] = null;

    return view('transaksi.add', $data);
  }
  public function edit(Request $request)
  {

    $data = array();
    $data['id'] = $request->id;
    $data['edit'] = 'true';
    $data['customers'] = Customers::all();
    $data['users'] = Users::all();
    $data['data'] = Transaksi::find($request->id);

    if ($data) {
      return view('transaksi.add', $data);
    }
  }

  public function store(Request $request)
  {
    if ($request->edit == 'false') {
      $newdata = new Transaksi;
    } else {
      $newdata = Transaksi::find($request->id);
      if ($newdata) {
        // code...
      } else {
        $newdata = new Transaksi;
      }
    }
    $newdata->customer_id = $request->customer_id;
    $newdata->kode_invoice = 'INV00'.$newdata->customer_id;
    $newdata->tanggal_order = $request->tanggal_order;
    $newdata->batas_waktu = $request->batas_waktu;
    $newdata->tanggal_bayar = $request->tanggal_bayar;
    $newdata->biaya_tambahan = $request->biaya_tambahan;
    $newdata->status_laundry = $request->status_laundry;
    $newdata->status_bayar = $request->status_bayar;
    $newdata->user_id = $request->user_id;
    $newdata->save();
    if ($newdata) {
      return Redirect::route('transaksi');
    }
    return 'false';
  }
  public function show(Request $request)
  {
    $id = $request->id;
    $data['data'] = Transaksi::where('id_transaksi', $id)
                    ->leftJoin('customers','customers.id_customer','transaksi.customer_id')
                    ->join('users','users.id_user','transaksi.user_id')
                    ->first();
    return view('transaksi.show', $data);
  }
  public function destroy(Request $request)
  {
   // $id = $request->id;
    $data = Transaksi::find($request->id);
    if ($data) {
      $data->delete();
      return Redirect::route('transaksi')->with('message', 'State saved correctly!!!');
    }
    return 'false';
  }
}
