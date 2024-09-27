<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
          name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>دیجی ارومیه|@yield('title')</title>

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    @routes
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        @include('layouts.admin.partials.flash')
        <div class="navbar-bg"></div>

        @include('layouts.admin.partials.navbar')

        @include('layouts.admin.partials.sidebar')

        <div class="main-content">
            @yield('content')
        </div>

        @include('layouts.admin.partials.footer')
    </div>
</div>
@stack('modals')
<script type="module">
    // Set up the CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')
</body>

</html>
