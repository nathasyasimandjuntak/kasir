@extends('layout.app')
@section('judul','Paket')
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
          <h3 class="box-title">Tambah Paket</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('paketStore')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- text input -->
            <input type="hidden" name="id" value="id" name="{{$id}}"/>
            <input type="hidden" name="edit" value="edit" id="edit" name="{{$edit}}"/>
            <div class="form-group">
              <label>Nama Paket</label>
              <input type="text" value="@if ($edit == 'true' && !empty($edit)) {{$data->nama_paket}} @endif" class="form-control" name="nama_paket" placeholder="Nama Paket"/>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" value="@if ($edit == 'true' && !empty($edit)) {{$data->harga}} @endif" class="form-control" name="harga" placeholder="Harga"/>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
