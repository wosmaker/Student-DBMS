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
	<div id="form_show">
		@include('complex-form.personal.form_wtdata')
	</div>
@endif

@endsection



@section('script')
 <script>
	$(document).ready( function() {


		$( '#form_save_personal_ondata' ).on( 'submit', function(e) {
			e.preventDefault();
			console.log("test save nodata");

				$.ajax({
						type: "patch",
						url: "{{route('personal.update')}}",
						data: $(this).serialize(),
						success: function(data) {
							$('#form_show').empty().html(data);
						},
						error: function (reject) {
                // if( reject.status === 422 ) {
                //     var errors = $.parseJSON(reject.responseText);
								// 		$.each(errors, function (key, item)
								// 			{
								// 				$("#errors").append("<li class='alert alert-danger'>"+item+"</li>")
								// 			});
                // }
            }
				});
		});


		$( '#form_save_personal' ).on( 'submit', function(e) {
			e.preventDefault();

				$.ajax({
						type: "patch",
						url: "{{route('personal.update')}}",
						data: $(this).serialize(),
						success: function(data) {
							$('#form_show').empty().html(data);
						},
						error: function (reject) {
                // if( reject.status === 422 ) {
                //     var errors = $.parseJSON(reject.responseText);
								// 		$.each(errors, function (key, item)
								// 			{
								// 				$("#errors").append("<li class='alert alert-danger'>"+item+"</li>")
								// 			});
                // }
            }
				});
		});


	});
 </script>
@endsection
