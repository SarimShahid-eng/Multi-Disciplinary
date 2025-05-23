<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Sign In | Project - Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Multi Disciplinary Impact Press Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    {{-- <script src="{{ asset('layout_assets') }}/js/layout.js"></script> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('layout_assets') }}/images/NUPASSTemp-Logo.png"> --}}

    <!-- Layout config Js -->
    <script src="{{ asset('layout_assets') }}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('layout_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('layout_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('layout_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('layout_assets') }}/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- App favicon -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
        rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('asset') }}/css/sweetalert2.min.css" /> --}}
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index-2.html" class="d-inline-block auth-logo">
                                    PROJECT
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                {{ $slot }}
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                Copyright
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Sarim Shahid
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('layout_assets') }}/js/pages/select2.init.js"></script>
    <script src="{{ asset('layout_assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('layout_assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('layout_assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('layout_assets') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('layout_assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('layout_assets') }}/js/plugins.js"></script>

    <!-- particles js -->
    <script src="{{ asset('layout_assets') }}/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="{{ asset('layout_assets') }}/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="{{ asset('layout_assets') }}/js/pages/password-addon.init.js"></script>

</body>

</html>
