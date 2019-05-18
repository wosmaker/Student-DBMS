@extends('layouts.html')

@section('html-body')
    <div id="app" class="bg-0">
				@include('partial.navbar')
        <div class="container-fluid">
					<main role="main" class="py-4">
							@yield('content')
					</main>
				</div>
    </div>
    @yield('script')
@endsection

