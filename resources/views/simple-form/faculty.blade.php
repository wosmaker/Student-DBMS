@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Faculty</h1></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">ADD Data</button>


@endsection

@section('page-main')

<div class="shadow-sm p-3 mb-2 bg-white ">
		<table class="table table-hover">
				<thead>
						<tr>
								<th>Faculty Code</th>
								<th>Name</th>
								<th>Tel</th>
								<th>Edit</th>
								<th>Delete</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($tb as $item)
								<tr class="data">
										<td class="code">{{$item->facultycode}}</td>
										<td class="name">{{$item->facultyname}}</td>
										<td class="contact">{{$item->facultycontact}}</td>
										<td><button type="button" class="btn btn-warning btn-sm edit_btn" id="{{$item->facultycode}}">EDIT</button></td>
										<td><button type="button" class="btn btn-warning btn-sm " id="{{$item->facultycode}}">DELETE 2</button></td>

										<td>
											<form class="delete_form delete_btn" id="{{$item->facultycode}}" action="">
												@csrf
												<input type="hidden" value="delete" name="_method" />
												<button type="submit" class="btn btn-danger btn-sm">DELETE</button>
											</form>
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>
</div>


<!-- The Modal ADD-->
<div class="modal fade" id="add" tabindex="-1"  aria-labelledby="addlabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="addlabel">New message</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
							<form id="add_form" class="col"  method ="post" action = {{route('faculty.store')}} >
								@csrf
									<div class="form-group">
													<label for="facultycode">รหัสคณะ</label>
													<input type="text" class="form-control" id="facultycode" name="facultycode" placeholder="">
									</div>
									<div class="form-row">
											<div class="form-group col-md-8">
															<label for="facultyname">ชื่อคณะ</label>
															<input type="text" class="form-control" id="facultyname"  name="facultyname"  placeholder="">
											</div>

											<div class="form-group col-md-4">
															<label for="facultycontact">เบอร์ติดต่อ</label>
															<input type="text" class="form-control" id="facultycontact"  name="facultycontact"  placeholder="">
											</div>
									</div>
							</form>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button form="add_form" type="submit" class="btn btn-primary">ADD faculty</button>
					</div>

				</div>
		</div>
</div>
<!--End modal-->

<!-- The Modal EDIT -->
<div class="modal fade" id="edit" tabindex="-1"  aria-labelledby="editlabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="editlabel">Edit Faculty</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
					<form id="edit_form" class="col" >
							@csrf
								<div class="form-group">
												<label for="facultycode">รหัสคณะ</label>
												<input type="text" class="form-control" id="facultycode" name="facultycode" placeholder="">
								</div>
								<div class="form-row">
										<div class="form-group col-md-8">
														<label for="facultyname">ชื่อคณะ</label>
														<input type="text" class="form-control" id="facultyname"  name="facultyname"  placeholder="">
										</div>

										<div class="form-group col-md-4">
														<label for="facultycontact">เบอร์ติดต่อ</label>
														<input type="text" class="form-control" id="facultycontact"  name="facultycontact"  placeholder="">
										</div>
								</div>
						</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="edit_form" type="submit" class="btn btn-primary">Edit Data</button>
			</div>

		</div>
	</div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
	$(document).on('click', '.edit_btn', function() {
		console.log("request edit");
		var facultycode = $(this).attr("id");
    var options = {'backdrop': 'static'};

		$('#edit').modal(options);
		$.get("{{ route('faculty.index') }}" +'/' + facultycode +'/edit', function (data) {
			data = data[0];
			$("#edit_form #facultycode").val(data.facultycode);
			$("#edit_form #facultyname").val(data.facultyname);
			$(" #edit_form #facultycontact").val(data.facultycontact);
			$('#edit').modal('show');
		});
  });





	$( '#add_form' ).on( 'submit', function(e) {
    var href = $(this).data('value');
		e.preventDefault();
		console.log("Debug :" + $(this).serialize());
    $.ajax({
        type: "POST",
        url: "{{route('faculty.store')}}",
				data: $(this).serialize(),
        success: function(data) {
					$('tbody').empty().html(data);
        }
		});
		$('#add').modal('hide');
		$('#add_form' ).trigger("reset");
	});


	$(document).on('click', '.delete_btn', function() {
		console.log("delete request");
		var facultycode = $(this).attr("id");
		console.log(facultycode);

		if(confirm("Are You sure want to delete !"))
		{
			$.ajax({
				url: "{{route('faculty.store')}}" + "/destroy/"+facultycode,
				success: function(data) {
					console.log(data);
					setTimeout(function(){}, 2000);
        },
				error: function (data) {
					console.log('Error:', data);
				}
		});
		}


  });
});
</script>
@endsection
