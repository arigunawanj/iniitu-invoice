@extends('layouts.template')

@section('title', 'Data Pengguna')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Data Pengguna</h4>
            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Data Pengguna</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn rounded-pill btn-icon btn-outline-info" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#editData"><i
                                                class="bx bx-edit-alt"></i></a>
                                        <a class="btn rounded-pill btn-icon btn-outline-danger" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#delData"><i
                                                class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
        <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Tambah Data Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <form>
                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Username</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                              class="bx bx-user"></i></span>
                                      <input type="text" class="form-control" id="basic-icon-default-fullname"
                                          placeholder="Masukkan username..." aria-label="John Doe"
                                          aria-describedby="basic-icon-default-fullname2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Email</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-company2" class="input-group-text">
                                        <i class="bx bx-envelope"></i></span>
                                      <input type="email" id="basic-icon-default-company" class="form-control"
                                          placeholder="Masukkan Email..." aria-label="ACME Inc."
                                          aria-describedby="basic-icon-default-company2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Password</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span class="input-group-text"><i class='bx bx-key' ></i></span>
                                      <input type="password" id="basic-icon-default-email" class="form-control"
                                          placeholder="Masukkan Password..." aria-label="john.doe"
                                          aria-describedby="basic-icon-default-email2" />
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </form>
              </div>
          </div>
      </div>
  </div>
  {{-- MODAL CLOSE --}}
    </div>
@endsection
