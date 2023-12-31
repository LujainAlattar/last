<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />



    @yield('title')

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/js/config.js') }}"></script>



    @yield('header-style')

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('home/images/logo.png') }}" alt="logo">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">EduPro</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
                        style="background-color: #082465">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    @if (auth()->user()->role_id == 1)
                        <li class="menu-item {{ request()->routeIs('admin') ? 'active' : '' }}">
                            <a href="{{ route('admin') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('user-dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('user-dashboard.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                                <div data-i18n="Analytics">Users</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('teacher-dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('teacher-dashboard.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-user-tie"></i>
                                <div data-i18n="Analytics">Teachers</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('subject-dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('subject-dashboard.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-book"></i>
                                <div data-i18n="Analytics">Subjects</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('Booking-dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('Booking-dashboard.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-credit-card"></i>
                                <div data-i18n="Analytics">Booking & Payment</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('Review-dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('Review-dashboard.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-regular fa-star-half-stroke"></i>
                                <div data-i18n="Analytics">Reviews</div>
                            </a>
                        </li>


                        <li class="menu-item {{ request()->routeIs('Contact-dashboard') ? 'active' : '' }}">
                            <a href="{{ route('Contact-dashboard') }}" class="menu-link">
                                <i class="fa-solid fa-phone"></i>
                                <div data-i18n="Analytics">Contact</div>
                            </a>
                        </li>

                    @elseif (auth()->user()->role_id == 3)
                        <li class="menu-item {{ request()->routeIs('teacher-user-Dashboard') ? 'active' : '' }}">
                            <a href="{{ route('teacher-user-Dashboard') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('teacher-student-dashboard') ? 'active' : '' }}">
                            <a href="{{ route('teacher-student-dashboard') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                                <div data-i18n="Analytics">Students</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('teacher-showappointment-dashboard') ? 'active' : '' }}">
                            <a href="{{ route('teacher-showappointment-dashboard') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-credit-card"></i>
                                <div data-i18n="Analytics">Booking & Payment</div>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->routeIs('teacher-showreviews-dashboard') ? 'active' : '' }}">
                            <a href="{{ route('teacher-showreviews-dashboard') }}" class="menu-link">
                                <i class="menu-icon tf-icons fa-regular fa-star-half-stroke"></i>
                                <div data-i18n="Analytics">Reviews</div>
                            </a>
                        </li>
                    @endif
                </ul>
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
                        <!-- Search -->

                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @if (auth()->user()->img)
                                            <img src="{{ asset('storage/uploads/images/' . auth()->user()->img) }}"
                                                width="40" height="40" class="rounded-circle">
                                        @else
                                            <img src="{{ asset('home/images/defualt_profile.jpg') }}" width="40"
                                                height="40" class="rounded-circle">
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if (auth()->user()->img)
                                                            <img src="{{ asset('storage/uploads/images/' . auth()->user()->img) }}"
                                                                width="40" height="40" class="rounded-circle">
                                                        @else
                                                            <img src="{{ asset('home/images/defualt_profile.jpg') }}"
                                                                width="40" height="40" class="rounded-circle">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                    @if (auth()->user()->role_id == 1)
                                                        <small class="text-muted">Admin</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        @if (auth()->user()->role_id == 1)
                                            <a class="dropdown-item"
                                                href="{{ route('admin-profile', auth()->user()->id) }}">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">Profile</span>
                                            </a>
                                        @elseif (auth()->user()->role_id == 3)
                                            <a class="dropdown-item"
                                                href="{{ route('teacher-user-Dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item"
                                                href="{{ route('teacher-user-profile') }}">Profile</a>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->


                @yield('content')


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
    @yield('script-content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
