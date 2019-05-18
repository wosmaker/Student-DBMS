@extends('layouts.html')

@section('html-body')
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
@endsection

