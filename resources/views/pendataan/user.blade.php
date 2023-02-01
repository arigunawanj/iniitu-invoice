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
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
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
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                  Customer</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                              class="bx bx-user"></i></span>
                                      <input type="text" class="form-control" id="basic-icon-default-fullname"
                                          placeholder="Masukkan Nama..." aria-label="John Doe"
                                          aria-describedby="basic-icon-default-fullname2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                  Customer</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-company2" class="input-group-text"><i
                                              class="bx bx-buildings"></i></span>
                                      <input type="text" id="basic-icon-default-company" class="form-control"
                                          placeholder="Masukkan Kode Customer..." aria-label="ACME Inc."
                                          aria-describedby="basic-icon-default-company2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Alamat
                                  Customer</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                      <input type="text" id="basic-icon-default-email" class="form-control"
                                          placeholder="Masukkan Alamat..." aria-label="john.doe"
                                          aria-describedby="basic-icon-default-email2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label class="col-sm-2 form-label" for="basic-icon-default-phone">Telepon
                                  Customer</label>
                              <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-phone2" class="input-group-text"><i
                                              class="bx bx-phone"></i></span>
                                      <input type="text" id="basic-icon-default-phone"
                                          class="form-control phone-mask" placeholder="Masukkan Telepon..."
                                          aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Send</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                  </button>
                  <button type="button" class="btn btn-primary">Save changes</button>
              </div>
          </div>
      </div>
  </div>
  {{-- MODAL CLOSE --}}
    </div>
@endsection
