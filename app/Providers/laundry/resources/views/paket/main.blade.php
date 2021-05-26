@extends('layout.app')
@section('judul','Paket')
@section('ket','Data Paket')
@section('content')
  <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Paket</h3> <br><br>
          <a href="{{route('paketCreate')}}" class="btn btn-success btn-sm">+ Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paket as $pak)
                <tr>
                  <td>{{$pak->nama_paket}}</td>
                  <td>Rp. {{number_format($pak->harga)}}</td>
                  <td>
                    <a href="{{url('admin/paket/edit/'.$pak->id_paket)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('admin/paket/show/'.$pak->id_paket)}}" class="btn btn-warning">Show</a>
                    <a href="{{url('admin/paket/destroy/'.$pak->id_paket)}}" class="btn btn-danger">Hapus</a>
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
