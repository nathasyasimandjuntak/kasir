@extends('admin.layout.main')
@section('keterangan','Produk')
@section('content')
<div class="col-lg-12">
    <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-3">List Produk</h4>
            <p class="mb-0">Produk yang tertera adalah produk yang tersedia di gudang.</p>
        </div>
        <a href="{{route('barangCreate')}}" class="btn btn-primary add-list"><i class="fas fa-plus"></i>Add Product</a>
    </div>
</div>
<div class="col-lg-12">
    <div class="table-responsive rounded mb-3">
    <table class="data-table table mb-0 tbl-server-info">
        <thead class="bg-white text-uppercase">
            <tr class="ligth ligth-data">
                <th>
                    <div class="checkbox d-inline-block">
                        <input type="checkbox" class="checkbox-input" id="checkbox1">
                        <label for="checkbox1" class="mb-0"></label>
                    </div>
                </th>
                <th>Produk</th>
                <th>Kode Produk</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($barang as $brg)
          <tbody class="ligth-body">
              <tr>
                  <td>
                      <div class="checkbox d-inline-block">
                          <input type="checkbox" class="checkbox-input" id="checkbox2">
                          <label for="checkbox2" class="mb-0"></label>
                      </div>
                  </td>
                  <td>
                      <div class="d-flex align-items-center">
                          <img src="{{url('/')}}/{{ $brg->foto }}" class="img-fluid rounded avatar-50 mr-3" alt="image">

                      </div>
                  </td>
                  <td>{{$brg->kode_barang}}</td>
                  <td>{{$brg->nama_barang}}</td>
                  <td>Rp. {{number_format($brg->harga_beli)}}</td>
                  <td>Rp. {{number_format($brg->harga_jual)}}</td>
                  <td>{{$brg->stok}}</td>
                  <td>
                      <div class="d-flex align-items-center list-action">
                          <a type="button" href="{{route('barangShow', $brg->id_barang)}}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                              href="#"><i class="ri-eye-line mr-0"></i></a>
                          <a type="" href="{{route('barangCreate', $brg->id_barang)}}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                              href="#"><i class="ri-pencil-line mr-0"></i></a>
                          <a href="" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                              href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                      </div>
                  </td>
              </tr>
          </tbody>
        @endforeach

    </table>
    </div>
</div>
@endsection
