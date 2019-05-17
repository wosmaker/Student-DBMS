@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Edit Subject</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<div class="row justify-content-between mb-3 mx-0">
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
			<button class="btn btn-info" data-toggle="modal" data-target="#add_subject">ADD subject</button>
	</div>

		<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Subject Code</th>
						<th scope="col">Subject Name</th>
						<th scope="col">Credit</th>
						<th scope="col">Detail</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>

				</tbody>
			</table>
</div>

<div class="shadow-sm px-4 py-2 mb-2 bg-white rounded">
	<h5>Select subject</h5>
	<form id="subject_form" method="post" action= "">
			@csrf
			<div class="form-row">
					<div class="form-group col-md-4">
							<label for="subjectcode">Subject Code</label>
							<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder=""  readonly>
					</div>

					<div class="form-group col-md-2">
							<label for="sectionno">Section No</label>
							<input type="number" min="0" class="form-control" id="sectionno" name="sectionno" placeholder="" >
					</div>

					<div class="form-group col-md-3">
							<label for="price">Price</label>
							<input type="number" min="0" class="form-control" id="price" name="price" placeholder="" >
					</div>

					<div class="form-group col-md-3">
							<label for="seatavaiable">Seat</label>
							<input type="number" min="0" class="form-control" id="seatavaiable" name="seatavaiable" placeholder="">
					</div>
			</div>
	</form>
</div>

<div class="shadow-sm p-3 mb-2 bg-white rounded">
	<div class="row">
		<div class="col-md-6">
			<form method="post" action= "">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-3">
								<select class="custom-select" name="day">
									<option value="">Open this select day</option>
									<option value="monday">Monday</option>
									<option value="tuesday">Tuesday</option>
									<option value="wednesday">Wednesday</option>
									<option value="thursday">Thursday</option>
									<option value="friday">Friday</option>
								</select>
						</div>

						<div class="form-group col-md-2">
								<select class="custom-select" name="start">
									<option value="">Start</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
								</select>
						</div>

						<div class="form-group col-md-2">
								<select class="custom-select" name="end">
									<option value="">End</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
								</select>
						</div>
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</div>
			</form>

			<br>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Teacher </th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
					</tr>

				</tbody>
			</table>
		</div>

		<div class="col-md-6">
				<form class="form-inline ">
					<input class="form-control mr-sm-2" type="search" placeholder="Search teacher" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form><br>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Teacher </th>
						</tr>
					</thead>
					<tbody>

						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
						</tr>

					</tbody>
				</table>
		</div>
	</div>
</div>


<!-- Start Add subject Modal -->
<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="add_subjectlabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add_subjectlabel">Add Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="add_subject_form" method="post" class="col" action= "">
						@csrf
						<div class="form-row">
								<div class="form-group col-md-3">
										<label for="subjectcode">Subject Code</label>
										<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder=""  value="">
								</div>

								<div class="form-group col-md-7">
										<label for="subjectname">Subject Name</label>
										<input type="text" class="form-control" id="subjectname" name="subjectname" placeholder=""  value="">
								</div>

								<div class="form-group col-md-2">
										<label for="subjectcredit">Credit</label>
										<input type="text" class="form-control" id="subjectcredit" name="subjectcredit" placeholder=""  value="">
								</div>
						</div>

						<div class="form-group">
								<label for="subjectdetail">Detail</label>
								<textarea class="form-control" id="subjectdetail" name="subjectdetail" placeholder="กรอกคำอธิบายรายวิชา" rows="4"></textarea>
						</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button form="add_subject_form" type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- END Add subject Modal -->

@endsection

@section('script')
<script>

</script>
@endsection

@section('style')
<style>

</style>
@endsection
