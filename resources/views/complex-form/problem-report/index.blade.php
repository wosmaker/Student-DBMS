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
			<h4  class="text-dark ">PROBLEM</h4>
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
				<th scope="col">DateTime</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="table1">
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
		// console.log("IN ADD form");
		$( '#form_add' ).on( 'submit', function(e) {
			e.preventDefault();
			$.ajax({
					type: "POST",
					url: "{{route('problemreport.store')}}",
					data: $(this).serialize(),
					success: function(data) {
						//console.log("Debug :" + data);
						$('#table1').empty().html(data);
					},
					error: function(data){
						console.log("Error :" + data);
					}
			});
			$('#modal_add').modal('hide');
			$('#form_add' ).trigger("reset");
		});
  });

	$(document).on('click', ".btn_show", function() {
		var id = $(this).attr("id");
		$.get("{{ route('problemreport.index') }}" +'/' + id +'/edit', function (data) {
			// console.log("Debug de:" + data);

			data = data[0];
			$("#form_show #problemtitle").val(data.problemtitle);
			$("#form_show #problemtype").val(data.problemtypename);
			$("#form_show #problemdetail").val(data.problemdetail);
			$("#form_show #answerdetail").val(data.answerdetail);
			$('#modal_show').modal('show');
		});
  });


	$(document).on('click', ".btn_answer", function() {
		var id = $(this).attr("id");
		// console.log("Debug:" + id);
		// console.log("URL:"+ "{{ route('problemreport.index') }}" +'/' + id +'/edit');

		$.get("{{ route('problemreport.index') }}" +'/' + id +'/edit', function (data) {
				data = data[0];
				$("#form_answer #problemtitle").val(data.problemtitle);
				$("#form_answer #problemtype").val(data.problemtypename);
				$("#form_answer #problemdetail").val(data.problemdetail);
				$("#form_answer #answerdetail").val(data.answerdetail);
				$("#form_answer #problemno").val(id);
				$('#modal_answer').modal('show');
		});


		$( '#form_answer' ).on( 'submit', function(e) {
			e.preventDefault();
			$(this).addClass( "was-validated" );
			// var check =$(this).validate().form();
			// 	if(check){
					$.ajax({
							type: "POST",
							url:"{{route('problemreport.update')}}",
							data: $(this).serialize(),
							success: function(data) {
								$(this).trigger("reset").removeClass( "was-validated");
								$('#table1').empty().html(data);
							},
							error: function(data){
								console.log("Error :" + data);
							}
					});
					$(this).removeClass( "was-validated");
				// }
			});
  });

	$(document).on('click', ".btn_destroy", function() {

		if (confirm('Are you sure you want to Delete ?')) {
			var id = $(this).attr("id");
			console.log("Debug:" + id);
			$.ajax({
					type: "POST",
					url:"{{route('problemreport.destroy')}}",
					data: {_token: "{{ csrf_token() }}",_method: 'delete',id: id},
					success: function(data) {
						console.log("DELETE COMP :" + data);
						setTimeout("alert('DELETE COMPLETE');", 2000);
					},
					error: function(data){
						setTimeout("alert('DELETE FAIL');", 2000);
						console.log("Error :" + data);
					}
			});
		}
  });

});

$( "p" ).removeClass( "myClass noClass" ).addClass( "yourClass" );

</script>
@endsection

@section('style')
<style>

</style>
@endsection
