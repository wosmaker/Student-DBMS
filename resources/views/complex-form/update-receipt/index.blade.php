@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Confirmation Payment</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm p-3 mb-2 bg-white ">
  <h4 class="d-inline p-2 ">Name: {{ $userdetail->firstname }} {{ $userdetail->lastname}} </h4>
  <h4 class="d-inline p-5 ">Student ID: {{ $userdetail->userid }}</h4>
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
  <h4 class="text-dark">Course Registration</h4>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
						<th scope="col">#</th>
						<th scope="col">Subject Code</th>
						<th scope="col">Name</th>
						<th scope="col">Credit</th>
						<th scope="col">Section Number</th>
				</tr>
			</thead>
			<tbody id="tb_regist">
				@include('complex-form.update-receipt.tb_regist')
			</table>
	</div>
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
    {{-- ตารางแสดงรายวิชาที่ลงทะเบียนแล้ว --}}
    <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Bank</th>
                <th scope="col">Link</th>
                <th scope="col">Date Time</th>
                <th scope="col">Status</th>
                <th scope="col">Confirm</th>
            </tr>
        </thead>
        <tbody id="tb_transaction">
					@include('complex-form.update-receipt.tb_transaction')
        </tbody>
    </table>
</div>

<div class="shadow-none p-3 mb-2 bg-white ">
    <form method="POST" class="was-validation" id="form_sent_receipt #" enctype="multipart/form-data" action="{{route('updatereceipt.store')}}"  novalidate>
      @csrf
      <div class="form-row mb-4">
				<div class="form-group col-4">
					<select class="custom-select mr-sm-2" id="bank_choose" name="paymenttype" required>
						<option selected  value="">Choose bank</option>
						@foreach($paymenttypes as $paymenttype)
							<option value="{{ $paymenttype->paymenttypeid}}">{{ $paymenttype->paymenttypename }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-4 pl-4 ">
					<div class="input-group ">
							<input type="number" class="form-control" id="amount" name="amount" min="1" placeholder="Input amount" required>
							<div class="input-group-append">
								<span class="input-group-text">Bath</span>
							</div>
					</div>
				</div>
      </div>

			<div class="form-group">
				<div class="input-group">
						<div class="custom-file mb-3">
							<input type="file" class="custom-file-input" name="image" id="image" required>
							<label class="custom-file-label" for="image" aria-readonly="true">Choose Receipt file</label>
						</div>
					</div>
				<img id='img-upload' class="shadow bg-white">
			</div>

      <div class="text-right ">
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
    </form>
</div>


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

$(document).ready( function() {
	$(document).on('click', ".btn_destroy_confirm", function() {
		swal({
			title: "Are you sure?",
			text: "Please make sure before delete or YOU WILL BE REGRET!!!!!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then(() => {
			if (isTrue) {
				var id = $(this).attr("id");
				$.ajax({
						type: "POST",
						url:"{{route('updatereceipt.destroy')}}",
						data: {_token: "{{ csrf_token() }}",_method:'delete',id: id},
						success: function(data) {
							console.log(data);
							$('#tb_transaction').empty().html(data);
							swal("DELETION SUCCESS .... maybe", { icon: "success",timer: 1000,	buttons: false,});
						},
						error: function(data){
							console.log("Error :" + data);
						}
				});
			}
		});
	});

	console.log(" cheed ksend image");

		$( '#form_sent_receipt').on( 'submit', function(e) {
				e.preventDefault();
				console.log(" send image");

				var bank_choose = $('#bank_choose').val();
				var amount = $('#amount').val();
				var image = $('#image')[0].files[0];

				// new form = new FormData();
				// form_data.append('_token', '{{csrf_token()}}');
				// form.append('paymenttype', bank_choose);
				// form.append('amount', amount);
				// form.append('image', image);

				$.ajax({
								type: "POST",
								url: "{{route('updatereceipt.store')}}",
								data: {_token:"{{csrf_token()}}",paymenttype:bank_choose,amount:amount,image:image},
								contentType: false,
								success: function(data) {
									console.log("complete send image");
									$('#tb_transaction').empty().html(data);
									swal("Send SUCCESS ...",{ icon: "success",timer: 1000,	buttons: false,});
									$( '#form_sent_receipt' ).trigger("reset");
								},
								error: function(data){
									console.log("Error :" + data);
								}
						});
		});



		$('.btn-file :file').on('fileselect', function(event, label) {

		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }

		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
    }

		$("#image").change(function(){
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
		    readURL(this);
		});
	});
</script>
@endsection

@section('style')
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
@endsection
