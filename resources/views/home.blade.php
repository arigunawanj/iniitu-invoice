@extends('layouts.template')

@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('isi/assets/img/icons/unicons/chart-success.png') }}"
                                            alt="chart success" class="rounded" />
                                    </div>
                                    
                                </div>
                                <span class="fw-semibold d-block mb-1">Data Customer</span>
                                <h3 class="card-title mb-2">{{ $customer }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('isi/assets/img/icons/unicons/wallet-info.png') }}"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                    
                                </div>
                                <span class="fw-semibold d-block mb-1">Data Barang</span>
                                <h3 class="card-title mb-2">{{ $barang }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('isi/assets/img/icons/unicons/chart-success.png') }}"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                    
                                </div>
                                <span class="d-block mb-1">Penjualan Lokal</span>
                                <h3 class="card-title text-nowrap mb-2">{{ $penjualan }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('isi/assets/img/icons/unicons/cc-primary.png') }}"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                    
                                </div>
                                <span class="fw-semibold d-block mb-1">Penjualan Inter</span>
                                <h3 class="card-title mb-2">$14,857</h3>
                               
                            </div>
                        </div>
                    </div>
                    <!-- </div>
<div class="row"> -->
                   
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
