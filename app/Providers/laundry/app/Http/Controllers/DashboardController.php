<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, DB, Hash, File, Validator, Session, Auth;
use App\Models\Detail;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
      return view('dashboard.main');
    }
    public function unduh_invoice(Request $request)
    {
      $data = array();
      $data['data'] = Detail::leftjoin('transaksi','transaksi.id_transaksi','detail.transaksi_id')
                    ->join('paket','paket.id_paket','detail.paket_id')->sum('detail.total_bayar');
      $detail = Detail::all();
      $data = [
        'detail'=>$detail->count(),
        // sum(total_bayar)
      ];
      $detail = Detail::all()->sum('total_bayar');
      $data['tot'] = $detail;

      return view('dashboard.add', $data);
    }


}
