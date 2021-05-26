@extends('layout.app')
@section('judul','Transaksi')
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
          <h3 class="box-title">Tambah Transaksi</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('transaksiStore')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- text input -->
            <input type="hidden" name="id" value="id" name="{{$id}}"/>
            <input type="hidden" name="edit" value="edit" id="edit" name="{{$edit}}"/>
            <div class="form-group">
              <label>Nama Customer</label>
              <select name="customer_id" class="form-control">
                <option value="" selected disabled>.:: Pilih Customer ::.</option>
                @foreach ($customers as $cus)
                  <option value="{{$cus->id_customer}}" @if ($edit == 'true' && !empty($edit)) @if ($cus->id_customer == $data->customer_id) selected @endif @endif>{{$cus->nama_customer}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Order</label>
              <input type="date" class="form-control" value="@if ($edit == 'true' && !empty($edit)){{$data->tanggal_order}} @endif" name="tanggal_order" placeholder="Tanggal Order"/>
            </div>
            <div class="form-group">
              <label>Batas Waktu</label>
              <input type="text" class="form-control" value="@if ($edit == 'true' && !empty($edit)){{$data->batas_waktu}} @endif" name="batas_waktu" placeholder="Batas Waktu"/>
            </div>
            <div class="form-group">
              <label>Tanggal Bayar</label>
              <input type="date" class="form-control" value="@if ($edit == 'true' && !empty($edit)){{$data->tanggal_bayar}} @endif" name="tanggal_bayar" placeholder="Tanggal Bayar"/>
            </div>
            <div class="form-group">
              <label>Biaya Tambahan</label>
              <select value="@if ($edit == 'true' && !empty($edit)) {{$data->biaya_tambahan}}@endif" name="biaya_tambahan" class="form-control">
                <option value="" selected disabled>.:: Pilih Tambahan ::.</option>
                  <option value="5000">Antar Ke Rumah | Rp. 5000</option>
                  <option value="3000">Tambah Parfum | Rp. 3000</option>
                  <option value="0">Tanpa Tambahan | Rp. 0</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Cucian</label>
              <select value="@if ($edit == 'true' && !empty($edit)) {{$data->status_laundry}}@endif" name="status_laundry" class="form-control">
                <option value="" selected disabled>.:: Pilih Status ::.</option>
                <option value="Baru">Baru</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
                <option value="Diambil">Diambil</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Pembayaran</label>
              <select value="@if ($edit == 'true' && !empty($edit)) {{$data->status_bayar}}@endif" name="status_bayar" class="form-control">
                <option value="" selected disabled>.:: Pilih Status ::.</option>
                <option value="Terbayar">Terbayar</option>
                <option value="Belum Terbayar">Belum Terbayar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Usher</label>
              <select name="user_id" class="form-control">
                <option value="" selected disabled>.:: Pilih Usher ::.</option>
                @foreach ($users as $ush)
                  <option value="{{$ush->id_user}}" @if ($edit == 'true' && !empty($edit)) @if ($ush->id_user == $data->user_id) selected @endif @endif>{{$ush->nama}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
