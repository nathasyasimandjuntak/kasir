<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Transaksi;
use App\Models\Paket;
use Redirect, DB, Hash, File, Validator, Session, Auth;
class DetailController extends Controller
{
  public function index()
  {
    $data = array();
    $data['detail'] = Detail::leftJoin('transaksi','transaksi.id_transaksi','detail.transaksi_id')
                              ->join('paket','paket.id_paket','detail.paket_id')->get();
    return view('detail.main', $data);
  }
  public function create(Request $request)
  {
    $data = array();
    $data['id'] = '';
    $data['edit'] = '';
    $data['transaksi'] = Transaksi::all();
    $data['paket'] = Paket::all();
    $data['data'] = null;


    return view('detail.add', $data);
  }
  public function edit(Request $request)
  {
    $data = array();
    $data['id'] = $request->id;
    $data['edit'] = 'true';
    $data['transaksi'] = Transaksi::all();
    $data['paket'] = Paket::all();
    $data['data'] = Detail::find($request->id);

    if ($data) {
      // code...
      return view('detail.add', $data);
    }
  }

  public function store(Request $request)
  {
    if ($request->edit == 'false') {
      $newdata = new Detail;
    } else {
      $newdata = Detail::find($request->id);
      if ($newdata) {
        // code...
      } else {
        $newdata = new Detail;
      }
    }
    // return $request->all();
    $newdata->transaksi_id = $request->transaksi_id;
    $newdata->paket_id = $request->paket_id;
    $newdata->jenis = $request->jenis;
    $newdata->jumlah = $request->jumlah;
    $trs = Paket::where('id_paket', $request->paket_id)->first();
    $hrg = $trs->harga;
    $total = $hrg * $newdata->jumlah;
    if ($total > 30000) {
      $newdata->diskon = (5 / 100) * $total;
    } if ($total > 40000) {
      $newdata->diskon = (10 / 100) * $total;
    } if ($total > 50000) {
      $newdata->diskon = (15 / 100) *$total;
    } if ($total < 25000) {
      $newdata->diskon = 0;
    }
    $trans = Transaksi::where('id_transaksi', $request->transaksi_id)->first();
    $tambah = $trans->biaya_tambahan;
    $newdata->total_bayar = ($total - $newdata->diskon) + $tambah;
    if ($total < 25000) {
      $newdata->keterangan = 'Tidak Dapat Diskon';
    } else {
      $newdata->keterangan = 'Dapat Diskon';
    }
    $newdata->save();
    if ($newdata) {
      return Redirect::route('detail');
    }
    return 'false';
  }
  public function show(Request $request)
  {
    $id = $request->id;
    $data['data'] = Detail::where('id_detail',$id)
                    ->leftJoin('transaksi','transaksi.id_transaksi','detail.transaksi_id')
                    ->join('paket','paket.id_paket','detail.paket_id')->first();
    return view('detail.show', $data);
  }
  public function destroy(Request $request)
  {
    $data = Detail::find($request->id);
    if ($data) {
      $data->delete();
      return Redirect::route('detail');
    }
  }
}
