@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Confirm Receipt</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow p-3 mb-3 bg-white">
		<h4 class="d-inline p-2 ">Name: {{ $userdetail->firstname }} {{ $userdetail->lastname}} </h4>
		<h4 class="d-inline p-5 ">ID: {{ $userdetail->userid }}</h4>
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
									<th scope="col">FirstName</th>
									<th scope="col">LastName</th>
									<th scope="col">Bank</th>
									<th scope="col">Link</th>
									<th scope="col">DateTime</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
							</tr>
					</thead>
					<tbody id="tb_confirm">
						@include('complex-form.confirm-receipt.tb_confirm')
					</tbody>
			</table>
		</div>
</div>

@endsection

@section('script')
<script>

$(document).ready( function() {

	$(document).on('click', ".btn_update_confirm", function(e) {
			e.preventDefault();
			// console.log("confirm is push");
			swal({
			title: "Are you sure?",
			text: "Did check twice ?",
			icon: "warning",
			buttons: [true, "Confirm"],
			dangerMode: true,
			}).then((isTrue) => {
				if (isTrue) {
					var id = $(this).attr("id");
						$.ajax({
							type:'POST',
							url:"{{route('confirmreceipt.confirm')}}",
							data:{id:id,_token: "{{ csrf_token() }}"},
							success:function(data){
								// console.log("confirm is push success");
								swal("UPDATE SUCCESS ...",{ icon: "success",timer: 1000,	buttons: false,});
								$('#tb_confirm').empty().html(data);
							},
							error: function(data){
								console.log("Error :" + data);
							}
						});
				}
			});
		});

	$(document).on('click', ".btn_update_denied", function(e) {
			e.preventDefault();
			// console.log("denied is push");
			swal({
				title: "Are you sure?",
				text: "Did check twice ?",
				icon: "warning",
				buttons: [true, "Denied"],
				dangerMode: true,
			}).then((isTrue) => {
				if (isTrue) {
					var id = $(this).attr("id");
					$.ajax({
							type:'POST',
							url:"{{route('confirmreceipt.denied')}}",
							data:{id:id,_token: "{{ csrf_token() }}"},
							success:function(data){
								// console.log("denied is push success");
								swal("DENIED SUCCESS ...",{ icon: "success",timer: 1000,	buttons: false,});
								$('#tb_confirm').empty().html(data);
							},
							error: function(data){
								console.log("Error :" + data);
							}
						});
				}
			});
		});

	});
</script>
@endsection

@section('style')
<style>

</style>
@endsection
