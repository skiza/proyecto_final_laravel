<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('meta')

    <title>@yield('title', trans('web.home_title_head'))</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontAwesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <!-- CUSTOM STYLES -->
    @yield('style_links')
    <link rel="stylesheet" href="{{ asset('css/helpers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
     
    </style>
    <!-- / CUSTOM STYLES -->
    @yield('custom_styles')
    <!-- Scripts -->
</head>
<body class="fit_and_up">
    
    @if (Auth::guard('admin')->check())
        @include('www.includes.admin_header')
    @else
        @include('www.includes.header')
    @endif
    <div class="main">
        @yield('main')
    </div>
    @include('www.includes.footer')
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('vendor/jquery/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
     <script type="text/javascript">
         $(function() {
            $('#navbarSideButton').on('click', function() {
                $('#navbarSide').addClass('reveal');
            });
          
            // Open navbarSide when button is clicked
              $('#navbarSideButton').on('click', function() {
                $('#navbarSide').addClass('reveal');
                $('.overlay').show();
              });
            
              // Close navbarSide when the outside of menu is clicked
              $('.overlay ,#close-side').on('click', function(){
                $('#navbarSide').removeClass('reveal');
                $('.overlay').hide();
              });
        });
     </script>
     @yield('scripts')
    <!-- /CUSTOM SCRIPTS -->
</body>