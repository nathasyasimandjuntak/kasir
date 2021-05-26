@extends('admin.layout.main')
@section('keterangan','Pegawai')
@section('content')
  <div class="col-lg-12">
      <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
          <div>
              <h4 class="mb-3">Daftar Pegawai</h4>
              <p class="mb-0">List Pegawai yang resmi terdaftar. </p>
          </div>
      </div>
  </div>
  <div class="col-lg-12">
      <div class="table-responsive rounded mb-3">
      <table class="data-table table mb-0 tbl-server-info">
          <thead class="bg-white text-uppercase">
              <tr class="ligth ligth-data text-center">
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tahun Kepegawaian</th>
                  <th>Username</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody class="ligth-body">
            <?php foreach ($pegawai as $pgw): ?>
              <tr class="text-center">
                  <td>{{$pgw->nama}}</td>
                  <td>{{$pgw->jenis_kelamin}}</td>
                  <td>{{$pgw->tahun_kepegawaian}}</td>
                  <td>{{$pgw->username}}</td>
                  <td>
                      <div class="d-flex align-items-center list-action">
                          <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                              href="#"><i class="ri-eye-line mr-0"></i></a>
                          <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                              href="#"><i class="ri-pencil-line mr-0"></i></a>
                          <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                              href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                      </div>
                  </td>
              </tr>
            <?php endforeach ?>
          </tbody>
      </table>
      </div>
  </div>
@endsection
