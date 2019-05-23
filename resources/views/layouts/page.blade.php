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
                <main role="main" class="col-md-12" id="page_main">
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
		<script>
			console.log("onpage main")
			$(document).ready( function() {


				$( "#analytic_1" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_1')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_2" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_2')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_3" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_3')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_4" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_4')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_5" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_5')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				// $( "#analytic_6" ).click(function(e) {
				// 	e.preventDefault();
				// 	$.ajax({
				// 			type: "POST",
				// 			url: "{{route('analytic.analytic_6')}}",
				// 			data: {_token: "{{ csrf_token() }}"},
				// 			success: function(data) {
				// 				console.log("Debud:" +data);
				// 				$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
				// 				$('#page_main').fadeIn( 250 );
				// 			}
				// 	});
				// });

				$( "#analytic_7" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_7')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_8" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_8')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_9" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_9')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_10" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_10')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_11" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_11')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_12" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_12')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_13" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_13')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_14" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_14')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_15" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_15')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});

				$( "#analytic_16" ).click(function(e) {
					e.preventDefault();
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_16')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								$('#page_main').fadeOut(250,function(){	$('#page_main').empty().html(data);});
								$('#page_main').fadeIn( 250 );
							}
					});
				});



			});

		</script>

@endsection

