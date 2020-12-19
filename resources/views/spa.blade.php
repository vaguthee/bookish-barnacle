<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>{{config('app.name')}}</title>
    <link href="{{ mix('css/spa.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body class="bg-gray-400">
<div id="spa" class="px-3 md:px-56 py-0 mx-auto">
    <NavBar></NavBar>
    <router-view></router-view>
</div>
<script>
    window.Spa = @json($spaVariables);
</script>
<script src="{{ mix('js/spa.js') }}" type="text/javascript"></script>
</body>
</html>
