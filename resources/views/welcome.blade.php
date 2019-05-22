@extends('layouts.html')
@section('html-body')

    <div class="container" style="height:100vh">
			<div class="row justify-content-center pt-5">
				<div class="shadow p-3 bg-white rounded" style="width:500px;">
					@guest
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
							</div>

							<div class="form-group mb-0">
								<button type="submit" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Login') }}</button>
								<button class="btn btn-warning btn-lg btn-block mb-2" data-toggle="modal" data-target="#register">{{ __('Register') }}</button>
							</div>
					</form>
				@endguest

			</div>
	</div>
</div>
@include('partial.modal-register')

@endsection
