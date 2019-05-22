<div class="row">
	<div id="personal-form" class="shadow-sm p-3 mb-2 bg-white " style="width:600px;">
		<form class="col was-validated" id="form_save_personal_ondata"  novalidate>
			@csrf

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="identificationno">Identification No</label>
					<input type="number"  class="form-control" id="identificationno" name="identificationno" placeholder="" required>
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
					<select id="titlename" name="titlename" class="form-control" required>
						<option selected value="">Choose...</option>
						<option value="Mr">Mr</option>
						<option value="Mrs">Mrs</option>
						<option value="Ms">Ms</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-5">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required>
				</div>

				<div class="form-group col-md-5">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="gender">Gender</label>
					<select id="gender" name="gender" class="form-control" required>
						<option selected value = "">Choose...</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>

				<div class="form-group col-md-3">
					<label for="bloodtype">Blood</label>
					<select id="bloodtype" name="bloodtype" class="form-control" required>
						<option selected value="">Choose...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="O">O</option>
						<option value="AB">AB</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="birthdate">Date of Birth</label>
					<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Date of Birth" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="race">Race</label>
					<input type="text" class="form-control" id="race" name="race" placeholder="" required>
				</div>

				<div class="form-group col-md-4">
					<label for="Religion">religion</label>
					<input type="text" class="form-control" id="religion" name="religion" placeholder="" required>
				</div>

				<div class="form-group col-md-4">
					<label for="nationnality">Nationnality</label>
					<input type="text" class="form-control" id="nationnality" name="nationnality" placeholder="" required>
				</div>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="" required>
			</div>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="postcode">Zip</label>
					<input type="text" class="form-control" id="postcode" name="postcode" required>
				</div>

				<div class="form-group col-md-5">
					<label for="province">Province</label>
					<input type="text" class="form-control" id="province" name="province" placeholder="" required>
				</div>

				<div class="form-group col-md-5">
					<label for="district">District</label>
					<input type="text" class="form-control" id="district" name="district" placeholder="" required>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-7">
					<label for="subdistrict">Sub District</label>
					<input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
				</div>

				<div class="form-group col-md-5">
					<label for="usercontact">Contact</label>
					<input type="text" class="form-control" id="usercontact" name="usercontact" placeholder="" required>
				</div>

			</div>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>

	<div class="shadow-sm p-3 mb-2 bg-white">
		<form id="parent_form" class="col was-validated" method="post" action=""  novalidate>
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
