<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:image:width" content="1080">
    <meta property="og:image:height" content="720">
    <meta name="description" content="@yield('description')">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
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
            <nav class="flex max-w-screen-xl mx-auto items-center justify-between flex-wrap bg-white-500 p-6 mb-6 active pr-5">
              <div class="flex items-center flex-shrink-0 text-teal-700 mr-6">
                <span class="font-semibold text-xl tracking-tight font-serif">
                  <a href="{{route('publicHome')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-4">
                    <h1>{{config('app.name')}}</h1>
                  </a>
                </span>
              </div>
              <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                </div>
                <div>
                  @auth
                  <a href="{{route('profiles.index')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-4">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                  </a>
                  <a href="{{ url('/logout') }}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-4">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                  </a>
                  @endauth
                  @guest
                  <a href="{{ url('/login') }}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-4">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                  </a>
                  <a href="{{ url('/register') }}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-4">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                  </a>
                  @endguest
                  <a href="#" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-3 ml-3"></a>
                </div>
              </div>
            </nav>
            @yield('content')
        </main>
    </div>
    @yield('page-last-scripts')
</body>
</html>
