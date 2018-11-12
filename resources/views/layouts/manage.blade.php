<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Check-Bee</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    @yield('dynamicCSS')
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-lg-2">

        @include('partials._nav')

                </div>

        <div class="col-sm-9 col-lg-10">
            <div id="content">
            @yield('content')
            </div>
        </div>

            </div> {{-- and of row --}}
        </div> {{-- end of container --}}
    </div>

    @include('partials._javascript')

    @yield('dynamicJS')

    @include('partials._myAjax')
</body>
</html>
