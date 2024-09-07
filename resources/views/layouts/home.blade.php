<!DOCTYPE HTML>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    @vite(['resources/sass/store.scss', 'resources/js/store.js'])
</head>

<body>
{{-- Header --}}
@include('home.components.header')
{{-- Header End --}}

@yield('content')

{{-- Footer --}}
@include('home.components.footer')
{{-- Footer End --}}

@stack('scripts')
</body>
</html>
