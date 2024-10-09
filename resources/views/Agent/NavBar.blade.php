<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/chadi.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" /> <!-- Custom CSS -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('Agent.index') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../assets/img/favicon/logo.png" alt="bnjr" style="width: 130px; height: auto;">
                        </span>
                    </a>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item {{ request()->routeIs('Agent.index') ? 'active' : '' }}">
                        <a href="{{ route('Agent.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home"></i> <!-- Updated icon -->
                            <div data-i18n="Analytics">Acceuil</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('Agent.Ajouter') ? 'active' : '' }}">
                        <a href="{{ route('Agent.Ajouter') }}" class="menu-link"> <!-- Corrected route -->
                            <i class="menu-icon tf-icons bx bx-plus-circle"></i> <!-- Updated icon -->
                            <div data-i18n="Analytics">Ajouter une nouvelle épave</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('epaveAgent') ? 'active' : '' }}">
                        <a href="{{ route('epaveAgent') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid-alt"></i> <!-- Updated icon -->
                            <div data-i18n="Analytics">Tableau de Bord</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('epave.search') ? 'active' : '' }}">
                        <a href="{{ route('epave.search') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-search-alt"></i> <!-- Updated icon -->
                            <div data-i18n="Analytics">Recherche d'Épaves</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('rapatriement.create') ? 'active' : '' }}">
                        <a href="{{ route('rapatriement.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-search-alt"></i>
                            <div data-i18n="Analytics">Rapatriement des Épaves</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('rapatriements') ? 'active' : '' }}">
                        <a href="{{ route('rapatriements') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div data-i18n="Analytics">Tableau de Rapatriement</div>
                        </a>
                    </li>


                </ul>
            </aside>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                @yield('content')
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>