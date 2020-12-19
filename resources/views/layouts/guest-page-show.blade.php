<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image','/logo.png')">
    <meta property="og:image:width" content="1080">
    <meta property="og:image:height" content="720">
    <meta name="description" content="@yield('description')">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image','/logo.png')">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @yield('page-head-scripts')
    @if(config('app.ga_id'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167948538-5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', "{{config('app.ga_id')}}");
    </script>
    @endif
</head>
<body>
    <div id="app">
        <main class="py-0">
          @auth
          <loggedin-navbar></loggedin-navbar>
          @endauth
          @guest
          <guest-navbar></guest-navbar>
          @endguest
          @yield('content')
        </main>
    </div>
    @yield('page-last-scripts')
</body>
</html>
