@extends('admin.layout.main')
@section('keterangan','Add Produk')
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Produk</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('barangStore')}}" data-toggle="validator" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="id" id="id" value="{{ $id }}">
             <input type="hidden" name="edit" id="edit" value="{{ $edit }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk *</label>
                            <input name="nama_barang" value="@if($edit == 'true' && !empty($data)) {{ $data->nama_barang }} @endif" type="text" class="form-control" placeholder="Masukan Nama Produk" data-errors="Masukan Nama Produk." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Produk *</label>
                            <input name="kode_barang" type="text" class="form-control" placeholder="Masukan Kode Produk" data-errors="Masukan Kode Produk." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Beli *</label>
                            <input name="harga_beli" type="text" class="form-control" placeholder="Masukan Harga Beli" data-errors="Masukan Harga Beli." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Jual *</label>
                            <input name="harga_jual" type="text" class="form-control" placeholder="Masukan Harga Jual" data-errors="Masukan Harga Jual." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok *</label>
                            <input name="stok" type="text" class="form-control" placeholder="Enter Stok" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="photo">Foto</label>
                          <input class="form-control" name="img" type="file" accept="image/*" onchange="preview_image(event)">
                          <div class="clearfix" style="margin:5px 0;"></div>
                          <div class="" style="margin:0 auto;">
                            @if($edit == 'true' && !empty($data))
                              @if (!empty($data->foto))
                                <img id="output_image" src="{{ \URL::to('/').'/'.$data->foto }}"/ width="150px">
                              @else
                                <img id="output_image"/ width="150px">
                              @endif
                            @else
                              <img id="output_image"/ width="150px">
                            @endif
                          </div>
                        </div>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim Data</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
