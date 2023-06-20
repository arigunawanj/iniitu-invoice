@extends('layouts.template')

@section('title', 'Data Customer')
@section('content')

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Data Customer</h4>
        <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
        <a href="{{ route('customerexport') }}" class="btn btn-primary mb-3">Export Data</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Data Customer</h5>
            <div class="table-responsive">
                <table class="table" class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Customer</th>
                            <th>Nama Customer</th>
                            <th>Alamat Customer</th>
                            <th>Telepon Customer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($customer as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge rounded-pill bg-warning">{{ $item->kode_customer }}</span></td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->alamat_customer }}</td>
                            <td>{{ $item->telepon_customer }}</td>
                            <td>
                                <a class="btn rounded-pill btn-icon btn-outline-info" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editData{{ $item->id }}">
                                    <i class="bx bx-edit-alt"></i></a>
                                <a class="btn rounded-pill btn-icon btn-outline-danger" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delData{{ $item->id }}">
                                    <i class="bx bx-trash "></i></a>
                            
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Ubah Data Customer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('customer.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                                            Customer</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                                                    placeholder="Masukkan Nama..." name="nama_customer" value="{{ $item->nama_customer }}"
                                                                    aria-describedby="basic-icon-default-fullname2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                                            Customer</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-barcode'></i></span>
                                                                <input type="text" id="basic-icon-default-company" class="form-control"
                                                                    placeholder="Masukkan Kode Customer..." name="kode_customer" value="{{ $item->kode_customer }}"
                                                                    aria-describedby="basic-icon-default-company2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Alamat
                                                            Customer</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span class="input-group-text"><i class='bx bx-home'></i></span>
                                                                <input type="text" id="basic-icon-default-email" class="form-control"
                                                                    placeholder="Masukkan Alamat..." name="alamat_customer" value="{{ $item->alamat_customer }}"
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
                                                                    class="form-control phone-mask" placeholder="Masukkan Telepon..." value="{{ $item->telepon_customer }}"
                                                                    name="telepon_customer" aria-describedby="basic-icon-default-phone2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- MODAL CLOSE --}}
                        </div>

                        {{-- MODAL DELETE --}}
                        <div class="modal fade" id="delData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Hapus Data Customer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('customer.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus?
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- MODAL CLOSE --}}
                        </div>
                        @endforeach
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
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                        Customer</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                                placeholder="Masukkan Nama..." name="nama_customer"
                                                aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                        Customer</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-barcode'></i></span>
                                            <input type="text" id="basic-icon-default-company" class="form-control"
                                                placeholder="Masukkan Kode Customer..." name="kode_customer"
                                                aria-describedby="basic-icon-default-company2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Alamat
                                        Customer</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bx-home'></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control"
                                                placeholder="Masukkan Alamat..." name="alamat_customer"
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
                                                name="telepon_customer" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- MODAL CLOSE --}}
    </div>


@endsection
