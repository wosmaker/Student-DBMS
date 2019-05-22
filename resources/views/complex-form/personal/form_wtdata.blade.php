<div class="row">
	<div id="personal-form" class="shadow-sm p-3 mb-2 bg-white " style="width:600px;">
		<form class="col was-validated " id="form_save_personal"  novalidate>
			@csrf
			@method('patch')
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="identificationno">Identification No</label>
					<input type="text" class="form-control" id="identificationno" name="identificationno" value=" {{ $userdetail->identificationno }}" required>
				</div>

				<div class="form-group col-md-6">
						<label for="departmentcode">Department</label>
						<select id="departmentcode" name="departmentcode" class="form-control" >
							<option selected  value="">Choose</option>
								@foreach($departments as $department)
									<option value="{{ $department->departmentcode}}" name="departmentcode">{{ $department->departmentname }}</option>
								@endforeach
						</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="titlename">Title Name </label>
					<select id="titlename" name="titlename" class="form-control" required>
						<option value="">Choose...</option>
						<option {{ $userdetail->title == "Mr" ? 'selected':'' }} value="Mr">Mr</option>
						<option {{ $userdetail->title == "Mrs" ? 'selected':'' }} value="Mrs">Mrs</option>
						<option {{ $userdetail->title == "Ms" ? 'selected':'' }} value="Ms">Ms</option>
						<option {{ $userdetail->title == "Other" ? 'selected':'' }} value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-5">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" id="firstname" name="firstname" value="{{ $userdetail->firstname }}" required>
				</div>

				<div class="form-group col-md-5">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" id="lastname" name="lastname" value="{{ $userdetail->lastname }}" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="gender">Gender</label>
					<select id="gender" name="gender" class="form-control" required>
						<option selected>{{ $userdetail->gender }}</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-3">
					<label for="bloodtype">Blood</label>
					<select id="bloodtype" name="bloodtype" class="form-control" required>
						<option selected>{{ $userdetail->bloodtype }}</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="O">O</option>
						<option value="AB">AB</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $userdetail->birthdate }}" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="race">Race</label>
					<input type="text" class="form-control" id="race" name="race" value="{{ $userdetail->race }}" required>
				</div>

				<div class="form-group col-md-4">
					<label for="Religion">religion</label>
					<input type="text" class="form-control" id="religion" name="religion" value="{{ $userdetail->religion }}" required>
				</div>

				<div class="form-group col-md-4">
					<label for="nationnality">Nationnality</label>
					<input type="text" class="form-control" id="nationnality" name="nationnality" value="{{ $userdetail->nationnality }}" required>
				</div>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address" name="address" value="{{ $userdetail->address }}" required>
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="postcode">Zip</label>
					<input type="text" class="form-control" id="postcode" name="postcode" value="{{ $userdetail->postcode }}" required>
				</div>

				<div class="form-group col-md-5">
					<label for="province">Province</label>
					<input type="text" class="form-control" id="province" name="province" value="{{ $userdetail->province }}" required>
				</div>

				<div class="form-group col-md-5">
					<label for="district">District</label>
					<input type="text" class="form-control" id="district" name="district" value="{{ $userdetail->district }}" required>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-7">
					<label for="subdistrict">Sub District</label>
					<input type="text" class="form-control" id="subdistrict" name="subdistrict" value="{{ $userdetail->subdistrict }}" required>
				</div>

				<div class="form-group col-md-5">
					<label for="usercontact">Contact</label>
					<input type="text" class="form-control" id="usercontact" name="usercontact" value="{{ $userdetail->usercontact }}" required>
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
					<input type="text" class="form-control" id="parent_firstname" name="parent_firstname" value="" required>
				</div>

				<div class="form-group col-md-6">
					<label for="parent_lastname">Last Name</label>
					<input type="text" class="form-control" id="parent_lastname" name="parent_lastname" value="" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="parent_birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="parent_birthdate" name="parent_birthdate" value="Date of Birth" required>
				</div>

				<div class="form-group col-md-6">
					<label for="parent_contract">Contact</label>
					<input type="text" class="form-control" id="parent_contract" name="parent_contract" value="" required>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" id="send_parent_form" class="btn btn-primary">ADD</button>
			</div>

		</form>
	</div>

</div>