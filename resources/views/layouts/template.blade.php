<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Ini Itu | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('isi/assets/img/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('isi/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('isi/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('isi/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('isi/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('isi/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('isi/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('isi/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('isi/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/home" class="app-brand-link">
                        <img src="{{ asset('isi/assets/img/icons/iniitu.png') }}" width="15px" alt="logo" class="mb-2" srcset="">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">ini itu</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                @if (DB::table('profils')->where('user_id', Auth::user()->id)->exists())
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
                        <a href="/home" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
                        <a href="/user" class="menu-link">
                          <i class='menu-icon bx bx-user'></i>
                            <div data-i18n="Analytics">Data Pengguna</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pendataan</span>
                    </li>
                    <li class="menu-item {{ request()->is('customer') ? 'active' : '' }}">
                        <a href="/customer" class="menu-link">
                            <i class='menu-icon bx bxs-user-rectangle' ></i>
                            <div data-i18n="Analytics">Data Customer</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('barang') ? 'active' : '' }}">
                        <a href="/barang" class="menu-link">
                            <i class='menu-icon bx bxs-package'></i>
                            <div data-i18n="Analytics">Data Barang</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('penjualan') ? 'active' : '' }}">
                        <a href="/penjualan" class="menu-link">
                            <i class='menu-icon bx bxs-report'></i>
                            <div data-i18n="Analytics">Laporan Penjualan</div>
                        </a>
                    </li>
                    
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Faktur Lokal</span>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class='menu-icon bx bx-receipt'></i>
                            <div data-i18n="Extended UI">Faktur Lokal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('detail') ? 'active' : '' }}">
                                <a href="/detail" class="menu-link">
                                    <div data-i18n="Perfect Scrollbar">Tambah Data Faktur</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('faktur') ? 'active' : '' }}">
                                <a href="/faktur" class="menu-link">
                                    <div data-i18n="Text Divider">Faktur</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Faktur Inter</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class='menu-icon bx bxs-receipt'></i>
                            <div data-i18n="Extended UI">Faktur Inter</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('invoicedetail') ? 'active' : '' }}">
                                <a href="/invoicedetail" class="menu-link">
                                    <div data-i18n="Perfect Scrollbar">Tambah Data Faktur</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('invoice') ? 'active' : '' }}">
                                <a href="/invoice" class="menu-link">
                                    <div data-i18n="Text Divider">Faktur</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
                @endif
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        @if (DB::table('profils')->where('user_id', Auth::user()->id)->exists())
                        @foreach ($profil as $item)
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('storage/'.$item->foto) }}" alt
                                            class="rounded-circle" style="object-fit: cover"/>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('storage/' .$item->foto) }}" alt
                                                        class="rounded-circle" style="object-fit: cover"/>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ $item->nama }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/profil">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Edit Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form name="logoutform" method="post" action="{{ route('logout') }}" id="logout-form" class="d-none">
                                            @csrf
                                            <input type="hidden" name="form_name" value="logoutform">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                        @endforeach
                        @else
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="" alt
                                                        class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->username }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/profil">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Edit Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form name="logoutform" method="post" action="{{ route('logout') }}" id="logout-form" class="d-none">
                                            @csrf
                                            <input type="hidden" name="form_name" value="logoutform">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                        @endif
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            
                            <a href="https://instagram.com/arigunawanj" target="_blank" class="footer-link fw-bolder">Ari -
                                Faras</a>
                        </div>
                    </div>
            </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js' integrity='sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==' crossorigin='anonymous'></script>
    <script src="{{ asset('isi/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('isi/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('isi/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('isi/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('isi/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('isi/assets/js/main.js') }}"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('isi/assets/js/dashboards-analytics.js') }}"></script>
   
    <script>
       $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
    </script>
    <script>
       $(document).ready(function() {
    var table = $('#example2').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
    </script>
    <script>
        $('#logout').on("click", function() {
            swal.fire({
                title: 'Apa Kamu Yakin mau Logout?',
                text: "Kamu tidak bisa mengulang lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => { 
                if (result.value===true) {
                    $('#logout-form').submit() // this submits the form
                     
                } 
            }) 
    });   
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @elseif (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
</body>

</html>
