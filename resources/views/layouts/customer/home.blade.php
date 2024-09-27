<!DOCTYPE HTML>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title') | {{ config('app.name') }}</title>
    <style>
        .navbar-nav .nav-link {
            padding: 10px 20px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
        }

        .header-main {
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        .widget-header .icon {
            display: inline-block;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .widget-header .icon:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    @vite(['resources/sass/store.scss', 'resources/js/store.js'])
</head>

<body>
@include('layouts.admin.partials.flash')
{{-- Header --}}
@include('layouts.customer.partials.header')
{{-- Header End --}}

@yield('content')

{{-- Footer --}}
@include('layouts.customer.partials.footer')
{{-- Footer End --}}

@stack('scripts')
</body>
</html>
