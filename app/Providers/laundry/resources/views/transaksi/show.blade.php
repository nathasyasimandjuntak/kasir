@extends('layout.app')
@section('judul','Transaksi')
@section('ket','Show Data')
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
          <h3 class="box-title">Show Transaksi</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label>Kode Invoice</label>
              <input type="text" class="form-control" value="{{$data->kode_invoice}}" readonly/>
            </div>
            <div class="form-group">
              <label>Nama Customer</label>
              <input type="text" class="form-control" value="{{$data->nama_customer}}" readonly/>
            </div>
            <div class="form-group">
              <label>Tanggal Order</label>
              <input type="date" class="form-control" value="{{$data->tanggal_order}}" readonly/>
            </div>
            <div class="form-group">
              <label>Batas Waktu</label>
              <input type="text" class="form-control" value="{{$data->batas_waktu}} hari" readonly/>
            </div>
            <div class="form-group">
              <label>Tanggal Bayar</label>
              <input type="date" class="form-control" value="{{$data->tanggal_bayar}}" readonly/>
            </div>
            <div class="form-group">
              <label>Biaya Tambahan</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->biaya_tambahan)}}" readonly/>
            </div>
            <div class="form-group">
              <label>Status Cucian</label>
              <input type="text" class="form-control" value="{{$data->status_laundry}}" readonly/>
            </div>
            <div class="form-group">
              <label>Status Pembayaran</label>
              <input type="text" class="form-control" value="{{$data->status_bayar}}" readonly/>
            </div>
            <div class="form-group">
              <label>Usher</label>
              <input type="text" class="form-control" value="{{$data->nama}}" readonly/>
            </div>
            <a href="{{route('detail')}}" type="submit" class="btn btn-primary">kembali</a>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
