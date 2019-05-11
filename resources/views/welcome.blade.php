<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">


    <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        @yield('style')

        <style>
            body{
                height: 100vh;
            }

        .navbar {
            color: #FFFFFF;
            background-color: #525D3E;
        }

        .hv{
            height: 100vh;
        }

        .mtop{
            margin-top: 70px;
        }

        </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-dark fixed-top box-shadow" >
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px; color: #ffffff;">SDBR</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nbar" aria-controls="nbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid hv mtop" >
            <div class="mx-auto" style="width: 500px;">
                <div class="card">
                    <div class="card-body">
                        @include('partial.login')
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


