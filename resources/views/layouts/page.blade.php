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
				$( "#analytic_4" ).click(function(e) {
					e.preventDefault();
					console.log("click 4");
					$.ajax({
							type: "POST",
							url: "{{route('analytic.analytic_4')}}",
							data: {_token: "{{ csrf_token() }}"},
							success: function(data) {
								console.log("Debud:" +data);
								$('#page_main').empty().html(data);
							}
					});
				});



			});

		</script>

@endsection

