<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Cont &amp;Book</title>



    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('resources/plantilla/assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('resources/plantilla/assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('resources/plantilla/assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('resources/plantilla/assets/css/oneui.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('resources/plantilla/assets/css/themes/flat.min.css')}}">
    <!-- END Stylesheets -->

    <link rel="stylesheet" href=" {{ asset('resources/plantilla/noty/lib/noty.css')}}" />
    <link rel="stylesheet" href="{{ asset('resources/plantilla/noty/lib/themes/relax.css')}}" />
    <link rel="stylesheet" href="{{ asset('resources/plantilla/noty/demo/animate.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php
    $token = csrf_token();
    ?>
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-dark">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="font-size-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link mr-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg')}}" alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ml-2">
                    <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times text-danger"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <!-- Side Overlay Tabs -->
                <div class="block block-transparent pull-x pull-t">
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#so-overview">
                                <i class="fa fa-fw fa-coffee text-gray mr-1"></i> Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#so-sales">
                                <i class="fa fa-fw fa-chart-line text-gray mr-1"></i> Sales
                            </a>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Overview Tab -->
                        <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                            <!-- Activity -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Recent Activity</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Activity List -->
                                    <ul class="nav-items mb-0">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-wallet text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale ($15)</div>
                                                    <div class="text-success">Admin Template</div>
                                                    <small class="text-muted">3 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-pencil text-info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">You edited the file</div>
                                                    <div class="text-info">
                                                        <i class="fa fa-file-text"></i> Documentation.doc
                                                    </div>
                                                    <small class="text-muted">15 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-close text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Project deleted</div>
                                                    <div class="text-danger">Line Icon Set</div>
                                                    <small class="text-muted">4 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- END Activity List -->
                                </div>
                            </div>
                            <!-- END Activity -->

                            <!-- Online Friends -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Online Friends</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Users Navigation -->
                                    <ul class="nav-items mb-0">
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/avatar3.jpg')}}" alt="">
                                                    <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Helen Jacobs</div>
                                                    <div class="font-w400 text-muted">Copywriter</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg')}}" alt="">
                                                    <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Ryan Flores</div>
                                                    <div class="font-w400 text-muted">Web Developer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/avatar8.jpg')}}" alt="">
                                                    <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Susan Day</div>
                                                    <div class="font-w400 text-muted">Web Designer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/avatar3.jpg')}}" alt="">
                                                    <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Sara Fields</div>
                                                    <div class="font-w400 text-muted">Photographer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/avatar15.jpg')}}" alt="">
                                                    <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Adam McCoy</div>
                                                    <div class="font-w400 text-muted">Graphic Designer</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- END Users Navigation -->
                                </div>
                            </div>
                            <!-- END Online Friends -->

                            <!-- Quick Settings -->
                            <div class="block mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Quick Settings</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Quick Settings Form -->
                                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                        <div class="form-group">
                                            <p class="font-w600 mb-2">
                                                Online Status
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-check1" name="so-settings-check1" checked>
                                                <label class="custom-control-label" for="so-settings-check1">Show your status to all</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-2">
                                                Auto Updates
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-check2" name="so-settings-check2" checked>
                                                <label class="custom-control-label" for="so-settings-check2">Keep up to date</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-1">
                                                Application Alerts
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-check3" name="so-settings-check3" checked>
                                                <label class="custom-control-label" for="so-settings-check3">Email Notifications</label>
                                            </div>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-check4" name="so-settings-check4" checked>
                                                <label class="custom-control-label" for="so-settings-check4">SMS Notifications</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-1">
                                                API
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-check5" name="so-settings-check5" checked>
                                                <label class="custom-control-label" for="so-settings-check5">Enable access</label>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Quick Settings Form -->
                                </div>
                            </div>
                            <!-- END Quick Settings -->
                        </div>
                        <!-- END Overview Tab -->

                        <!-- Sales Tab -->
                        <div class="tab-pane pull-x fade fade-right" id="so-sales" role="tabpanel">
                            <div class="block mb-0">
                                <!-- Stats -->
                                <div class="block-content">
                                    <div class="row items-push pull-t">
                                        <div class="col-6">
                                            <div class="font-w700 text-uppercase">Sales</div>
                                            <a class="link-fx font-size-h3 font-w300" href="javascript:void(0)">22.030</a>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-w700 text-uppercase">Balance</div>
                                            <a class="link-fx font-size-h3 font-w300" href="javascript:void(0)">$4.589,00</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Stats -->

                                <!-- Today -->
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="font-w600 text-uppercase">Today</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="ext-muted">$996</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <ul class="nav-items push">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <small class="text-muted">3 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <small class="text-muted">50 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">2 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <small class="text-muted">3 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END Today -->

                                <!-- Yesterday -->
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="font-w600 text-uppercase">Yesterday</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="text-muted">$765</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <ul class="nav-items push">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <small class="text-muted">26 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Product Purchase - $50</div>
                                                    <small class="text-muted">28 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">29 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Paypal Withdrawal - $300</div>
                                                    <small class="text-muted">37 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <small class="text-muted">39 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">45 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <small class="text-muted">46 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- More -->
                                    <div class="text-center">
                                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                            <i class="fa fa-arrow-down mr-1"></i> Load More..
                                        </a>
                                    </div>
                                    <!-- END More -->
                                </div>
                                <!-- END Yesterday -->
                            </div>
                        </div>
                        <!-- END Sales Tab -->
                    </div>
                </div>
                <!-- END Side Overlay Tabs -->
            </div>
            <!-- END Side Content -->
        </aside>
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-gray-900">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="index.html">
                    <i class="fa fa-circle-notch text-primary"></i>
                    <span class="smini-hide">
                        <span class="font-w700 font-size-h5">Cont</span> <span class="font-w400">Book</span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Color Variations -->
                    <div class="dropdown d-inline-block ml-3">
                        <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset('resources/plantilla/assets/css/themes/amethyst.min.css')}}" href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset('resources/plantilla/assets/css/themes/city.min.css')}}" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset('resources/plantilla/assets/css/themes/flat.min.css')}}" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset('resources/plantilla/assets/css/themes/modern.min.css')}}" href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ asset('resources/plantilla/assets/css/themes/smooth.min.css')}}" href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                <span>Header Dark</span>
                            </a>
                            <!-- Header Styles -->
                        </div>
                    </div>
                    <!-- END Themes -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="/ContBook" id="btn_menu_inicio">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Interfaz</li>
                    <li class="nav-main-item" id="menu_1">
                        <!-- <a class="nav-main-link active" href="#" id="btn_menu_users">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Usuarios</span>
                        </a>
                        <a class="nav-main-link active" href="#" id="">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Inventaio</span>
                        </a>
                        <a class="nav-main-link active" href="#" id="">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Clientes</span>
                        </a>
                        <a class="nav-main-link active" href="#" id="">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Pedidos</span>
                        </a>
                        <a class="nav-main-link active" href="#" id="">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Hubicaciones</span>
                        </a> -->
                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header ">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->

                    <!-- Apps Modal -->
                    <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->
                    <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">
                        <i class="si si-grid"></i>
                    </button>
                    <!-- END Apps Modal -->

                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                        <i class="si si-magnifier"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Search Form (visible on larger screens) -->
                    <form class="d-none d-sm-inline-block" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                            <div class="input-group-append">
                                <span class="input-group-text bg-body border-0">
                                    <i class="si si-magnifier"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <!-- END Search Form -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded" src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg')}}" alt="Header Avatar" style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1">{{Auth::User()->usu_cod}}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg')}}" alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase">User Options</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                    <span>Inbox</span>
                                    <span>
                                        <span class="badge badge-pill badge-primary">3</span>
                                        <i class="si si-envelope-open ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                                    <span>Profile</span>
                                    <span>
                                        <span class="badge badge-pill badge-success">1</span>
                                        <i class="si si-user ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Settings</span>
                                    <i class="si si-settings"></i>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <h5 class="dropdown-header text-uppercase">Actions</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                                    <span>Lock Account</span>
                                    <i class="si si-lock ml-1"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span>Log Out</span>
                                    <i class="si si-logout ml-1"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="si si-bell"></i>
                            <span class="badge badge-primary badge-pill">6</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-2 bg-primary text-center">
                                <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                            </div>
                            <ul class="nav-items mb-0">
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">You have a new follower</div>
                                            <small class="text-muted">15 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-plus-circle text-info"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">1 new sale, keep it up</div>
                                            <small class="text-muted">22 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-times-circle text-danger"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">Update failed, restart server</div>
                                            <small class="text-muted">26 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-plus-circle text-info"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">2 new sales, keep it up</div>
                                            <small class="text-muted">33 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-user-plus text-success"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">You have a new subscriber</div>
                                            <small class="text-muted">41 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-2 ml-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="media-body pr-2">
                                            <div class="font-w600">You have a new follower</div>
                                            <small class="text-muted">42 min ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-white">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-image overflow-hidden" style="background-image: url('resources/plantilla/assets/media/photos/photo29@2x.jpg');">
                <div class="bg-primary-dark-op">
                    <div class="content content-narrow content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                            <div class="flex-sm-fill">
                                <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Usuario: Admin</h1>
                                <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">CI: xxxxxxxx LP</h2>
                                <!-- <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Cargo: Administrador</h2> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content content-narrow">
                <!-- Stats -->
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" id="btn_menu_users">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Administración</div>
                                <i class="fa fa-users fa-2x text-muted"></i>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Contabilidad</div>
                                <i class="fa fa-book fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div> -->
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" id="btn_home_invetario">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Inventario</div>
                                <i class="fa fa-file-archive fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Clientes</div>
                                <i class=" fa fa-address-book  fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Pedidos</div>
                                <i class="fa fa-shopping-cart fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Hubicaciones</div>
                                <i class="fa fa-location-arrow fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Stats -->
            </div>

            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                        <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.0</a> &copy; <span data-toggle="year-copy">2018</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->

        <!-- Apps Modal -->
        <!-- Opens from the modal toggle button in the header -->
        <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top modal-sm" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Apps</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny">
                                <div class="col-6">
                                    <!-- CRM -->
                                    <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-speedometer fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                CRM
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END CRM -->
                                </div>
                                <div class="col-6">
                                    <!-- Products -->
                                    <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-rocket fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Products
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Products -->
                                </div>
                                <div class="col-6">
                                    <!-- Sales -->
                                    <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-plane fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Sales
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Sales -->
                                </div>
                                <div class="col-6">
                                    <!-- Payments -->
                                    <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-wallet fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Payments
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Payments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('resources/plantilla/assets/js/oneui.core.min.js')}}"></script>

    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="{{ asset('resources/plantilla/assets/js/oneui.app.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('resources/plantilla/assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('resources/plantilla/assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{ asset('resources/plantilla/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('resources/plantilla/assets/js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('resources/plantilla/assets/js/pages/be_pages_dashboard.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('resources/plantilla/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- Page JS Code -->
    <!-- <script src="{{ asset('resources/plantilla/assets/js/pages/be_forms_wizard.min.js')}}"></script> -->

    <!-- <script src="{{ asset('resources/plantilla/noty/demo/bouncejs/bounce.js')}}"></script> -->
    <script src="{{ asset('resources/plantilla/noty/lib/noty.js')}}"></script>
    <script src="{{ asset('resources/plantilla/noty/demo/demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/velocity/1.5/velocity.min.js"></script>
    <script src="https://cdn.jsdelivr.net/mojs/latest/mo.min.js"></script>


    <!-- JS del sistema -->

    <script src="{{ asset('resources/js/inicio.js')}}"></script>

</body>

</html>