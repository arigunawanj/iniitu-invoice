@extends('layouts.template')

@section('title', 'Profil')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil /</span> Detail Profil</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card border border-warning mb-4">
                        <h5 class="card-header">Detail Profil</h5>
                        <!-- Account -->
                        @foreach ($profil as $item)
                        <div class="card-body text-center">
                            <div class="d-flex align-items-start align-items-sm-center">
                                <div class="button-wrapper">
                                    <h3 class="text-muted">{{ $item->nama }}</h3>
                                </div>
                            </div>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('storage/'. $item->foto) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-buildings'></i> {{ $item->alamat }}</p>
                                </div>
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-envelope' ></i> arigunawanjatmiko@gmail.com</p>
                                </div>
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-phone' ></i> {{ $item->tanggal_lahir }}</p>
                                </div>
                            </div>
                            @endforeach
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if (DB::table('profils')->where('user_id', Auth::user()->id)->exists())
                                        <div class="button-wrapper">
                                            <a class="btn btn-outline-warning mt-3" data-bs-toggle="modal"
                                            data-bs-target="#editProfil{{ Auth::user()->id }}"><i class='bx bxs-user-plus' ></i> Edit Profil</a>
                                        </div>
                                    @else
                                        <div class="button-wrapper">
                                            <a class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                            data-bs-target="#tambahProfil"><i class='bx bxs-user-plus'></i> Tambah Profil</a>
                                        </div>
                                    @endif
                                    <div class="button-wrapper">
                                        <a href="" class="btn btn-outline-danger mt-3"><i class='bx bxs-edit' ></i> Ganti Password</a>
                                    </div>
                                </div>
                        </div>
                        <!-- /Account -->
                    </div>

                </div>
            </div>
        </div>

        
    @foreach ($profil as $item)
    <div class="modal fade" id="editProfil{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('profil.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" name="nama" id="basic-icon-default-fullname"
                                            placeholder="Masukkan Nama..." aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" value="{{ $item->nama }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Alamat</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text">
                                          <i class="bx bx-envelope"></i></span>
                                        <input type="text" id="basic-icon-default-company" name="alamat" class="form-control"
                                            placeholder="Masukkan Alamat..." aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" value="{{ $item->alamat }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-key' ></i></span>
                                        <input type="date" id="basic-icon-default-email" name="tanggal_lahir" class="form-control"
                                            placeholder="Masukkan Password..." aria-label="john.doe"
                                            aria-describedby="basic-icon-default-email2" value="{{ $item->tanggal_lahir }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Foto</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-key' ></i></span>
                                        <input type="file" id="basic-icon-default-email" name="foto" class="form-control"
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
                          <button type="submit" class="btn btn-primary">Ubah Data</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL CLOSE --}}
        @endforeach

        <!-- Modal -->
    <div class="modal fade" id="tambahProfil" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" name="nama" id="basic-icon-default-fullname"
                                            placeholder="Masukkan Nama..." aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Alamat</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text">
                                          <i class="bx bx-envelope"></i></span>
                                        <input type="text" id="basic-icon-default-company" name="alamat" class="form-control"
                                            placeholder="Masukkan Alamat..." aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-key' ></i></span>
                                        <input type="date" id="basic-icon-default-email" name="tanggal_lahir" class="form-control"
                                            placeholder="Masukkan Password..." aria-label="john.doe"
                                            aria-describedby="basic-icon-default-email2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Foto</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-key' ></i></span>
                                        <input type="file" id="basic-icon-default-email" name="foto" class="form-control"
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
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL CLOSE --}}
        {{-- ISI MODAL DISINI --}}
    </div>
@endsection
