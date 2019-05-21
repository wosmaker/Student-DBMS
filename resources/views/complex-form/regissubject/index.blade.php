@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Registed Subject</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow p-3 mb-3 bg-white ">
		<h4 class="d-inline p-2 ">Name: {{ $userdetail->firstname }} {{ $userdetail->lastname}} </h4>
		<h4 class="d-inline p-5 ">Student ID: {{ $userdetail->userid }}</h4>
		@if(Session::has('alert'))
		<div class="alert alert-danger  alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{Session::get('alert')}}
		</div>
		@endif

		@if(Session::has('success'))
				<div class="alert alert-success  alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						{{Session::get('success')}}
				</div>
		@endif
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
		{{-- ตารางแสดงรายวิชาที่ลงทะเบียนแล้ว --}}
		<div class="table-responsive">
			<table class="table table-hover">
					<thead>
							<tr>
									<th scope="col">No</th>
									<th scope="col">SubjectCode</th>
									<th scope="col">SubjectName</th>
									<th scope="col">Credit</th>
									<th scope="col">Section</th>
									<th scope="col">Day</th>
									<th scope="col">Start Period</th>
									<th scope="col">End Period</th>
									<th scope="col">Delete</th>
							</tr>
					</thead>
					<tbody id="tb_subject_regist">
						@include('complex-form.regissubject.tb_subject_regist')
					</tbody>
			</table>
		</div>
</div>


	<div class="shadow-sm p-3 mb-2 bg-white ">
	{{-- ช่องค้นหาวิชา --}}
			<div class="input-group  pl-0 mb-2" style="width:300px;">
				<input type="text" class="form-control" id="search_subject" placeholder="Search subject">
				<div class="input-group-append">
					<button class="btn btn-outline-success" id="btn_search_subject">Search</button>
				</div>
			</div>

			<form id="registration">
				@csrf
				{{-- ตารางแสดงวิชาที่ค้นหา --}}
				<div class="table-responsive">
					<table class="table table-hover ">
							<thead>
									<tr>
											<th scope="col">No</th>
											<th scope="col">Subject Code</th>
											<th scope="col">Subject Name</th>
											<th scope="col">Section</th>
											<th scope="col">SeatAvailable</th>
											<th scope="col">Day</th>
											<th scope="col">Start Period</th>
											<th scope="col">End Period</th>
											<th scope="col">Choose</th>
									</tr>
							</thead>
							<tbody id="tb_subject">
								{{-- query table with ajax only --}}
							</tbody>
					</table>
				</div>
				<div class="text-right">
					{{-- ปุ่มยืนยันเพิ่มวิชา --}}
					<button class="btn btn-info" type="submit">ADD THIS SUBJECT</button>
				</div>
			</form>
	</div>

{{-- ปุ่มไปหน้าอัพเดทใบเสร็จ --}}
@if($subjectdetails != null)
    <div class="p-3 shadow-lg bg-white">
        <div class="text-center">
            <button class="btn btn-info  shadow" onclick="window.location.href = 'updatereceipt';">CONFIRM REGISTRATION</button>
        </div>
    </div>
@endif

@endsection

@section('script')
 <script>
 $(document).ready(function() {

	$(document).on('click', ".btn_destroy_regist", function() {
			swal({
				title: "WARNING",
				text: "Please make sure before delete or YOU WILL BE REGRET!!!!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					var id = $(this).attr("id");
					console.log("Debug:" + id);
					$.ajax({
							type: "POST",
							url:"{{route('regissubject.destroy')}}",
							data: {_token: "{{ csrf_token() }}" ,_method: 'delete',id: id},
							success: function(data) {
								swal("DELETION SUCCESS .... maybe", {icon: "success",});
								var query = $('#search_subject').val();
								search_subject(query)
								$('#tb_subject_regist').empty().html(data);
							},
							error: function(data){
								console.log("Error :" + data);
							}
					});
				}
			});
		});

		$('#registration').on( 'submit', function(e) {
			e.preventDefault();
			console.log("check in submit");
			$.ajax({
					type: "POST",
					url: "{{route('regissubject.store')}}",
					data: $(this).serialize(),
					success: function(data) {
						var query = $('#search_subject').val();
						search_subject(query)
						$('#tb_subject_regist').empty().html(data);
						$( '#registration' ).trigger("reset");
					},
					error: function(data){
						console.log("Error :" + data);
					}
			});
		});


		search_subject();
		$(document).on('click', '#btn_search_subject', function() {
			var query = $('#search_subject').val();
			search_subject(query);
		});

		function search_subject(query = '')
		{
			console.log("search on:" + query +":");
			$.ajax({
				url:"{{route('regissubject.search_subject')}}",
				type:'POST',
				data:{query:query, "_token": "{{ csrf_token() }}"},
				success:function(data)
				{
					//console.log("Debug Response:" + data);
					$('#tb_subject').empty().html(data);
				},
				error:function(data)
				{
					console.log("Error: " +data);
				}
			});
		}

});
 </script>
@endsection
