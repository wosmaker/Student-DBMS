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



        .bg {
                /* The image used */
                background: url("/img/bg2.jpg");

                position: fixed;
                top: 0;
                left: 0;

                /* Preserve aspet ratio */
                min-width: 100%;
                min-height: 100%;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

        .box-shadow{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        </style>
</head>

<body>
    <div id="app" class="bg-0">
        <nav class="navbar navbar-expand-md  navbar-dark fixed-top box-shadow" >
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px; color: #ffffff;">SDBR</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nbar" aria-controls="nbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid">
            <div class="row jusified-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body" style="weight:400px">
                        @include('partial.login')
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


