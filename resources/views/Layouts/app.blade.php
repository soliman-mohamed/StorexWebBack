<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    <title>{{ __(env("APP_NAME")) }} - @yield('title')</title>

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo.webp') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.webp') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/logo.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.webp') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/logo.webp') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    @yield('styles')
  </head>
  <body>
    @if (Route::currentRouteName('login') =='login')
        @yield('content')
    @else
        @include('Layouts.sidebar')
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
            @include('Layouts.navbar')
            <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            </div>
        </div>
    @endif

    <div class="toast-container position-fixed top-0 @if(app()->getLocale() == 'ar') start-0 @else end-0 @endif p-3">
        @include('Layouts.success')
        @include('Layouts.error')
    </div>

    <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    @yield('scripts')
  </body>
</html>
