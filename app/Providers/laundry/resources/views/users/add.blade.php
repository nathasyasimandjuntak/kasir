@extends('layout.app')
@section('judul','Users')
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
          <h3 class="box-title">Tambah Users</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('usersStore')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- text input -->
            <input type="hidden" name="id" value="{{$id}}"/>
            <input type="hidden" name="edit" id="edit" value="{{$edit}}"/>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" value="@if ($edit == 'true' && !empty($edit)) {{$data->nama}} @endif" class="form-control" name="nama" placeholder="Nama Users"/>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" value="@if ($edit == 'true' && !empty($edit)) {{$data->username}} @endif" class="form-control" name="username" placeholder="Username"/>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" value="@if ($edit == 'true' && !empty($edit)) {{$data->password}} @endif" class="form-control" name="password" placeholder="Password"/>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select value="@if ($edit == 'true' && !empty($edit)) {{$data->role}} @endif" name="role" class="form-control">
                <option value="" selected disabled>.:: Pilih Role ::.</option>
                <option value="1">Admin</option>
                <option value="2">Kasir</option>
                <option value="3">Owner</option>
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
