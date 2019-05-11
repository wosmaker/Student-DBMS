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
                background-color: #525D3E;
            }

        .navbar {
            color: #FFFFFF;
            background-color: #525D3E;
        }


        </style>
</head>

<body>
    <div class="container" style="height:100vh">
    <div class="row justify-content-center pt-5">
    <div class="shadow p-3 bg-white rounded" style="width:500px;">
        <form method="POST" class="col"  action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal text-center">Student Registration</h1>

            <div class="form-group">
                <label for="email" >{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group ">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="text-right">
                        <button class="btn button-blue" data-toggle="modal" data-target="#register">{{ __('Register') }}</button>
                    </div>
            </div>

            <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Login') }}</button>

            </div>
        </form>
        </div>
    </div>
</div>
@include('partial.modal-register')

</body>


