@extends('layout.app')
@section('judul','Customers')
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
          <h3 class="box-title">Show Customer</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" value="{{$data->nama_customer}}" readonly/>
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat" readonly>{{$data->alamat}}
              </textarea>
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <input type="text" class="form-control" value="{{$data->jenis_kelamin}}" readonly/>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" class="form-control" value="{{$data->telepon}}" name="telepon" readonly/>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" value="{{$data->keterangan}}" name="telepon" readonly/>
            </div>
            <a href="{{route('customers')}}" type="submit" class="btn btn-primary">kembali</a>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
