@extends('layout.app')
@section('judul','Transaksi')
@section('ket','Data Transaksi')
@section('content')
  <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Transaksi</h3> <br><br>
          <a href="{{route('transaksiCreate')}}" class="btn btn-success btn-sm">+ Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Invoice</th>
                <th>Nama Customer</th>
                <th>Tanggal Order</th>
                <th>Tanggal Bayar</th>
                <th>Tambahan</th>
                <th>Status </th>
                <th>Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $trs)
                <tr>
                  <td>{{$trs->kode_invoice}}</td>
                  <td>{{$trs->nama_customer}}</td>
                  <td>{{$trs->tanggal_order}}</td>
                  <td>{{$trs->tanggal_bayar}}</td>
                  <td>Rp. {{number_format($trs->biaya_tambahan)}}</td>
                  <td>{{$trs->status_laundry}}</td>
                  <td>{{$trs->status_bayar}}</td>

                  <td>
                    @php
                      $id = $trs->id_transaksi;
                    @endphp
                    <a href="{{url('admin/transaksi/edit/'.$trs->id_transaksi)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('admin/transaksi/show/'.$trs->id_transaksi)}}" class="btn btn-warning">Show</a>
                    <a href="{{url('admin/transaksi/destroy/'.$trs->id_transaksi)}}" class="btn btn-danger">Hapus</a>
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
