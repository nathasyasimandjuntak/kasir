@extends('layout.app')
@section('judul','Detail')
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
          <h3 class="box-title">Show Detail</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label>Kode Invoice</label>
              <input type="text" class="form-control" value="{{$data->kode_invoice}}" readonly/>
            </div>
            <div class="form-group">
              <label>Paket</label>
              <input type="text" class="form-control" value="{{$data->nama_paket}}" readonly/>
            </div>
            <div class="form-group">
              <label>Jenis Cucian</label>
              <input type="text" class="form-control" value="{{$data->jenis}}" readonly/>
            </div>
            <div class="form-group">
              <label>Berat/kg</label>
              <input type="text" class="form-control" value="{{$data->jumlah}} kg" readonly/>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->harga)}}" readonly/>
            </div>
            <div class="form-group">
              <label>Diskon</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->diskon)}}" readonly/>
            </div>
            <div class="form-group">
              <label>Biaya Tambahan</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->biaya_tambahan)}}" readonly/>
            </div>
            <div class="form-group">
              <label>Tagihan</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->total_bayar)}}" readonly/>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" value="{{$data->keterangan}}" readonly/>
            </div>
            <a href="{{route('detail')}}" type="submit" class="btn btn-primary">kembali</a>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
