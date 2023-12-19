<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">
    <head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- CSS Styles -->
        @include('backend.components.styles')
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- Header  -->
            @include('backend.layouts.header')

            <!-- removeNotificationModal -->

            @include('backend.components.notifications')

            <!-- ========== App Menu ========== -->
            @include('backend.layouts.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @yield('content')

            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        @include('backend.components.settings')

        <!-- All Scripts -->
        @include('backend.components.scripts')

    </body>

</html>