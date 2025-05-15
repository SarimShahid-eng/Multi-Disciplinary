<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Multi Disciplinary Impact pressure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Multi Disciplinary Impact Press Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <link rel="shortcut icon" href="{{ asset('layout_assets') }}/images/NUPASSTemp-Logo.png"> --}}
    @include('layouts.header')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div id="NEBRAS_HEADING_BESIDE_HAMBURGER"
                            class="app-search d-none d-md-flex align-items-center">
                            <div class="position-relative">
                                <h5 class="m-0">Multi Disciplinary impact pressure</h5>
                            </div>
                            {{-- <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar="init" style="max-height: 320px;">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <!-- item-->
                                                        <div class="dropdown-header">
                                                            <h6 class="text-overflow text-muted mb-0 text-uppercase">
                                                                Recent Searches</h6>
                                                        </div>

                                                        <div class="dropdown-item bg-transparent text-wrap">
                                                            <a href="index-2.html"
                                                                class="btn btn-soft-secondary btn-sm rounded-pill">how
                                                                to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                                            <a href="index-2.html"
                                                                class="btn btn-soft-secondary btn-sm rounded-pill">buttons
                                                                <i class="mdi mdi-magnify ms-1"></i></a>
                                                        </div>
                                                        <!-- item-->
                                                        <div class="dropdown-header mt-2">
                                                            <h6 class="text-overflow text-muted mb-1 text-uppercase">
                                                                Pages</h6>
                                                        </div>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>Analytics Dashboard</span>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>Help Center</span>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>My account settings</span>
                                                        </a>

                                                        <!-- item-->
                                                        <div class="dropdown-header mt-2">
                                                            <h6 class="text-overflow text-muted mb-2 text-uppercase">
                                                                Members</h6>
                                                        </div>

                                                        <div class="notification-list">
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="assets/images/users/avatar-2.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="m-0">Angela Bernier</h6>
                                                                        <span
                                                                            class="fs-11 mb-0 text-muted">Manager</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="assets/images/users/avatar-3.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="m-0">David Grasso</h6>
                                                                        <span class="fs-11 mb-0 text-muted">Web
                                                                            Designer</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="assets/images/users/avatar-5.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="m-0">Mike Bunch</h6>
                                                                        <span class="fs-11 mb-0 text-muted">React
                                                                            Developer</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All
                                        Results <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">

                            </div>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('images') }}/user/avatar.png" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->firstname }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">

                                        </span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->firstname }}!</h6>

                                <a class="dropdown-item" href="{{ route('profile.view') }}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>

                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">

            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index-2.html" class="logo logo-dark">
                    <span class="logo-sm">
                        Multi Disciplinary Impact Press
                        {{-- <img src="{{ asset('layout_assets') }}/images/NUPASSTemp-LogoWithoutCrop.png" class="mt-2"
                            width="50" style="border-radius: 8%;"> --}}
                    </span>
                    <span class="logo-lg">
                        Multi Disciplinary Impact Press
                        {{-- <img src="{{ asset('layout_assets') }}/images/NUPASSTemp-LogoWithoutCrop.png" class="mt-2"
                            width="75" style="border-radius: 8%;"> --}}
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        Multi Disciplinary Impact Press

                    </span>
                    <span class="logo-lg ">
                        <h5 class="text-white mt-3">Multi Disciplinary Impact Press</h5>
                        {{-- <img src="{{ asset('layout_assets') }}/images/NUPASSTemp-LogoWithoutCrop.png" class="mt-2"
                            width="75" style="border-radius: 8%;"> --}}
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">

                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('dashboard') }}" role="button"
                                aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li> <!-- end Dashboard Menu -->

                        @role('author')
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#submission" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> <span
                                        data-key="t-authentication">Submissions</span>
                                </a>
                                <div class="collapse menu-dropdown" id="submission">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            {{-- @dd($manuscript) --}}
                                            <a href="{{ route('submission.reset_manuscript') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Submit Manuscript </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('submitted_manuscripts.incomplete_manuscripts') }}"
                                                class="nav-link" data-key="t-calendar">
                                                Display Submitted Manuscripts </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('co_author_manuscripts.index') }}" class="nav-link" data-key="t-calendar">
                                                Display Co-Authored Manuscripts </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endrole
                        @role('reviewer')
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#reviwers" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> <span
                                        data-key="t-authentication">Reviewers</span>
                                </a>
                                <div class="collapse menu-dropdown" id="reviwers">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="" class="nav-link" data-key="t-calendar">
                                                Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endrole
                        @role('editor-in-chief', 'assistant-editor')
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#editor" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Academic
                                        Editor Menu</span>
                                </a>
                                <div class="collapse menu-dropdown" id="editor">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="" class="nav-link" data-key="t-calendar">
                                                Editor Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('decision.editor_decision') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Decisions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link" data-key="t-calendar">
                                                Pre-check Decisions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link" data-key="t-calendar">
                                                Special Issues</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        @endrole
                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="">
                                <i class="ri-account-circle-line"></i> <span data-key="t-authentication">App
                                    Object</span>
                            </a>
                        </li> --}}

                    </ul>

                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            &copy; 2025 Copyright Sarim Shahid
                            {{-- <a
                                href="https://incubatist.com/demo/NUPASS/public/">sarimshahid</a> --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button type="button" onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <!-- JAVASCRIPT -->
    @include('layouts.footer')
</body>

</html>
