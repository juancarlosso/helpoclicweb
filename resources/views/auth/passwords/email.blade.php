<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Helpo Contigo webpanel">
    <meta name="author" content="Helpo Contigo">
    <meta name="keywords" content="Helpo Contigo web panel">

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
    <title>Helpo Contigo</title>

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
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/scss/bootstrap/_bootstrap-styles.scss') }}" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/brand/logobig.png') }}" class="header-brand-img2" width="150" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                       
                            <span class="login100-form-title pb-5">
                                Recuperar Password
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                         <p><small>Proporciona tu dirección de correo y te enviaremos instrucciones para recuperar tu contraseña</small></p>
                                    </div>
                                </div>                                
                                <form id="frm" method="POST" action="{{ route('password.email') }}">
                                   @csrf                                   
                                   <div class="panel-body tabs-menu-body p-0 pt-5">
                                       <div class="tab-content">
                                           <div class="tab-pane active" id="tab5">
                                               <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                   <a href="#" class="input-group-text bg-white text-muted">
                                                       <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                   </a>
                                                   <input class="input100 form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required="required" >
                                                   @error('email')
                                                       <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                       </span>
                                                   @enderror
                                               </div>
                                               <div class="container-login100-form-btn">
                                                   <button type="submit" class="login100-form-btn btn-primary">Enviar</button>
                                               </div>
                                           </div>                                          
                                       </div>
                                   </div>
                                </form>
                                
                            </div>

                        
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <!--
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>     
     -->
    
    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>