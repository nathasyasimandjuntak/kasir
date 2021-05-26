@extends('layout.app')
@section('judul','Users')
@section('ket','Data Users')
@section('content')
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Users</h3> <br><br>
            <a href="{{route('usersCreate')}}" class="btn btn-success btn-sm">+ Tambah Data</a>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $usr)
                  <tr>
                    <td>{{$usr->nama}}</td>
                    <td>{{$usr->username}}</td>
                    @if ($usr->role == '1')
                      <td>Admin</td>
                    @elseif ($usr->role == '2')
                      <td>Kasir</td>
                    @else
                      <td>Owner</td>
                    @endif
                    <td>
                      <a href="{{url('admin/users/edit/'.$usr->id_user)}}" class="btn btn-primary">Edit</a>
                      <a href="{{url('admin/users/show/'.$usr->id_user)}}" class="btn btn-warning">Show</a>
                      <a href="{{url('admin/users/destroy/'.$usr->id_user)}}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              {{-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </tfoot> --}}
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
  @endsection
