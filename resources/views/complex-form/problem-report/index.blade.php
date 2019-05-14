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
		<div class="shadow-none px-2 py-2 mb-3 bg-white border-bottom">
				<div class="row justify-content-around">

					<div class="col text-left">
						<h4  class="text-dark  ">PROBLEM</h4>
					</div>

					<div class="col text-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#problem-report">Report Problem</button>
					</div>

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
			@foreach($problemreports as $problemreport)
      <tr class="problem-data">
				<th scope="row">{{ $loop->iteration }}</th>
				<td class="ProblemTitle">{{ $problemreport->problemtitle }}</td>
				<td class="ProblemTypeName">{{ $problemreport->problemtypename }}</td>
				<td class="">{{ $problemreport->firstname }} {{ $problemreport->lastname }}</td>
				<td class="">{{ $problemreport->departmentname }}</td>
				<td class="">{{ $problemreport->problemdatetime }}</td>
				<td class="ProblemStatus">{{ $problemreport->problemstatus }}</td>

				<td class="none ProblemDetail">{{ $problemreport->problemdetail }}</td>
				<td class="none AnswerDetail">{{ $problemreport->answerdetail }}</td>
				<td>
					<div class="row">
						{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
						<form  method="POST" action="problemreport/{problemreport}">
							@csrf
							@method('DELETE')
							<input type="hidden" name="deleteID" value="{{ $problemreport->problemno }}">
							<button class="btn btn-danger btn-sm" type="submit" >DELETE</button>
						</form>

						<button type="button" class="btn btn-info btn-sm ml-2" id="detail">DETAIL</button>
						@if($userrole === 3)
							<button type="button" class="btn btn-success btn-sm ml-2" id="answer">ANSWER</button>
						@endif
					</div>
				</td>
			</tr>
			@endforeach
    </tbody>
  </table>
</div>

<!--Start Modal add problem -->
<div class="modal fade" id="problem-report" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label1">Report Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="problemreport" class=" needs-validation col" method="POST" action= "problemreport" novalidate>
							@csrf

							<div class="form-group">
									<label for="problem-title">Title</label>
									<input type="text" class="form-control" id="problem-title" name="problemtitle" placeholder="" required>
							</div>

							<div class="form-group">
									<label class="mr-sm-2 sr-only" for="problemtype">ProblemType</label>
									<select class="custom-select mr-sm-2" id="problemtype-choose" name="problemtype" required>
										<option selected  value="">Choose ProblemType</option>
										@foreach($problemtypes as $problemtype)
											<option value="{{ $problemtype->problemtypeid }}">{{ $problemtype->problemtypename }}</option>
										@endforeach
									</select>
							</div>

							<div class="form-group">
									<label for="problem-detail">Detail</label>
									<textarea class="form-control" id="problem-detail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..." required></textarea>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button form="problemreport" type="submit" class="btn btn-primary">Sent</button>
							</div>
					</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal add problem -->

<!--Start Modal show problem -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label2">Report Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="form-modal" class="col" method="POST" action="" >

							<div class="form-group">
									<label for="problemtitle">Title</label>
									<input type="text" class="form-control" id="problemtitle" name="problemtitle" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemtype">Problem Type</label>
									<input type="text" class="form-control" id="problemtype" name="problemtype" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemdetail">Detail</label>
									<textarea class="form-control" id="problemdetail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  readonly ></textarea>
							</div>

							<div class="form-group">
									<label for="answerdetail">Answer</label>
									<textarea class="form-control" id="answerdetail" name="answerdetail" rows="4" placeholder="ยังไม่ตอบ..."  readonly ></textarea>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
					</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal show problem -->


<!--Start Modal answer problem -->

<div class="modal fade" id="answer-modal" tabindex="-1" role="dialog" aria-labelledby="label3" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="label3">Answer Problem</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<form id="form-answer" class="col" method="POST" action="problemreport/{problemreport}" >
							@csrf
							@method('PATCH')
								<div class="form-group">
										<label for="problemtitle1">Title</label>
										<input type="text" class="form-control" id="problemtitle1" name="problemtitle" placeholder="" readonly >
								</div>

								<div class="form-group">
										<label for="problemtype1">Problem Type</label>
										<input type="text" class="form-control" id="problemtype1" name="problemtype" placeholder="" readonly >
								</div>

								<div class="form-group">
										<label for="problemdetail1">Detail</label>
										<textarea class="form-control" id="problemdetail1" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  readonly ></textarea>
								</div>

								<div class="form-group">
										<label for="answerdetail1">Answer</label>
										<textarea class="form-control" id="answerdetail1" name="answerdetail" rows="4" placeholder="ยังไม่ตอบ..." ></textarea>
								</div>
								@if($problemreports)
									<div>
										<input type="hidden" name="answerID" value="{{ $problemreport->problemno }}">
									</div>
								@endif
						</form>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button form="form-answer" class="btn btn-success ml-2" type="submit" >ANSWER</button>
							</div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Modal answer problem -->





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

$(document).ready(function() {
  /**
   * for showing edit item popup
   */

  $(document).on('click', "#detail", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
    var options = {
      'backdrop': 'static'
    };
    $('#detail-modal').modal(options)
  })

  // on modal show
  $('#detail-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
    var row = el.closest(".problem-data");

    // get the data
    var problemtitle = row.children(".ProblemTitle").text();
		var problemtype = row.children(".ProblemTypeName").text();
		var problemdetail = row.children(".ProblemDetail").text();
		var answerdetail = row.children(".AnswerDetail").text();

    // fill the data in the input fields
    $("#problemtitle").val(problemtitle);
		$("#problemtype").val(problemtype);
		$("#problemdetail").val(problemdetail);
		$("#answerdetail").val(answerdetail);
  })


  // on modal hide
  $('#detail-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#form-modal").trigger("reset");
  })

	$(document).on('click', '#answer', function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#answer-modal').modal(options)
  })

  // on modal show
  $('#answer-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
    var row = el.closest(".problem-data");

    // get the data
    var problemtitle = row.children(".ProblemTitle").text();
		var problemtype = row.children(".ProblemTypeName").text();
		var problemdetail = row.children(".ProblemDetail").text();
		var answerdetail = row.children(".AnswerDetail").text();

    // fill the data in the input fields
    $("#problemtitle1").val(problemtitle);
		$("#problemtype1").val(problemtype);
		$("#problemdetail1").val(problemdetail);
		$("#answerdetail1").val(answerdetail);
  })


  // on modal hide
  $('#answer-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#form-answer").trigger("reset");
  })

})

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
