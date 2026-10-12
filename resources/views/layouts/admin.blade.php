<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Dashboard - SMAN 1 Yogyakarta')</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <!-- FontAwesome 6 CDN -->
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

</head>

<body>
    <div class="container-scroller">
        <!-- TOP NAVBAR -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/sman1.png') }}" alt="logo"
                        style="height: 30px; width: auto; margin-right: 8px;">
                    <span>SMAN 1 Jogja</span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/sman1.png') }}" alt="logo" style="height: 25px;">
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav navbar-nav-right">
                    <!-- PROFIL USER DINAMIS -->
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" id="UserDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            @if (auth()->check() && !empty(auth()->user()->foto) && Storage::disk('public')->exists('user/' . auth()->user()->foto))
                                <img class="img-xs rounded-circle"
                                    src="{{ asset('storage/user/' . auth()->user()->foto) }}" alt="Profile image"
                                    style="width: 35px; height: 35px; object-fit: cover;">
                            @elseif(auth()->check() && !empty(auth()->user()->foto) && Storage::disk('public')->exists(auth()->user()->foto))
                                <img class="img-xs rounded-circle" src="{{ asset('storage/' . auth()->user()->foto) }}"
                                    alt="Profile image" style="width: 35px; height: 35px; object-fit: cover;">
                            @else
                                <div class="avatar-initials img-xs" style="width: 35px; height: 35px; font-size: 14px;">
                                    {{ strtoupper(substr(auth()->user()->name ?? (auth()->user()->nama ?? 'U'), 0, 1)) }}
                                </div>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown p-3 text-center shadow-sm border-0 rounded-3"
                            aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center p-0 mb-3">
                                @if (auth()->check() && !empty(auth()->user()->foto) && Storage::disk('public')->exists('user/' . auth()->user()->foto))
                                    <img class="img-md rounded-circle mb-2"
                                        src="{{ asset('storage/user/' . auth()->user()->foto) }}" alt="Profile image"
                                        style="width: 65px; height: 65px; object-fit: cover;">
                                @elseif(auth()->check() && !empty(auth()->user()->foto) && Storage::disk('public')->exists(auth()->user()->foto))
                                    <img class="img-md rounded-circle mb-2"
                                        src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Profile image"
                                        style="width: 65px; height: 65px; object-fit: cover;">
                                @else
                                    <div class="avatar-initials img-md mx-auto mb-2"
                                        style="width: 65px; height: 65px; font-size: 24px;">
                                        {{ strtoupper(substr(auth()->user()->name ?? (auth()->user()->nama ?? 'U'), 0, 1)) }}
                                    </div>
                                @endif

                                <p class="mb-0 mt-2 font-weight-bold text-dark" style="font-size: 15px;">
                                    {{ auth()->user()->name ?? (auth()->user()->nama ?? 'Pengguna') }}
                                </p>
                                <span
                                    class="badge {{ strtolower(auth()->user()->role ?? '') === 'admin' ? 'badge-danger' : 'badge-info' }} mt-1 px-3 py-1">
                                    {{ ucfirst(auth()->user()->role ?? 'User') }}
                                </span>
                            </div>

                            <div class="dropdown-divider my-2"></div>

                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item border-0 bg-transparent text-danger d-flex align-items-center justify-content-center font-weight-medium py-2">
                                    <i class="fas fa-power-off mr-2"></i> Keluar / Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
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
                        <a class="nav-link" href="{{ route('admin.profil-sekolah.profil') }}">
                            <i class="menu-icon mdi mdi-school"></i>
                            <span class="menu-title">Profil Sekolah</span>
                        </a>
                    </li>

                    @if (auth()->check() && strcasecmp(auth()->user()->role, 'admin') === 0)
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

                    <li class="nav-item {{ request()->routeIs('admin.kelas*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelas.index') }}">
                            <i class="menu-icon mdi mdi-account-group"></i>
                            <span class="menu-title">Kelas</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.prestasi.index') }}">
                            <i class="menu-icon mdi mdi-trophy-variant-outline"></i>
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
            $.fn.dataTable.ext.errMode = 'none';

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
