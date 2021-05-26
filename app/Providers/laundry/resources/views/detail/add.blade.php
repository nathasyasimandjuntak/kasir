@extends('layout.app')
@section('judul','Detail')
@section('ket','Tambah Data')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-2">

    </div>
    <!-- right column -->
    <div class="col-md-8">
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Tambah Detail</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('detailStore')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- text input -->
          <input type="hidden" name="id" value="{{$id}}"/>
            <input type="hidden" name="edit" value="{{$edit}}" id="edit"/>
            <div class="form-group">
              <label>Kode Invoice</label>
              <select name="transaksi_id" class="form-control">
                <option value="" selected disabled>.:: Pilih Invoice ::.</option>
                @foreach ($transaksi as $trs)
                  <option value="{{$trs->id_transaksi}}" @if ($edit == 'true' && !empty($edit)) @if ($trs->id_transaksi == $data->transaksi_id) selected @endif @endif>{{$trs->kode_invoice}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Paket Cucian</label>
              <select name="paket_id" class="form-control">
                <option value="" selected disabled>.:: Pilih Paket ::.</option>
                @foreach ($paket as $pak)
                  <option value="{{$pak->id_paket}}" @if ($edit == 'true' && !empty($edit)) @if ($pak->id_paket == $data->paket_id) selected @endif @endif>{{$pak->nama_paket}} | {{$pak->harga}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Cucian</label>
              <input type="text" class="form-control" value="@if ($edit == 'true' && !empty($edit)){{$data->jenis}} @endif" name="jenis" placeholder="Jenis Cucian"/>
            </div>
            <div class="form-group">
              <label>Berat</label>
              <input type="text" class="form-control" value="@if ($edit == 'true' && !empty($edit)){{$data->jumlah}} @endif" name="jumlah" placeholder="Berat/Kg"/>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
