<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - SMAN 1 Yogyakarta</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <!-- FontAwesome 6 CDN (Icon Modern & Pasti Keluar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/shared/style.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/demo_1/style.css') }}">
    <!-- End Layout styles -->

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

    <style>
        /* Penyesuaian Ringan Tanpa Merusak Layout Star Admin */
        .navbar.default-layout .navbar-brand-wrapper {
            background: #00122e !important;
        }
        .navbar.default-layout .navbar-brand-wrapper .navbar-brand {
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 600;
        }
        .sidebar {
            background: #00122e !important;
        }
        .sidebar .nav .nav-item .nav-link {
            color: #a0abbd !important;
        }
        .sidebar .nav .nav-item.active > .nav-link,
        .sidebar .nav .nav-item .nav-link:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.05) !important;
        }
        /* Merapikan Foto & Alignment Tabel */
        .table img.img-avatar {
            width: 36px !important;
            height: 36px !important;
            border-radius: 50% !important;
            object-fit: cover !important;
        }
        .table td, .table th {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- TOP NAVBAR -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/sman1.png') }}" alt="logo" style="height: 30px; width: auto; margin-right: 8px;">
                    <span>SMAN 1 Jogja</span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/sman1.png') }}" alt="logo" style="height: 25px;">
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block">Help : +050 2992 709</li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">Admin Sekolah</p>
                            </div>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary"></i> Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- CONTAINER BODY -->
        <div class="container-fluid page-body-wrapper">
            <!-- SIDEBAR -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-category">Main Menu</li>

                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.profil') }}">
                            <i class="menu-icon mdi mdi-school"></i>
                            <span class="menu-title">Profil Sekolah</span>
                        </a>
                    </li>

                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <li class="nav-item {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.user.index') }}">
                                <i class="fa-solid fa-user-gear menu-icon"></i>
                                <span class="menu-title">Kelola Pengguna</span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru.index') }}">
                            <i class="menu-icon mdi mdi-account-tie"></i>
                            <span class="menu-title">Guru</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.siswa.index') }}">
                            <i class="menu-icon mdi mdi-account-group"></i>
                            <span class="menu-title">Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.prestasi.index') }}">
                            <i class="menu-icon mdi mdi-account-group"></i>
                            <span class="menu-title">Prestasi</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.berita.index') }}">
                            <i class="menu-icon mdi mdi-newspaper"></i>
                            <span class="menu-title">Berita</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                            <i class="menu-icon mdi mdi-image-multiple"></i>
                            <span class="menu-title">Galeri</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.ekstrakulikuler*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.ekstrakulikuler.index') }}">
                            <i class="menu-icon mdi mdi-star"></i>
                            <span class="menu-title">Ekstrakurikuler</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- MAIN PANEL -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SMAN 1 Yogyakarta</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>

    <!-- inject:js -->
    <script src="{{ asset('js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('js/shared/misc.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        // Matikan popup error bawaan DataTables
        $.fn.dataTable.ext.errMode = 'none';

        // Targetkan semua tabel yang punya class "datatable"
        $('.datatable').DataTable({
            "responsive": true,
            "autoWidth": false,
            "destroy": true
        });
    });
</script>
    @stack('scripts')
</body>
</html>
