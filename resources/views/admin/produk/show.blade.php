@extends('admin.layout.main')
@section('keterangan','Show Produk ')
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
            </div>
        </div>
        <div class="card-body">
            <form action="" data-toggle="validator" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk *</label>
                            <input name="nama_barang" type="text" class="form-control" value="{{$barang->nama_barang}}" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Beli *</label>
                            <input name="harga_beli" type="text" class="form-control" value="Rp, {{number_format($barang->harga_beli)}}" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Barang *</label>
                            <input name="kode_barang" type="text" class="form-control" value="{{$barang->jenis_barang}}" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Jual *</label>
                            <input name="harga_jual" type="text" class="form-control" value="Rp. {{number_format($barang->harga_jual)}}" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Produk *</label>
                            <input name="kode_barang" type="text" class="form-control" value="{{$barang->kode_barang}}" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Stok *</label>
	                            <input name="stok" type="text" class="form-control" value="{{$barang->stok}}"required>
	                            <div class="help-block with-errors"></div>
	                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
			              <label>Foto Kamar *</label>
			              @if (!empty($barang->foto))
			                <br>
			                <img src="{{url('/')}}/{{ $barang->foto }}" alt="" width="100%">
			              @else
			                <input type="text" class="form-control" value="Tidak Ada Foto" readonly>
			              @endif
                    </div>
                </div>

                </div>
                <a href="{{route('barang')}}" class="btn btn-primary mr-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
