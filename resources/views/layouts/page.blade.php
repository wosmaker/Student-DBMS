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
				@include('partial.navbar')
        <div class="container-fluid">
            <div class="row">
								<!-- sidebar -->
									<nav class="d-none d-md-block bg-white shadow sidebar">
											@include('partial.sidebar')
									</nav>

                <main role="main" class="col-md-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <!-- start page main -->
                        @yield('page-head')
                         <!-- end page main -->
                    </div>
                    <!-- start page main -->
                    @yield('page-main')
										<!-- end page main -->
                </main>
            </div>
        </div>
    </div>
    @yield('script')
</body>
</html>
