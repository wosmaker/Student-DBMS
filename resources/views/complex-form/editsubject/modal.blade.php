<!-- Start Add subject Modal -->
<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="add_subjectlabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add_subjectlabel">Add Subject</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<form id="add_subject_form" method="POST" class="col" action= "editsubject">
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
					<button form="add_subject_form" type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END Add subject Modal -->
