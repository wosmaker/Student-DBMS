<!--Start Modal add problem -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label1">Report Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="form_add" class=" needs-validation col"   novalidate>
							@csrf

							<div class="form-group">
									<label for="problem-title">Title</label>
									<input type="text" class="form-control" id="problem-title" name="problemtitle" placeholder="" required>
							</div>

							<div class="form-group">
									<label class="mr-sm-2 sr-only" for="problemtype">ProblemType</label>
									<select class="custom-select mr-sm-2" id="problemtype-choose" name="problemtype" required>
										<option selected  value="">Choose ProblemType</option>
										@foreach($problemtypes as $problemtype)
											<option value="{{ $problemtype->problemtypeid }}">{{ $problemtype->problemtypename }}</option>
										@endforeach
									</select>
							</div>

							<div class="form-group">
									<label for="problem-detail">Detail</label>
									<textarea class="form-control" id="problem-detail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..." required></textarea>
							</div>
					</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button form="form_add" type="submit" class="btn btn-primary">Sent problem</button>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal add problem -->

{{-- <!--Start Modal show problem -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label2">Report Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="form-modal" class="col" method="POST" action="" >

							<div class="form-group">
									<label for="problemtitle">Title</label>
									<input type="text" class="form-control" id="problemtitle" name="problemtitle" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemtype">Problem Type</label>
									<input type="text" class="form-control" id="problemtype" name="problemtype" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemdetail">Detail</label>
									<textarea class="form-control" id="problemdetail" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  readonly ></textarea>
							</div>

							<div class="form-group">
									<label for="answerdetail">Answer</label>
									<textarea class="form-control" id="answerdetail" name="answerdetail" rows="4" placeholder="ยังไม่ตอบ..."  readonly ></textarea>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
					</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal show problem -->


<!--Start Modal answer problem -->

<div class="modal fade" id="answer-modal" tabindex="-1" role="dialog" aria-labelledby="label3" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label3">Answer Problem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="form-answer" class="col" method="POST" action="problemreport/{problemreport}" >
						@csrf
						@method('PATCH')
							<div class="form-group">
									<label for="problemtitle1">Title</label>
									<input type="text" class="form-control" id="problemtitle1" name="problemtitle" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemtype1">Problem Type</label>
									<input type="text" class="form-control" id="problemtype1" name="problemtype" placeholder="" readonly >
							</div>

							<div class="form-group">
									<label for="problemdetail1">Detail</label>
									<textarea class="form-control" id="problemdetail1" name="problemdetail" rows="4" placeholder="ป้อนรายละเอียด..."  readonly ></textarea>
							</div>

							<div class="form-group">
									<label for="answerdetail1">Answer</label>
									<textarea class="form-control" id="answerdetail1" name="answerdetail" rows="4" placeholder="ยังไม่ตอบ..." ></textarea>
							</div>
							@if($problemreports)
								<div>
									<input type="hidden" name="answerID" value="">
								</div>
							@endif
					</form>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button form="form-answer" class="btn btn-success ml-2" type="submit" >ANSWER</button>
						</div>

			</div>
		</div>
	</div>
</div>
<!-- End Modal answer problem --> --}}
