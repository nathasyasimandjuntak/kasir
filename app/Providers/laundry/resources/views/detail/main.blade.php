@extends('layout.app')
@section('judul','Detail')
@section('ket','Data Detail')
@section('content')
  <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Detail</h3> <br><br>
          <a href="{{route('detailCreate')}}" class="btn btn-success btn-sm">+ Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Invoice</th>
                <th>Paket</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Diskon</th>
                <th>Biaya Tambahan</th>
                <th>Total Bayar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detail as $det)
                <tr>
                  <td>{{$det->kode_invoice}}</td>
                  <td>{{$det->nama_paket}}</td>
                  <td>{{$det->jenis}}</td>
                  <td>{{$det->jumlah}}</td>
                  <td>Rp. {{number_format($det->diskon)}}</td>
                  <td>Rp. {{number_format($det->biaya_tambahan)}}</td>
                  <td>Rp. {{number_format($det->total_bayar)}}</td>
                  <td>{{$det->keterangan}}</td>
                  <td>
                    <a href="{{url('admin/detail/edit/'.$det->id_detail)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('admin/detail/show/'.$det->id_detail)}}" class="btn btn-warning">Show</a>
                    <a href="{{url('admin/detail/destroy/'.$det->id_detail)}}" class="btn btn-danger">Hapus</a>
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
