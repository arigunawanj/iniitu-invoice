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
                        <div class="card-body text-center">
                            <div class="d-flex align-items-start align-items-sm-center">
                                <div class="button-wrapper">
                                    <h3 class="text-muted">Ari Gunawan Jatmiko</h3>
                                </div>
                            </div>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('isi/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-buildings'></i> Jl. Moch Juki</p>
                                </div>
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-envelope' ></i> arigunawanjatmiko@gmail.com</p>
                                </div>
                                <div class="button-wrapper">
                                    <p class="text-muted mb-5"><i class='bx bx-phone' ></i> +62 857 </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <div class="button-wrapper">
                                    <a href="" class="btn btn-outline-primary mt-3"><i class='bx bxs-user-plus' ></i> Tambah Profil</a>
                                </div>
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

        {{-- ISI MODAL DISINI --}}
    </div>
@endsection
