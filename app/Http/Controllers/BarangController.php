<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Auth,Redirect,File,DB, Validator, Session, Hash;

class BarangController extends Controller
{
    public function index()
    {
      $data = array();
      $data['barang'] = Barang::all();
      return view('admin.produk.main', $data);
    }

    public function create(Request $request){
      $data = array();
      $data['edit'] = '';
      $data['id'] = '';
      $data['barang'] = Barang::all();

      if (isset($request->edit) && !empty($request->edit) && !empty($request->id)) {
        if ($request->edit == 'edit') {
          $data['id'] = $request->id;
          $data['edit'] = 'true';
          $data['data'] = Barang::find($request->id);
        }
      }else {
        $data['edit'] = 'false';
      }

      return view('admin.produk.add',$data);
    }
    public function store(Request $request)
    {
      if ($request->edit=='false') {
        $newdata = new Barang;
      } else {
        $newdata = Barang::find($request->id);
        if ($newdata) {
          //
        }else {
          $newdata = new Barang;
        }
      }


      $newdata->kode_barang = $request->kode_barang;
      $newdata->nama_barang = $request->nama_barang;
      $newdata->harga_beli = $request->harga_beli;
      $newdata->harga_jual = $request->harga_jual;
      $newdata->stok = $request->stok;

      if (!empty($request->img)) {
        if ($request->edit=='true') {
          if ($newdata->foto != null) {
            if (is_file($newdata->foto)) {
              File::delete($newdata->foto);
            }
          }
        }
        $ext_foto       = $request->img->getClientOriginalExtension();
        $filename       = $request->nama_barang."-".date('YmdHis').".".$ext_foto;
        $temp_foto      = 'uploads/barang/';
        $proses         = $request->img->move($temp_foto, $filename);
        $newdata->foto  = $temp_foto.$filename;
      }
      $newdata->save();
      if ($newdata) {
        session()->flash('status', 'Task was successful!');
        session()->flash('type', 'success');
        return Redirect::route('barang');
      }
      return 'false';
    }

    public function show(Request $request)
    {
      $id = $request->id;
      $data['barang'] = Barang::where('id_barang',$id)->first();
      // $data['rekomendasi'] = Kamar::join('kelas','kelas.id_kelas','kamar.kelas_id')->get();

      return view('admin.produk.show', $data);
    }

    public function destroy(Request $request)
    {
      $data = Barang::find($request->id);
      if ($data) {
        $data->delete();
        return ['status' => 'success'];
      }
      return 'false';
    }
}
