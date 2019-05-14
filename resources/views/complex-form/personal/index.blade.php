@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Person Information</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow-sm p-3 mb-3 bg-white ">
		<h4 class="d-inline py-5
		 ">Student ID: </h4>
</div>
<div class="row">
	<div id="personal-form" class="shadow-sm p-3 mb-2 bg-white " style="width:600px;">
		<form class="col" method="post" action= >
			@csrf

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="IdentificationNo">Identification No</label>
					<input type="text" class="form-control" id="IdentificationNo" name="IdentificationNo" placeholder="">
				</div>

				<div class="form-group col-md-6">
						<label for="DepartmentCode">Department</label>
						<select id="DepartmentCode" name="DepartmentCode" class="form-control">
							<option selected  value="">Choose>
							{{-- 	@foreach ($choose as $i)
									<option value="{{$i['DepartmentCode']}}">{{$i['DepartmentCode']}} :: {{$i['DepartmentName']}}</option>
								@endforeach--}}
						</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="TitleName">Title Name </label>
					<select id="TitleName" name="TitleName" class="form-control">
						<option selected value="">Choose...</option>
						<option value="Mr">Mr</option>
						<option value="Mrs">Mrs</option>
						<option value="Ms">Ms</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-5">
					<label for="FirstName">First Name</label>
					<input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="">
				</div>

				<div class="form-group col-md-5">
					<label for="LastName">Last Name</label>
					<input type="text" class="form-control" id="LastName" name="LastName" placeholder="">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="Gender">Gender</label>
					<select id="Gender" name="Gender" class="form-control">
						<option selected>Choose...</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-3">
					<label for="Bloodtype">Blood</label>
					<select id="Bloodtype" name="Bloodtype" class="form-control">
						<option selected>Choose...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="O">O</option>
						<option value="AB">AB</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="Birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="Birthdate" name="Birthdate" placeholder="Date of Birth">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="Race">Race</label>
					<input type="text" class="form-control" id="Race" name="Race" placeholder="">
				</div>

				<div class="form-group col-md-4">
					<label for="Religion">Religion</label>
					<input type="text" class="form-control" id="Religion" name="Religion" placeholder="">
				</div>

				<div class="form-group col-md-4">
					<label for="Nationnality">Nationnality</label>
					<input type="text" class="form-control" id="Nationnality" name="Nationnality" placeholder="">
				</div>
			</div>

			<div class="form-group">
				<label for="Address">Address</label>
				<input type="text" class="form-control" id="Address" name="Address" placeholder="">
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="Postcode">Zip</label>
					<input type="text" class="form-control" id="Postcode" name="Postcode">
				</div>

				<div class="form-group col-md-5">
					<label for="Province">Province</label>
					<input type="text" class="form-control" id="Province" name="Province" placeholder="">
				</div>

				<div class="form-group col-md-5">
					<label for="District">District</label>
					<input type="text" class="form-control" id="District" name="District" placeholder="">
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-7">
					<label for="SubDistrict">Sub District</label>
					<input type="text" class="form-control" id="SubDistrict" name="SubDistrict">
				</div>

				<div class="form-group col-md-5">
					<label for="UserContact">Contact</label>
					<input type="text" class="form-control" id="UserContact" name="UserContact" placeholder="">
				</div>

			</div>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">ADD</button>
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
 </script>
@endsection
