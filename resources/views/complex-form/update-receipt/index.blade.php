@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Update Receipt</h1></div>
@endsection

@section('page-main')
<div class="shadow-sm p-3 mb-2 bg-white ">
  <h4 class="d-inline p-2 ">Name: {{ $userdetail->firstname }} {{ $userdetail->lastname}} </h4>
  <h4 class="d-inline p-5 ">Student ID: {{ $userdetail->userid }}</h4>
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
  <h4 class="text-dark">รายวิขาที่ลงทะเบียน</h4>

  <table class="table table-borderless table-hover table-responsive-lg ">
    <thead>
      <tr>
          <th scope="col">No</th>
          <th scope="col">SubjectCode</th>
          <th scope="col">SubjectName</th>
          <th scope="col">Credit</th>
          <th scope="col">Section</th>
      </tr>
    </thead>

    <tbody>
      @foreach($regissubjects as $regissubject)
          <tr>
              {{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $regissubject->subjectcode }}</td>
              <td>{{ $regissubject->subjectname }}</td>
              <td>{{ $regissubject->sectionno }}</td>
              <td>{{ $regissubject->subjectcredit }}</td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
    <form class="needs-validation" method="POST" action="updatereceipt" enctype="multipart/form-data"  novalidate>
      @csrf
      <div class="form-row mb-4">
				<div class="form-group col-4">
					<select class="custom-select mr-sm-2" id="bank-choose" name="paymenttype" required>
						<option selected  value="">Choose bank</option>
						@foreach($paymenttypes as $paymenttype)
							<option value="{{ $paymenttype->paymenttypeid}}">{{ $paymenttype->paymenttypename }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-4 pl-4 ">
					<div class="input-group ">
							<input type="number" class="form-control" name="amount" min="1" placeholder="Input amount" required>
							<div class="input-group-append">
								<span class="input-group-text">Bath</span>
							</div>
					</div>
				</div>
      </div>

      <div class="shadow-sm p-3 mb-4 bg-white ">
        <div class="form-group">
          <div class="input-group">
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="imgInp" id="imgInp" aria-describedby="imgInp" required>
                <label class="custom-file-label" for="imgInp" aria-readonly="true">Choose Receipt file</label>
              </div>
            </div>
          <img id='img-upload' class="shadow bg-white">
        </div>
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

		$("#imgInp").change(function(){
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
