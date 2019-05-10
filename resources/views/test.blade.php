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

  <table class="table table-borderless table-hover table-responsive-sm ">
    <thead>
      <tr>
        <th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">ProblemType</th>
        <th scope="col">Reporter</th>
				<th scope="col">Department</th>
				<th scope="col">DateTime</th>
				<th scope="col">Status</th>
      </tr>
    </thead>

    <tbody>
      <tr>
				@foreach($problemreports as $problemreport)
				<th scope="row">{{ $loop->iteration }}</th>
				<td>{{ $problemreport->ProblemTitle }}</td>
				<td>{{ $problemreport->ProblemTypeName }}</td>
				<td>{{ $problemreport->FirstName }} {{ $problemreport->LastName }}</td>
				<td>{{ $problemreport->DepartmentName }}</td>
				<td>{{ $problemreport->ProblemDateTime }}</td>
				<td>{{ $problemreport->ProblemStatus }}</td>
				<td>
						<form method="GET" action="problemreport">
								@csrf
								<button class="btn btn-danger" type="submit" name="btn" value="">DETAIL</button>
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail">DETAIL</button>
						</form>
				</td>
				@endforeach
      </tr>
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
					<form id="problemreport" class="col" method="POST" action= "problemreport" >
							{{ csrf_field() }}
					
							<div class="form-group">
									<label for="problem-title">Title</label>
									<input type="text" class="form-control" id="problem-title" name="problemtitle" placeholder="">
							</div>

							<div class="form-group">
									<label class="mr-sm-2 sr-only" for="problemtype">ProblemType</label>
									<select class="custom-select mr-sm-2" id="problemtype-choose" name="problemtype">
										<option selected  value="">Choose ProblemType</option>
										@foreach($problemtypes as $problemtype)
											<option value="{{ $problemtype->ProblemTypeID }}">{{ $problemtype->ProblemTypeName }}</option>
										@endforeach
									</select>
							</div>

							<div class="form-group">
									<label for="problem-detail">Detail</label>
									<textarea class="form-control" id="problem-detail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  ></textarea>
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

<!--Start Modal add problem -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label2">Report Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="problem-detail" class="col" method="POST" action= "problemreport" >
							{{ csrf_field() }}
					
							<div class="form-group">
									<label for="problem-title">Title</label>
									<input type="text" class="form-control" id="problem-title" name="problemtitle" placeholder="">
							</div>

							<div class="form-group">
									<label class="mr-sm-2 sr-only" for="problemtype">ProblemType</label>
									<select class="custom-select mr-sm-2" id="problemtype-choose" name="problemtype">
										<option selected  value="">Choose ProblemType</option>
										@foreach($problemtypes as $problemtype)
											<option value="{{ $problemtype->ProblemTypeID }}">{{ $problemtype->ProblemTypeName }}</option>
										@endforeach
									</select>
							</div>

							<div class="form-group">
									<label for="problem-detail">Detail</label>
									<textarea class="form-control" id="problem-detail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  ></textarea>
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



@endsection

@section('script')
<script>
$(document).ready(function() {
  /**
   * for showing edit item popup
   */

  $(document).on('click', "#problem-detail", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#problem-detail').modal(options)
  })

  // on modal show
  $('#problem-detail').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var description = row.children(".description").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(name);
    $("#modal-input-description").val(description);

  })

  // on modal hide
  $('#problem-detail').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})
</script>
@endsection

@section('style')
<style>

</style>
@endsection