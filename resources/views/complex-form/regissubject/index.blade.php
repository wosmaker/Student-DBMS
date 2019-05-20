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
    <table class="table table-hover table-responsive-lg">
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
        <tbody>
            @foreach($regissubjects as $regissubject)
                <tr>
                    {{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $regissubject->subjectcode }}</td>
                    <td>{{ $regissubject->subjectname }}</td>
                    <td>{{ $regissubject->subjectcredit }}</td>
                    <td>{{ $regissubject->sectionno }}</td>
                    <td>{{ $regissubject->day }}</td>
                    <td>{{ $regissubject->start_period }}</td>
                    <td>{{ $regissubject->end_period }}</td>
                    <td>
                        {{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
                        <form method="POST" action="regissubject/{regissubject}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" name="btn" value="{{ $regissubject->subjectsectionid }}">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

	{{-- ช่องค้นหาวิชา --}}
	<div class="shadow-sm p-3 mb-2 bg-white ">

			<div class="input-group py-2 pl-0 col-md-6">
				<input type="text" class="form-control" id="search_subject" placeholder="Search subject">
				<div class="input-group-append">
					<button class="btn btn-outline-success" id="btn_search_subject">Search</button>
				</div>
			</div>

			<form method="POST" action="regissubject" id="example">
				@csrf
				{{-- ตารางแสดงวิชาที่ค้นหา --}}
				<table class="table table-hover table-responsive-md">
						<thead>
								<tr>
										<th scope="col">No</th>
										<th scope="col">Subject Code</th>
										<th scope="col">Section</th>
										<th scope="col">SeatAvailable</th>
										<th scope="col">Day</th>
										<th scope="col">Start Period</th>
										<th scope="col">End Period</th>
										<th scope="col">Choose</th>
								</tr>
						</thead>
						<tbody id="tb_subject">

						</tbody>
				</table>

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

	$(document).on('click', "#btn_add_regissubject", function() {
			var options = {
				'backdrop': 'static'
			};
			$('#modal_add_subject').modal(options).modal('show');

			console.log("IN MODEL: add subject");

			$('#form_add_subject').one( 'submit', function(e) {
				e.preventDefault();
				$.ajax({
						type: "POST",
						url: "{{route('editsubject.add_subject')}}",
						data: $(this).serialize(),
						success: function(data) {
							console.log("Debug :" + data);
							$('#tb_subject').empty().html(data);
							$('#modal_add_subject').modal('hide');
							$( '#form_add_subject' ).trigger("reset");
						},
						error: function(data){
							console.log("Error :" + data);
						}
				});
			});
		});

		search_subject();

		$(document).on('click', '#btn_search_subject', function() {
			var query = $('#search_subject').val();
			console.log("Debug search key:" + query +":");
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
						$('#tb_subject').empty().html(data);
				},
				error:function(data)
				{
					console.log("Error: " +data);
				}
			});
		}






    var table = $('#example').DataTable();

    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    });


});
 </script>
@endsection
