@extends('admin.layout.main')
@section('keterangan','Add Pegawai')
@section('content')
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Pegawai</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('pegawaiStore')}}" data-toggle="validator" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Pegawai *</label>
                            <input name="nama" type="text" class="form-control" placeholder="Masukan Nama Pegawai" data-errors="Masukan Nama Pegawai." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin *</label>
                            <select  value="jenis_kelamin" class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">.:: Jenis Kelamin ::.</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                          </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" type="text" class="form-control" placeholder="Masukan Alamat" data-errors="Masukan Alamat." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username Pegawai *</label>
                            <select  value="user_id" class="form-control" name="user_id" id="user_id">
                                <option value="">.:: Username ::.</option>
                                <?php foreach ($users as $user) : ?>
                                <option value="{{$user->id_user}}">{{$user->username}}</option>
                                <?php endforeach ?>
                                
                          </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <input name="tanggal_lahir" type="date" class="form-control" placeholder="Masukan Tanggal Lahir" data-errors="Masukan Tanggal Lahir." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim Data</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
