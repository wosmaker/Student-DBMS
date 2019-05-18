@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Problem Report</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm p-3 mb-2 bg-white ">
      <h4 class="d-inline p-2 ">Name: {{ $userdetail->FirstName }} {{ $userdetail->LastName}} </h4>
      <h4 class="d-inline p-5 ">Student ID:  {{ $userdetail->UserID }} </h4>
</div>

<div class="shadow-sm p-3 mb-3 bg-white ">

	<div class="row justify-content-around">
		<div class="col text-left">
			<h4  class="text-dark  ">PROBLEM</h4>
		</div>

		<div class="col text-right">
			<button type="button" class="btn btn-info" id="btn_add">Report Problem</button>
		</div>
	</div>

  <table class="table table-borderless table-hover table-responsive-lg ">
    <thead>
      <tr>
        <th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">ProblemType</th>
        <th scope="col">Reporter</th>
				<th scope="col">Department</th>
				<th scope="col">DateTime</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
				@include('complex-form.problem-report.problem_tb')
    </tbody>
  </table>
</div>


@include('complex-form.problem-report.modal')
@endsection

@section('script')
<script>


$(document).ready(function() {

	$(document).on('click', "#btn_add", function() {
    var options = {
      'backdrop': 'static'
    };
    $('#modal_add').modal(options);
		$('#modal_add').modal('show');
		console.log("IN ADD form");
		$( '#form_add' ).on( 'submit', function() {
			$.ajax({
					type: "POST",
					url: "{{route('problemreport.store')}}",
					data: $('#form_add').serialize(),
					success: function(data) {
						console.log("Debug :" + data);
						//$('tbody').empty().html(data);
					}
			});
			$('#modal_add').modal('hide');
			$('#form_add' ).trigger("reset");
		});
  });







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

});

</script>
@endsection

@section('style')
<style>
	.none
	{
		display:none;
	}
</style>
@endsection
