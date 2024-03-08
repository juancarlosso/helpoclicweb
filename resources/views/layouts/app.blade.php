<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Helpo Contigo">
    <meta name="author" content="JASoluciones">
    <meta name="keywords" content="Helpo Contigo">

    <!-- ****** faviconit.com favicons ****** -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('favicon/favicon-160.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon/favicon-64.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon/favicon-57.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/favicon-114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/favicon-72.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/favicon-144.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/favicon-60.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/favicon-152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/favicon-180.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/favicon-144.png') }}">
    <!-- ****** faviconit.com favicons ****** -->

    <!-- TITLE -->
    <title>Helpo Clic</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- SINGLE-PAGE CSS -->
    <link href="{{ asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">

    <!-- P-scroll bar css-->
    <link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    @include('layouts.partials.fontawsome')

    <!--- SELECT2 CSS -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <!-- <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/scss/bootstrap/_bootstrap-styles.scss') }}" /> -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

    @yield('estilos')

</head>

<body class="app sidebar-mini ltr">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="#">
                            <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">

                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="dropdown d-lg-none d-md-block d-none">
                                <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fe fe-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>

                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-md-none d-flex">
                                            <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Theme-Layout -->
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        @include('layouts.partials.user')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="#">
                            <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>

                    @include('layouts.partials.menu')

                </div>
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">
                             @yield('titulo')
                            </h1>
                            <div>
                                @yield('breadcrum')
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <div class="row ">
                            <div class="col-md-12">
                                @include('alertas.flash')
                            </div>
                        </div>

                        @yield('contenido')

                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        @include('layouts.partials.footer')

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- SELECT 2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Fontawsome js -->
    <!-- <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script> -->

    @yield('scripts')

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>