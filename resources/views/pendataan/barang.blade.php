@extends('layouts.template')

@section('title', 'Data Barang')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Data Barang</h4>
            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Data Barang</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Harga Dollar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->harga_dollar }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#editData{{ $item->id }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#delData{{ $item->id }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- MODAL EDIT --}}
                                <div class="modal fade" id="editData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Ubah Data Barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('barang.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label"
                                                                for="basic-icon-default-fullname">Nama
                                                                Barang</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-fullname2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-user"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="basic-icon-default-fullname"
                                                                        placeholder="Masukkan Nama..." name="nama_barang"
                                                                        value="{{ $item->nama_barang }}"
                                                                        aria-describedby="basic-icon-default-fullname2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label"
                                                                for="basic-icon-default-company">Kode
                                                                Barang</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-company2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-buildings"></i></span>
                                                                    <input type="text" id="basic-icon-default-company"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Kode Barang..."
                                                                        name="kode_barang" value="{{ $item->kode_barang }}"
                                                                        aria-describedby="basic-icon-default-company2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 form-label"
                                                                for="basic-icon-default-phone">Harga Barang</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-phone2"
                                                                        class="input-group-text">
                                                                        <i class="bx bx-phone"></i></span>
                                                                    <input type="text" id="basic-icon-default-phone"
                                                                        class="form-control phone-mask"
                                                                        placeholder="Masukkan Harga..."
                                                                        value="{{ $item->harga }}" name="harga"
                                                                        aria-describedby="basic-icon-default-phone2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 form-label"
                                                                for="basic-icon-default-phone">Harga Dollar</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-phone2"
                                                                        class="input-group-text">
                                                                        <i class="bx bx-phone"></i></span>
                                                                    <input type="text" id="basic-icon-default-phone"
                                                                        class="form-control phone-mask"
                                                                        placeholder="Masukkan Harga Dollar..."
                                                                        value="{{ $item->harga_dollar }}"
                                                                        name="harga_dollar"
                                                                        aria-describedby="basic-icon-default-phone2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                                <h5 class="modal-title" id="modalCenterTitle">Hapus Data Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <div>
                                        Apa anda yakin ingin menghapus?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Delete</button>
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
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                    Barang</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            placeholder="Masukkan Nama..." name="nama_barang"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                    Barang</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Masukkan Kode Barang..." name="kode_barang"
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Harga Barang</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text">
                                            <i class="bx bx-phone"></i></span>
                                        <input type="text" id="basic-icon-default-phone"
                                            class="form-control phone-mask" placeholder="Masukkan Harga..."
                                            name="harga" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Harga Dollar</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text">
                                            <i class="bx bx-phone"></i></span>
                                        <input type="text" id="basic-icon-default-phone"
                                            class="form-control phone-mask" placeholder="Masukkan Harga Dollar..."
                                            name="harga_dollar" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    {{-- MODAL CLOSE --}}
    </div>
@endsection
