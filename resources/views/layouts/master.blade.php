<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>WEBAPP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('css/components-md.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    @yield('estilos')

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- END THEME LAYOUT STYLES -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN CONTAINER -->
<div class="wrapper">
    <!-- BEGIN HEADER -->
    <header class="page-header">
        @include('layouts.nav')
    </header>
    <!-- END HEADER -->
    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                @yield('breadcrumb')
                <!-- Sidebar Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                    <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                </button>
                <!-- Sidebar Toggle Button -->
            </div>
            <!-- END BREADCRUMBS -->

            <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
            <div class="page-content-container">
                <div class="page-content-row">

                    <!-- BEGIN PAGE SIDEBAR -->
                    @include('layouts.sidebar')
                    <!-- END PAGE SIDEBAR -->

                    <div class="page-content-col">
                        <!-- BEGIN PAGE BASE CONTENT -->
                        @yield('contenido')
                        <!-- END PAGE BASE CONTENT -->
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR CONTENT LAYOUT -->
        </div>
        <!-- BEGIN FOOTER -->
        <p class="copyright"> 2016 &copy; Metronic Theme By
            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
        </p>
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END FOOTER -->
    </div>
</div>
<!-- END CONTAINER -->


<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app/configuracion.js') }}" type="text/javascript"></script>

@yield('scripts')
</body>
</html>