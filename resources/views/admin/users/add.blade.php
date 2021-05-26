@extends('admin.layout.main')
@section('keterangan','Add User')
@section('content')
  <div class="col-sm-3">

  </div>
<div class="col-sm-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah User</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('usersStore')}}" data-toggle="validator" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username *</label>
                            <input name="username" type="text" class="form-control" placeholder="Masukan Username" data-errors="Masukan Username." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email *</label>
                            <input name="email" type="email" class="form-control" placeholder="Masukan Email" data-errors="Masukan Email." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password *</label>
                            <input name="password" type="password" class="form-control" placeholder="Masukan Password" data-errors="Masukan Password." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Role *</label>
                        <select class="form-control" name="role">
                          <option value="" selected>.:: Roles ::.</option>
                          <option value="1">Admin</option>
                          <option value="2">Kasir</option>
                          <option value="3">Owner</option>
                        </select>
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
