<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/editor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @yield('page-head-scripts')
</head>
<body>
    <div id="app">
        <main class="py-0">
            <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6 mb-6 active">
              <div class="flex items-center flex-shrink-0 text-white mr-6">
                <!-- <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg> -->
                <span class="font-semibold text-xl tracking-tight">{{config('app.name')}}</span>
              </div>
<!--               <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                  <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
              </div> -->
              <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                  <a href="{{route('publicHome')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Guest Home
                  </a>
                  <a href="{{route('profiles.index')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Profiles
                  </a>
                  <a href="{{route('profiles.create')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    New Profile
                  </a>
                  <a href="{{route('pages.index')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Pages
                  </a>
                  <a href="{{route('pages.new')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    New Page
                  </a>
                  <a href="{{route('pics.index')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Images
                  </a>
                  <a href="{{route('pics.create')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    New Image
                  </a>
                  <a href="{{route('templates.index')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Templates
                  </a>
                  <a href="{{route('templates.create')}}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    New Template
                  </a>
                </div>
                <div>
                  <p class="inline-block">
                    <select class="appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="type" onchange="switchProfile(this)">
                      @foreach(auth()->user()->profiles as $profile)
                      <option value="{{$profile->id}}"  @if($profile->id == \Auth::user()->acting_profile_id) selected @endif>{{$profile->name}}</option>
                      @endforeach
                    </select>
                  </p>
                  <a href="{{ url('/logout') }}" class="no-underline inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Sign Out</a>
                </div>
              </div>
            </nav>
            @yield('content')
        </main>
    </div>
    @yield('page-last-scripts')
    <script type="text/javascript">
      function switchProfile(select) {
        $.post('{{ route('profiles.switch') }}', { 
          profile_id: select.value,
          _token: $('meta[name="csrf-token"]').attr('content')
        }).then(function() {
          location.reload();
        });
      }

      function goToUrl(url) {
        window.location.href=url;
      }
    </script>
</body>
</html>
