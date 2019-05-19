<!-- Start Add subject Modal -->
<div class="modal fade" id="modal_add_subject" tabindex="-1" role="dialog" aria-labelledby="add_subjectlabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add_subjectlabel">Add Subject</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<form id="form_add_subject"  class="col was-validated">
							@csrf
							<div class="form-row">
									<div class="form-group col-md-3">
											<label for="subjectcode">Subject Code</label>
											<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder=""  value="" required>
									</div>

									<div class="form-group col-md-7">
											<label for="subjectname">Subject Name</label>
											<input type="text" class="form-control" id="subjectname" name="subjectname" placeholder=""  value="" required>
									</div>

									<div class="form-group col-md-2">
											<label for="subjectcredit">Credit</label>
											<input type="text" class="form-control" id="subjectcredit" name="subjectcredit" placeholder=""  value="" required>
									</div>
							</div>

							<div class="form-group">
									<label for="subjectdetail">Detail</label>
									<textarea class="form-control" id="subjectdetail" name="subjectdetail" placeholder="กรอกคำอธิบายรายวิชา" rows="4" required></textarea>
							</div>
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button form="form_add_subject" type="submit" class="btn btn-primary">ADD subject</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END Add subject Modal -->



<!-- Start Add section Modal -->
<div class="modal fade" id="modal_add_section" tabindex="-1" role="dialog" aria-labelledby="add_subjectlabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add_subjectlabel">Add Section</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form id="form_add_section" class="col  was-validated">
					@csrf

					<div class="form-row">
							<div class="form-group col-md-8">
								<label for="subjectcode">Subject Code</label>
								<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder="" readonly>
							</div>

							<div class="form-group col-md-4">
									<label for="sectionno">Section No</label>
									<input type="number" class="form-control" id="sectionno" name="sectionno" placeholder="" >
							</div>
					</div>

					<div class="form-row">
							<div class="form-group col-md-8">
									<label for="price">Price</label>
									<input type="number" class="form-control" id="price" name="price" placeholder="" >
							</div>

							<div class="form-group col-md-4">
									<label for="seatavailable">Seat</label>
									<input type="number" class="form-control" id="seatavailable" name="seatavailable" placeholder="">
							</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button form="form_add_section" type="submit" class="btn btn-primary">ADD Section</button>
			</div>
		</div>
	</div>
</div>
<!-- END Add section Modal -->


<!-- Start Add period Modal -->
<div class="modal fade" id="modal_add_period" tabindex="-1" role="dialog" aria-labelledby="add_subjectlabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_label_period">Add period to section : <span id="label_period"> </span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form id="form_add_period" class="col  was-validated">
						@csrf
						<input type="hidden" id="subjectsectionid" name="subjectsectionid">

						<div class="form-row">
								<div class="form-group col-md-2">
									<label for="periodno">Period No</label>
									<input type="number" class="form-control" id="periodno" name="periodno" placeholder="">
								</div>

								<div class="form-group col-md-3">
										<label for="day">Day</label>
										<select class="custom-select" name="day" id="day">
												<option value="">Choose day</option>
												<option value="monday">Monday</option>
												<option value="tuesday">Tuesday</option>
												<option value="wednesday">Wednesday</option>
												<option value="thursday">Thursday</option>
												<option value="friday">Friday</option>
											</select>
								</div>

								<div class="form-group col-md-3">
									<label for="start">Start period</label>
									<select class="custom-select" name="start" id="start">
											<option value="">Start</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
								</div>

								<div class="form-group col-md-3">
										<label for="end">End period</label>
										<select class="custom-select" name="end" id="end">
												<option value="">Start</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
											</select>
								</div>

						</div>
					</form>
					<div id="block_room">

					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button form="form_add_period" type="submit" class="btn btn-primary">ADD Period</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END Add period Modal -->





