@extends('layout.app')
@section('judul','Paket')
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
          <h3 class="box-title">Show Paket</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama Paket</label>
              <input type="text" class="form-control" value="{{$data->nama_paket}}" readonly/>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" value="Rp. {{number_format($data->harga)}}" readonly/>
            </div>
            <a href="{{route('paket')}}" type="submit" class="btn btn-primary">kembali</a>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
