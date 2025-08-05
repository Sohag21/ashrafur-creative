<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="author" content="Dextar">
    <title>Ashrafur Creative</title>

    <link rel="apple-touch-icon" href="{{ asset('storage/' . $settings->photo) }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $settings->photo) }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/vendors/data-tables/css/select.dataTables.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/vendors/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/themes/vertical-menu-nav-dark-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/themes/vertical-menu-nav-dark-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/pages/data-tables.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
    @yield('css')
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible 2-columns  " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">

    <!-- BEGIN: Header-->
        @include('layouts.partial.back.header')
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    @include('layouts.partial.back.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        @yield('content')
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->
        @include('layouts.partial.back.footer')
    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->

    <script src="{{ asset('/app-assets/back/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/vendors/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/js/plugins.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/js/custom/custom-script.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('/app-assets/back/vendors/data-tables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/vendors/data-tables/js/dataTables.select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/js/scripts/data-tables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/js/scripts/form-file-uploads.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/back/js/scripts/advance-ui-modals.js') }}" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    @yield('scripts')
  </body>
</html>