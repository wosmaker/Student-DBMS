@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Edit Subject</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<div class="row justify-content-between mb-3 mx-0">
			<div class="input-group py-2 pl-0 col-md-6">
				<input type="text" class="form-control" id="search_subject" placeholder="Search subject">
				<div class="input-group-append">
					<button class="btn btn-outline-success" id="fetch_subject">Search</button>
				</div>
			</div>

			<button class="btn btn-info my-2" id="btn_add_subject">+subject</button>
	</div>

		<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Subject Code</th>
						<th scope="col">Subject Name</th>
						<th scope="col">Credit</th>
						<th scope="col">Detail</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody id="tb_subject">

				</tbody>
			</table>
</div>

@if($section_lists != null)

	<div class="text-left pl-2 pt-3 pb-1">
			<h3>SECTION OF {{$subjectcode}}</h3>
	</div>

	<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">

		<div class="text-right">
				<button class="btn btn-info my-2" id="btn_add_section">+Section</button>
		</div>

		<table class="table table-hover table-responsive-lg">
			<thead>
				<tr>
					<th scope="col">Secion No</th>
					<th scope="col">Seat</th>
					<th scope="col">Price</th>
					<th scope="col">Manage</th>
				</tr>
			</thead>
			<tbody id="tb_section">

			</tbody>
		</table>
	</div>

	<div>
		@if($period_lists != null)
			<div class="row">
				<div>
					<h1>PERIOD TABLE</h1>
				</div>

				<div>
					<button type="submit" id="add_section">ADD PERIOD</button>
				</div>
			</div>

			<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
				<table class="table table-hover table-responsive-lg">
					<thead>
						<tr>
							<th scope="col">Secion No</th>
							<th scope="col">period no</th>
							<th scope="col">roomcode</th>
							<th scope="col">day</th>
							<th scope="col">period start</th>
							<th scope="col">period end</th>
							<th scope="col">Manage</th>
						</tr>
					</thead>
					<tbody>
						@foreach($period_lists as $period_list)
							<tr>
								{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
								<td>{{ $period_list->sectionno }}</td>
								<td>{{ $period_list->periodno }}</td>
								<td>{{ $period_list->roomcode }}</td>
								<td>{{ $period_list->day }}</td>
								<td>{{ $period_list->start_period }}</td>
								<td>{{ $period_list->end_period }}</td>
								<td>
									{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
									<form method="POST" action="editsubject/{id}">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger" type="submit" name="sectionid" value="{{ $period_list->subjectsectionid }}">DELETE</button>
											<input type="hidden" name="periodno" value="{{ $period_list->periodno }}">
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif
	</div>

@endif

<div class="shadow-sm px-4 py-2 mb-2 bg-white rounded" id="block1">
	<h5>Select subject</h5>
	<form id="subject_form" method="GET" action= "editsubject">
			@csrf
			<div class="form-row">
					<div class="form-group col-md-4">
							<label for="subjectcode">Subject Code</label>
							<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder="Choose From Above"  readonly>
					</div>

					<div class="form-group col-md-2">
							<label for="sectionno">Section No</label>
							<input type="number" min="0" class="form-control" id="sectionno" name="sectionno" placeholder="" >
					</div>

					<div class="form-group col-md-3">
							<label for="price">Price</label>
							<input type="number" min="0" class="form-control" id="price" name="price" placeholder="" >
					</div>

					<div class="form-group col-md-2">
							<label for="seatavaiable">Seat</label>
							<input type="number" min="0" class="form-control" id="seatavaiable" name="seatavaiable" placeholder="">
					</div>

					<div class="form-group col-md-1">
							<button class="btn" type="button" name="btn-next" id="btn-next" value="">NEXT</button>
					</div>
			</div>
	</form>
</div>

<div class="shadow-sm p-3 mb-2 bg-white rounded" id="block2">
	<div class="row">
		<div class="col-md-6">
			<form method="GET" action= "editsubject">
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
						<th scope="col">No</th>
						<th scope="col">RoomCode</th>
						<th scope="col">BuildingName</th>
						<th scope="col">Floor</th>
						<th scope="col">SeatTotal</th>
					</tr>
				</thead>
				<tbody>
					@if($roomfrees != null)
					@foreach($roomfrees as $roomfree)
						<tr  class="clickable-row">
							{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $roomfree->roomcode }}</td>
							<td>{{ $roomfree->buildingname}}</td>
							<td>{{ $roomfree->floor}}</td>
							<td>{{ $roomfree->roomseattotal}}</td>
							<td>
								<input  type="submit" id="{{"checkbox$loop->iteration"}}" name="roomcode" value="{{ $roomfree->roomcode }}">
							</td>
						</tr>
          			@endforeach
					@endif
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
				<form class="form-inline" method="GET" action="editsubject">
					@csrf
					<input class="form-control mr-sm-2" type="text" placeholder="Search teacher" aria-label="Search" name="teacher_name">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit_teacher" value="1">Search</button>
				</form><br>
				<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">FirstName</th>
								<th scope="col">LastName</th>
								<th scope="col">choose</th>
							</tr>
						</thead>
						<tbody>
							@if($teacher_lists != null)
							@foreach($teacher_lists as $teacher_list)
								<tr  class="clickable-row">
									{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $teacher_list->firstname }}</td>
									<td>{{ $teacher_list->lastname}}</td>
									<td>
										<input  type="radio" id="{{"checkbox$loop->iteration"}}" name="subjectsectionid" value="{{ $teacher_list->userid }}">
									</td>
								</tr>
							   @endforeach
							@endif
						</tbody>
					</table>
		</div>
	</div>
