<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Cont &amp;Book</title>



    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('resources/plantilla/assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('resources/plantilla/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('resources/plantilla/assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('resources/plantilla/assets/css/oneui.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('resources/plantilla/assets/css/themes/flat.min.css') }}">
    <!-- END Stylesheets -->

    <link rel="stylesheet" href=" {{ asset('resources/plantilla/noty/lib/noty.css') }}" />
    <link rel="stylesheet" href="{{ asset('resources/plantilla/noty/lib/themes/relax.css') }}" />
    <link rel="stylesheet" href="{{ asset('resources/plantilla/noty/demo/animate.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
    <div id="page-container" class=" page-header-dark">
        <!-- Side Overlay-->

        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-gray-900">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="/ContBook">
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
                        <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0"
                            aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme"
                                data-theme="{{ asset('resources/plantilla/assets/css/themes/amethyst.min.css') }}"
                                href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme"
                                data-theme="{{ asset('resources/plantilla/assets/css/themes/city.min.css') }}"
                                href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme"
                                data-theme="{{ asset('resources/plantilla/assets/css/themes/flat.min.css') }}"
                                href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme"
                                data-theme="{{ asset('resources/plantilla/assets/css/themes/modern.min.css') }}"
                                href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme"
                                data-theme="{{ asset('resources/plantilla/assets/css/themes/smooth.min.css') }}"
                                href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light"
                                href="#">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark"
                                href="#">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_light"
                                href="#">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark"
                                href="#">
                                <span>Header Dark</span>
                            </a>
                            <!-- Header Styles -->
                        </div>
                    </div>
                    <!-- END Themes -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close"
                        href="javascript:void(0)">
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
                    <li class="nav-main-item" id="menu_1">
                    </li>
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


                    <a type="button" class="btn btn-sm btn-dual mr-2" onclick="viewInicio()">
                        <i class="si si-grid"></i>
                    </a>
                    <strong id="itemSector_hubi">
                        <span class="badge "><i style="color:red" class="fa fa-2x fa-lightbulb"></i> </span>
                    </strong>
                </div>
                <div class="d-flex align-items-center">
                    <strong id="itemSector_sec">
                        <span class="badge badge-pill badge-danger"><i class="fa fa-fw fa-info"></i> Seleccionar
                            REGION</span>
                    </strong>

                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <a type="button" class="btn btn-sm btn-dual mr-2" onclick="itemSector(1)">
                        <i class="fa fa-fw fa-cog"></i>
                    </a>
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded"
                                src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg') }}"
                                alt="Header Avatar" style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1">{{ Auth::User()->usu_cod }}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('resources/plantilla/assets/media/avatars/avatar10.jpg') }}"
                                    alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase">Opciones </h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="be_pages_generic_profile.html">
                                    <span>Perfil</span>
                                    <span>
                                        <span class="badge badge-pill badge-success">1</span>
                                        <i class="si si-user ml-1"></i>
                                    </span>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="#"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span>Cerrar</span>
                                    <i class="si si-logout ml-1"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

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
                                <button type="button" class="btn btn-danger" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
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
            <!-- Page Content -->
            <div class="content content-narrow">
                <!-- Stats -->
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                            href="#" onclick="viewCliente()">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Cliente <i
                                        class="fa fa-plus-circle"></i> </div>
                                <i class=" fa fa-address-book  fa-2x text-muted"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                            href="#" onclick="viewPedido(1)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Pedido <i
                                        class="fa fa-plus-circle"></i> </div>
                                <i class="fa fa-shopping-cart fa-2x text-muted"></i>

                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                            href="#" onclick="viewCatalogo(1)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Catalogo</div>
                                <i class="fa fa-store fa-2x text-muted"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                            href="#" onclick="viewCatalogo(2)">
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Ofertas / Promociones
                                </div>
                                <i class="fa fa-store fa-2x text-muted"></i>
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
        <footer id="page-footer" class="bg-body-light" style="font-size: 9px;">
            <div class="content py-3">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                        <a class="font-w600" href="#">ContBook 1.0</a> &copy; <span
                            data-toggle="year-copy">2022</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->

    </div>
    <div class="modal fade" id="md_tipoPrecio" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-top " role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Seleccionar Región</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class=" block-content">
                        <div class="form-group" align='center'>
                            <label class="d-block">Seleccinar Región</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="example-radio-custom-inline1"
                                    name="inp_tipoPrecio" value="P1" checked>
                                <label class="custom-control-label" for="example-radio-custom-inline1">Región
                                    1</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="example-radio-custom-inline2"
                                    name="inp_tipoPrecio" value="P2">
                                <label class="custom-control-label" for="example-radio-custom-inline2">Región
                                    2</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="example-radio-custom-inline3"
                                    name="inp_tipoPrecio" value="P3">
                                <label class="custom-control-label" for="example-radio-custom-inline3">Región
                                    3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class=" btn btn-success btn-sm btn-block"
                        onclick="itemSector(2)">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=initMap" async
        defer></script> --}}
    <script>
        let lat = '-';
        let lon = '-';
        let enlace = '';
        let datoo = '';
        const funcionInit = () => {
            if (!"geolocation" in navigator) {
                return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
            }
            const onUbicacionConcedida = ubicacion => {
                lat = ubicacion.coords.latitude;
                lon = ubicacion.coords.longitude;
                console.log("Tengo la ubicación: ", ubicacion.coords.latitude, '|', ubicacion.coords.longitude);
                $('#itemSector_hubi').html(
                    '<span class="badge "><i style="color: yellow" class="fa fa-2x fa-lightbulb"></i> </span>');
            }
            const onErrorDeUbicacion = err => {


                console.log("Error obteniendo ubicación: ", err);
            }

            const opcionesDeSolicitud = {
                enableHighAccuracy: true, // Alta precisión
                maximumAge: 0, // No queremos caché
                timeout: 5000 // Esperar solo 5 segundos
            };
            navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);

        };
        document.addEventListener("DOMContentLoaded", funcionInit);
    </script>

    <!-- END Page Container -->

    <script src="{{ asset('resources/plantilla/assets/js/oneui.core.min.js') }}"></script>

    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="{{ asset('resources/plantilla/assets/js/oneui.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('resources/plantilla/assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script
        src="{{ asset('resources/plantilla/assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') }}">
    </script>
    <!-- <script src="{{ asset('resources/plantilla/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script> -->
    <!-- <script src="{{ asset('resources/plantilla/assets/js/plugins/jquery-validation/additional-methods.js') }}"></script> -->

    <!-- Page JS Code -->
    <script src="{{ asset('resources/plantilla/assets/js/pages/be_pages_dashboard.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('resources/plantilla/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Page JS Code -->
    <!-- <script src="{{ asset('resources/plantilla/assets/js/pages/be_forms_wizard.min.js') }}"></script> -->

    <!-- <script src="{{ asset('resources/plantilla/noty/demo/bouncejs/bounce.js') }}"></script> -->
    <script src="{{ asset('resources/plantilla/noty/lib/noty.js') }}"></script>
    <script src="{{ asset('resources/plantilla/noty/demo/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/velocity/1.5/velocity.min.js"></script>
    <script src="https://cdn.jsdelivr.net/mojs/latest/mo.min.js"></script>


    <!-- JS del sistema -->

    <script src="{{ asset('resources/js/App/inicio.js') }}"></script>

</body>

</html>
