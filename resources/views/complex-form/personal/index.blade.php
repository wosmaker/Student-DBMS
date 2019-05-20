@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Person Information</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow-sm p-3 mb-3 bg-white ">
		<h4 class="d-inline py-5">Student ID: {{ $userdetail->userid }}</h4>
</div>
<div class="row">
	<div id="personal-form" class="shadow-sm p-3 mb-2 bg-white " style="width:600px;">
		<form class="col" method="POST" action="personal" >
			@csrf

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="identificationno">Identification No</label>
					<input type="text" class="form-control" id="identificationno" name="identificationno" placeholder="">
				</div>

				<div class="form-group col-md-6">
						<label for="departmentcode">Department</label>
						<select id="departmentcode" name="departmentcode" class="form-control">
							<option selected  value="">Choose Department</option>
								@foreach($departments as $department)
									<option value="{{ $department->departmentcode}}" name="departmentcode">{{ $department->departmentname }}</option>
								@endforeach
						</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="titlename">Title Name </label>
					<select id="titlename" name="titlename" class="form-control">
						<option selected value="">Choose...</option>
						<option value="Mr">Mr</option>
						<option value="Mrs">Mrs</option>
						<option value="Ms">Ms</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-5">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
				</div>

				<div class="form-group col-md-5">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="gender">Gender</label>
					<select id="gender" name="gender" class="form-control">
						<option selected>Choose...</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-3">
					<label for="bloodtype">Blood</label>
					<select id="bloodtype" name="bloodtype" class="form-control">
						<option selected>Choose...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="O">O</option>
						<option value="AB">AB</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Date of Birth">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="race">Race</label>
					<input type="text" class="form-control" id="race" name="race" placeholder="">
				</div>

				<div class="form-group col-md-4">
					<label for="Religion">religion</label>
					<input type="text" class="form-control" id="religion" name="religion" placeholder="">
				</div>

				<div class="form-group col-md-4">
					<label for="nationnality">Nationnality</label>
					<input type="text" class="form-control" id="nationnality" name="nationnality" placeholder="">
				</div>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="">
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="postcode">Zip</label>
					<input type="text" class="form-control" id="postcode" name="postcode">
				</div>

				<div class="form-group col-md-5">
					<label for="province">Province</label>
					<input type="text" class="form-control" id="province" name="province" placeholder="">
				</div>

				<div class="form-group col-md-5">
					<label for="district">District</label>
					<input type="text" class="form-control" id="district" name="district" placeholder="">
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-7">
					<label for="subdistrict">Sub District</label>
					<input type="text" class="form-control" id="subdistrict" name="subdistrict">
				</div>

				<div class="form-group col-md-5">
					<label for="usercontact">Contact</label>
					<input type="text" class="form-control" id="usercontact" name="usercontact" placeholder="">
				</div>

			</div>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>

	<div class="shadow-sm p-3 mb-2 bg-white">
		<form id="parent_form" class="col needs-validation" method="post" action=""  novalidate>
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="parent_firstname">First Name</label>
					<input type="text" class="form-control" id="parent_firstname" name="parent_firstname" placeholder="" required>
				</div>

				<div class="form-group col-md-6">
					<label for="parent_lastname">Last Name</label>
					<input type="text" class="form-control" id="parent_lastname" name="parent_lastname" placeholder="" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="parent_birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="parent_birthdate" name="parent_birthdate" placeholder="Date of Birth" required>
				</div>

				<div class="form-group col-md-6">
					<label for="parent_contract">Contact</label>
					<input type="text" class="form-control" id="parent_contract" name="parent_contract" placeholder="" required>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" id="send_parent_form" class="btn btn-primary">ADD</button>
			</div>

		</form>
	</div>

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

if (typeof jQuery != 'undefined') {
    // jQuery is loaded => print the version
		alert(jQuery.fn.jquery);
		console.log("find jquery");
}
else {
	console.log("can't find jquery");

}
	});

 </script>
@endsection