</div>


@include('complex-form.editsubject.modal')
@endsection

@section('script')
<script>
$(document).ready(function() {

	$(document).on('click', "#btn_add_subject", function() {
		var options = {
      'backdrop': 'static'
    };
    $('#modal_add_subject').modal(options).modal('show');

		console.log("IN MODEL: add subject");

		$('#form_add_subject').on( 'submit', function(e) {
			e.preventDefault();
			$.ajax({
					type: "POST",
					url: "{{route('editsubject.add_subject')}}",
					data: $(this).serialize(),
					success: function(data) {
						console.log("Debug :" + data);
						$('#tb_subject').empty().html(data);
						$('#modal_add_subject').modal('hide');
						$(this).trigger("reset");
					},
					error: function(data){
						console.log("Error :" + data);
					}
			});
		});
  });


	$(document).on('click', "#btn_add_section", function() {
		var options = {
      'backdrop': 'static'
    };
    $('#modal_add_section').modal(options).modal('show');

		console.log("IN MODEL: add section");

		$( '#form_add_section' ).on( 'submit', function(e) {
			e.preventDefault();
			$.ajax({
					type: "POST",
					url: "{{route('editsubject.add_section')}}",
					data: $(this).serialize(),
					success: function(data) {
						//console.log("Debug :" + data);
						$('#tb_section').empty().html(data);
						$('#modal_add_section').modal('hide');
						$(this).trigger("reset");
					},
					error: function(data){
						console.log("Error :" + data);
					}
			});
		});
  });

	$(document).on('click', ".btn_detail_subject", function() {
		var id = $(this).attr("id");
		// console.log("Debug:" + id);
		// console.log("URL:"+ "{{ route('problemreport.index') }}" +'/' + id +'/edit');

		$.get("{{ route('problemreport.index') }}" +'/' + id +'/edit', function (data) {
			// console.log("Debug de:" + data);

			data = data[0];
			$("#form_answer #problemtitle").val(data.problemtitle);
			$("#form_answer #problemtype").val(data.problemtypename);
			$("#form_answer #problemdetail").val(data.problemdetail);
			$("#form_answer #answerdetail").val(data.answerdetail);
			$("#form_answer #problemno").val(id);
			$('#modal_answer').modal('show');

			$( '#form_answer' ).on( 'submit', function(e) {
			e.preventDefault();
			var link = "{{route('problemreport.update')}}";
			// console.log("URL" + link);
			// console.log("DATE" + $(this).serialize())
			$.ajax({
					type: "POST",
					url:link,
					data: $(this).serialize(),
					success: function(data) {
						$('#form_answer' ).trigger("reset");
						$('#table1').empty().html(data);
					},
					error: function(data){
						console.log("Error :" + data);
					}
			});
			$('#modal_answer').modal('hide');
		});
		});
  });


	fetch_subject();
	$(document).on('click', '#fetch_subject', function() {
		var query = $('#search_subject').val();
		fetch_subject(query);
  });

	function fetch_subject(query = '')
 {
	console.log("search on:" + query +":");
  $.ajax({
   url:"{{route('editsubject.search_subject')}}",
   type:'POST',
   data:{query:query, "_token": "{{ csrf_token() }}"},
   success:function(data)
   {
			$('#tb_subject').empty().html(data);
		}
	});
 }

 $('#block1').hide();
 $('#block2').hide();




});
</script>
@endsection

@section('style')
<style>

</style>
@endsection
