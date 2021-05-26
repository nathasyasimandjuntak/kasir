@extends('layout.app')
@section('judul','Customers')
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
          <h3 class="box-title">Tambah Customer</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('customersStore')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- text input -->
            <input type="hidden" name="id" value="{{$id}}"/>
            <input type="hidden" name="edit" id="edit" value="{{$edit}}"/>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" value="@if ($edit == 'true' && !empty($edit)) {{$data->nama_customer}}@endif" name="nama_customer" placeholder="Nama"/>
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat">@if ($edit == 'true' && !empty($edit)) {{$data->alamat}}@endif
              </textarea>
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select value="@if ($edit == 'true' && !empty($edit)) {{$data->jenis_kelamin}} @endif" name="jenis_kelamin" class="form-control">
                <option value="">.:: Pilih Jenis Kelamin ::.</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" class="form-control" value="@if ($edit == 'true' && !empty($edit)) {{$data->telepon}}@endif" name="telepon" placeholder="Telepon"/>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <select name="keterangan" value="@if ($edit == 'true' && !empty($edit)) {{$data->keterangan}} @endif" class="form-control">
                <option value="">.:: Pilih Keterangan ::.</option>
                <option value="Member">Member</option>
                <option value="Non Member">Non Member</option>
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
