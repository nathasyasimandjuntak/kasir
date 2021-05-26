@extends('layout.app')
@section('judul','User')
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
          <h3 class="box-title">Show User</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" value="{{$data->nama}}" readonly/>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" value="{{$data->username}}" readonly/>
            </div>
            <div class="form-group">
              <label>Role</label>
              <input type="text" class="form-control" value="@if ($data->role == 1) Admin @endif @if ($data->role == 2) Kasir @endif @if ($data->role == 3) Owner  @endif" readonly/>
            </div>
            <a href="{{route('users')}}" type="submit" class="btn btn-primary">kembali</a>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection
