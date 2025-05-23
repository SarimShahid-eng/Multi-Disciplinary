<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Maintenance | Multi Disciplinary Impact Press </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Multi Disciplinary Impact Press Admin Dashboard" name="description" />
    {{-- <meta content="Themesbrand" name="author" /> --}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 pt-4">
                            <div class="mb-5 text-white-50">
                                <h1 class="display-5 coming-soon-text">Site is Under Maintenance</h1>
                                <p class="fs-14">Please check back in sometime</p>
                                <div class="mt-4 pt-2">
                                    <a href="{{ route('login') }}" class="btn btn-success"><i
                                            class="mdi mdi-home me-1"></i>
                                        Login</a>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-5">
                                <div class="col-xl-4 col-lg-8">
                                    <div>
                                        <img src="{{ asset('layout_assets/images/maintenance.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            &copy;
                            Copyright
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Sarim Shahid
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
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

</body>


</html>
