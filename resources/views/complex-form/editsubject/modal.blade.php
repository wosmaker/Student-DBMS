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
						<form id="form_add_subject" method="POST" class="col" action= "editsubject">
							@csrf
							<div class="form-row">
									<div class="form-group col-md-3">
											<label for="subjectcode">Subject Code</label>
											<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder=""  value="">
									</div>

									<div class="form-group col-md-7">
											<label for="subjectname">Subject Name</label>
											<input type="text" class="form-control" id="subjectname" name="subjectname" placeholder=""  value="">
									</div>

									<div class="form-group col-md-2">
											<label for="subjectcredit">Credit</label>
											<input type="text" class="form-control" id="subjectcredit" name="subjectcredit" placeholder=""  value="">
									</div>
							</div>

							<div class="form-group">
									<label for="subjectdetail">Detail</label>
									<textarea class="form-control" id="subjectdetail" name="subjectdetail" placeholder="กรอกคำอธิบายรายวิชา" rows="4"></textarea>
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

				<form id="form_add_section" class="col">
					@csrf

					<div class="form-row">
							<div class="form-group col-md-8">
								<label for="subjectcode">Subject Code</label>
								<input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder="" readonly>
							</div>

							<div class="form-group col-md-4">
									<label for="sectionno">Section</label>
									<input type="text" class="form-control" id="sectionno" name="sectionno" placeholder="" >
							</div>
					</div>

					<div class="form-row">
							<div class="form-group col-md-8">
									<label for="price">Price</label>
									<input type="text" class="form-control" id="price" name="price" placeholder="" >
							</div>

							<div class="form-group col-md-4">
									<label for="seatavailable">Seat</label>
									<input type="text" class="form-control" id="seatavailable" name="seatavailable" placeholder="">
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




