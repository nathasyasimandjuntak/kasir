@extends('layout.app')
@section('judul','Customers')
@section('ket','Data Customers')
@section('content')
  <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Customers</h3> <br><br>
          <a href="{{route('customersCreate')}}" class="btn btn-success btn-sm">+ Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $cus)
                <tr>
                  <td>{{$cus->nama_customer}}</td>
                  <td>{{$cus->alamat}}</td>
                  <td>{{$cus->jenis_kelamin}}</td>
                  <td>{{$cus->telepon}}</td>
                  <td>{{$cus->keterangan}}</td>
                  <td>
                    @php
                      $id = $cus->id_customer;
                    @endphp
                    <a href="{{url('/admin/customers/edit/'.$id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('/admin/customers/show/'.$id)}}" class="btn btn-warning">Show</a>
                    <a href="{{url('admin/customers/destroy/'.$id)}}" class="btn btn-danger">Hapus</a>
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
