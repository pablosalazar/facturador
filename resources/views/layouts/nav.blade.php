<?php

    function active( $ruta ) {

        $url_actual = explode("/", Request::path());
        $url_actual = empty($url_actual[0])? "/" : $url_actual[0];

        $rutas = [
                'dashboard' => ['/'],
                'catalogo' => ['categorias', 'productos'],
                'ventas' => []
        ];

        return in_array($url_actual, $rutas[$ruta]) ? 'active open selected' : '';

    }
?>


<nav class="navbar mega-menu" role="navigation">
    <div class="container-fluid">
        <div class="clearfix navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
            </button>
            <!-- End Toggle Button -->

            <!-- BEGIN LOGO -->
            <a id="index" class="page-logo" href="index.html">
                <img src="{{ asset('img/logo.png') }}" alt="Logo"> </a>
            <!-- END LOGO -->

            <!-- BEGIN TOPBAR ACTIONS -->
            <div class="topbar-actions">
                <!-- BEGIN GROUP NOTIFICATION -->
                <div class="btn-group-notification btn-group" id="header_notification_bar">
                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                    </button>
                </div>
                <!-- END GROUP NOTIFICATION -->
                <!-- BEGIN GROUP INFORMATION -->
                <div class="btn-group-red btn-group">
                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu-v2" role="menu">
                        <li class="active">
                            <a href="#">New Post</a>
                        </li>
                        <li>
                            <a href="#">New Comment</a>
                        </li>
                        <li>
                            <a href="#">Share</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Comments
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Feedbacks
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END GROUP INFORMATION -->
                <!-- BEGIN USER PROFILE -->
                <div class="btn-group-img btn-group">
                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span>Hola, Cristthian</span>
                        <img src="{{ asset('img/avatar1.jpg') }}" alt=""> </button>
                    <ul class="dropdown-menu-v2" role="menu">
                        <li>
                            <a href="page_user_profile_1.html">
                                <i class="icon-user"></i> My Profile
                                <span class="badge badge-danger">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="app_calendar.html">
                                <i class="icon-calendar"></i> My Calendar </a>
                        </li>
                        <li>
                            <a href="app_inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox
                                <span class="badge badge-danger"> 3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="app_todo_2.html">
                                <i class="icon-rocket"></i> My Tasks
                                <span class="badge badge-success"> 7 </span>
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="page_user_lock_1.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li>
                            <a href="page_user_login_1.html">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </div>
                <!-- END USER PROFILE -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <button type="button" class="quick-sidebar-toggler md-skip" data-toggle="collapse">
                    <span class="sr-only">Toggle Quick Sidebar</span>
                    <i class="icon-logout"></i>
                </button>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </div>
            <!-- END TOPBAR ACTIONS -->
        </div>
        <!-- BEGIN HEADER MENU -->
        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-fw dropdown-fw-disabled {{ active('dashboard')}}">
                    <a href="javascript:;" class="text-uppercase">
                        <i class="icon-home"></i> Dashboard </a>
                    <ul class="dropdown-menu dropdown-menu-fw">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="icon-star"></i> Inicio </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-fw dropdown-fw-disabled  {{ active('catalogo')}}">
                    <a href="javascript:;" class="text-uppercase">
                        <i class="icon-handbag"></i> Catálogo </a>
                    <ul class="dropdown-menu dropdown-menu-fw">
                        <li>
                            <a href="{{ url('categorias') }}">
                                <i class="fa fa-bars" aria-hidden="true"></i> Categorias </a>
                        </li>
                        <li>
                            <a href="{{ url('productos') }}">
                                <i class="icon-tag"></i> Productos </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-fw dropdown-fw-disabled  {{ active('ventas')}}">
                    <a href="javascript:;" class="text-uppercase">
                        <i class="icon-basket"></i> Ventas </a>
                    <ul class="dropdown-menu dropdown-menu-fw">
                        <li>
                            <a href="index.html">
                                <i class="icon-basket"></i> Default </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-fw dropdown-fw-disabled  ">
                    <a href="javascript:;" class="text-uppercase">
                        <i class="icon-settings"></i> System </a>
                    <ul class="dropdown-menu dropdown-menu-fw">
                        <li>
                            <a href="index.html">
                                <i class="icon-bar-chart"></i> Default </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END HEADER MENU -->
    </div>
    <!--/container-->
</nav>