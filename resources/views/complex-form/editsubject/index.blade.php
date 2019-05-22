@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Manage Subject</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<div class="row justify-content-between mb-3 mx-0">
			<div class="input-group py-2 pl-0 " style="width:300px;">
				<input type="text" class="form-control" id="search_subject" placeholder="Search subject">
				<div class="input-group-append">
					<button class="btn btn-outline-success" id="fetch_subject">Search</button>
				</div>
			</div>

			<button class="btn btn-info my-2" id="btn_add_subject">+subject</button>
	</div>
	<div class="table-responsive-xl">
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
</div>

<div id="block_section">
	{{-- block of section for show table --}}
</div>

<div id="block_period">
	{{-- block of section for show table --}}
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

			$('#form_add_subject').one( 'submit', function(e) {
				e.preventDefault();
				$.ajax({
						type: "POST",
						url: "{{route('editsubject.add_subject')}}",
						data: $(this).serialize(),
						success: function(data) {
							swal("INSERT SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
							$('#tb_subject').fadeOut(250,function(){	$('#tb_subject').empty().html(data);});
							$('#tb_subject').fadeIn( 250 );
							$('#modal_add_subject').modal('hide');
							$( '#form_add_subject' ).trigger("reset");
						},
						error: function(data){
							console.log("Error :" + data);
						}
				});
			});
		});


		$(document).on('click', ".btn_add_section", function() {
			var options = {'backdrop': 'static'};
			var subjectcode = $(this).attr("id");

			$('#modal_add_section').modal(options).modal('show');
			$("#form_add_section #subjectcode").val(subjectcode);
			$( '#form_add_section' ).one( 'submit', function(e) {
				e.preventDefault();
				$.ajax({
						type: "POST",
						url: "{{route('editsubject.add_section')}}",
						data: $(this).serialize(),
						success: function(data) {
							swal("INSERT SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
							$('#block_section').fadeOut(250,function(){	$('#block_section').empty().html(data);});
							$('#block_section').fadeIn( 250 );
							$('#block_period').fadeOut( 250 );

							$('#modal_add_section').modal('hide');
							$( '#form_add_section' ).trigger("reset");
						},
						error: function(data){
							console.log("Error :" + data);
						}
				});
			});
		});

		$(document).on('click', ".btn_add_period", function() {
			var options = {'backdrop': 'static'};
			var subjectsectionid = $(this).attr("id");
			var sectionno = $(this).attr("data-sectionno");

			$('#modal_add_period').modal(options).modal('show');
			$("#form_add_period #subjectsectionid").val(subjectsectionid);
			$("#form_add_period #sectionno").val(sectionno);
			$("#label_period").html(sectionno);
			$("#form_add_period #teacher_userid").val(subjectsectionid);

			$( '#form_add_period' ).one( 'submit', function(e) {
				e.preventDefault();
				$.ajax({
						type: "POST",
						url: "{{route('editsubject.add_period')}}",
						data: $(this).serialize(),
						success: function(data) {
							swal("INSERT SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
							$('#block_period').empty().html(data);
							$('#block_period').show();
							$('#modal_add_period').modal('hide');
							$( '#form_add_period' ).trigger("reset");
						},
						error: function(data){
							console.log("Error :" + data);
						}
				});
			});
		});


		$('#block_section').hide();
		$('#block_period').hide();

		$(document).on('click', ".btn_detail_subject", function(e) {
			e.preventDefault();
			var query = $(this).attr("id");
				$.ajax({
					type:'POST',
					url:"{{route('editsubject.search_section')}}",
					data:{query:query, "_token": "{{ csrf_token() }}"},
					success:function(data){
						$('#block_section').fadeOut(250,function(){	$('#block_section').empty().html(data);});
						$('#block_section').fadeIn( 250 );
						$('#block_period').fadeOut( 250 );
					},
					error: function(data){
						console.log("Error :" + data);
					}
				});
		});


		$(document).on('click', ".btn_detail_section", function(e) {
			e.preventDefault();
			var query = $(this).attr("id");
			var sectionno = $(this).attr("data-sectionno");
				$.ajax({
					type:'POST',
					url:"{{route('editsubject.search_period')}}",
					data:{ "_token": "{{ csrf_token() }}",  query:query,sectionno:sectionno},
					success:function(data){
						$('#block_period').fadeOut(250,function(){	$('#block_period').empty().html(data);});
						$('#block_period').fadeIn( 250 );
					},
					error: function(data){
						console.log("Error :" + data);
					}
				});
		});

		$(document).on('click', ".btn_search_room", function(e) {
			e.preventDefault();
			var day = $('#form_add_period #day').val();
			var start = $('#form_add_period #start').val();
			var end = $('#form_add_period #end').val();

				$.ajax({
					type:'POST',
					url:"{{route('editsubject.search_room')}}",
					data:{day:day,start:start,end:end, "_token": "{{ csrf_token() }}"},
					success:function(data){
						$('#block_room').fadeOut(100,function(){	$('#block_room').empty().html(data);});
						$('#block_room').fadeIn( 100 );

					},
					error: function(data){
						console.log("Error :" + data);
					}
				});
		});

		$(document).on('click', ".btn_search_teacher", function(e) {
			e.preventDefault();
			var teacher_keyword = $('#form_add_period #teacher_keyword').val();

				$.ajax({
					type:'POST',
					url:"{{route('editsubject.search_teacher')}}",
					data:{teacher_keyword:teacher_keyword, "_token": "{{ csrf_token() }}"},
					success:function(data){
						$('#block_teacher').fadeOut(100,function(){	$('#block_teacher').empty().html(data);});
						$('#block_teacher').fadeIn( 100 );
					},
					error: function(data){
						console.log("Error :" + data);
					}
				});
		});

		$(document).on('click', ".btn_destroy_subject", function() {

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
							url:"{{route('editsubject.destroy_subject')}}",
							data: {_token: "{{ csrf_token() }}",subjectcode: id},
							success: function(data) {
								swal("DELETION SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
								$('#tb_subject').fadeOut(100,function(){	$('#tb_subject').empty().html(data);});
								$('#tb_subject').fadeIn( 100 );
							},
							error: function(data){
								console.log("Error :" + data);
							}
					});
				}
			});
		});

		$(document).on('click', ".btn_destroy_section", function() {

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
							url:"{{route('editsubject.destroy_section')}}",
							data: {_token: "{{ csrf_token() }}",subjectsectionid: id},
							success: function(data) {
								swal("DELETION SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
								$('#block_section').fadeOut(100,function(){	$('#block_section').empty().html(data);});
								$('#block_section').fadeIn( 100 );
							},
							error: function(data){
								console.log("Error :" + data);
							}
					});
				}
			});
		});

		$(document).on('click', ".btn_destroy_period", function() {

			swal({
				title: "WARNING",
				text: "Please make sure before delete or YOU WILL BE REGRET!!!!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					var sectionno = $(this).attr("sectionno");
					var periodno = $(this).attr("id");
					var subjectsectionid = $(this).attr("data-subjectsectionid");

					$.ajax({
							type: "POST",
							url:"{{route('editsubject.destroy_period')}}",
							data: {_token: "{{ csrf_token() }}",subjectsectionid: subjectsectionid,periodno:periodno, sectionno:sectionno},
							success: function(data) {
								swal("DELETION SUCCESS .... maybe", {icon: "success",timer: 1000,	buttons: false,});
								$('#block_period').fadeOut(100,function(){	$('#block_period').empty().html(data);});
								$('#block_period').fadeIn( 100 );
							},
							error: function(data){
								console.log("Error :" + data);
							}
					});
				}
			});
		});

		fetch_subject();
		$(document).on('click', '#fetch_subject', function() {
			var query = $('#search_subject').val();
			fetch_subject(query);
		});

		function fetch_subject(query = '')
		{
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

		$(".modal-wide").on("show.bs.modal", function() {
			var height = $(window).height() - 200;
			$(this).find(".modal-body").css("max-height", height);
		});
});
</script>
@endsection

@section('style')
<style>
.modal-lg {
    max-width: 90% !important;
}
</style>
@endsection
