@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Person Information</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow-sm p-3 mb-3 bg-white ">
		<h4 class="d-inline py-5">Student ID: {{ $userid }}</h4>
</div>

@if($userdetail == null)
	@include('complex-form.personal.form_nodata')
@endif

@if($userdetail != null)
	@include('complex-form.personal.form_wtdata')
@endif

@endsection
	


@section('script')
 <script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();

	$(document).ready( function() {

if (typeof jQuery != 'undefined') {
    // jQuery is loaded => print the version
		alert(jQuery.fn.jquery);
		console.log("find jquery");
}
else {
	console.log("can't find jquery");

}
	});

 </script>
@endsection
