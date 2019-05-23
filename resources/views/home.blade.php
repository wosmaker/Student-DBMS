	@extends('layouts.page')

	@section('page-main')
	<div class="container">
			<div class="row justify-content-center">
					<div class="col-md-8">
							<div class="card">
									<div class="card-header">Dashboard</div>

									<div class="card-body">
											@if (session('status'))
													<div class="alert alert-success" role="alert">
															{{ session('status') }}
													</div>
											@endif
											<h3>You are logged in! </h3>

											{{-- Your RoleID is {{ $role }} --}}
									</div>
							</div>
					</div>
			</div>
	</div>
	@endsection
