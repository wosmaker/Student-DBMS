<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="col" align="left"><h1>Percent of subject in each building</h1></div>
	</div>

	<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
			<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Subject Code</th>
							<th scope="col">Section NO</th>
							<th scope="col">Building</th>
							<th scope="col">Room Code</th>
							<th scope="col">%( seat use per subject )</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($data as $item)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td>{{ $item->subjectcode }}</td>
								<td>{{ $item->sectionno }}</td>
								<td>{{ $item->buildingname }}</td>
								<td>{{ $item->roomcode }}</td>
								<td>{{ $item->seatused }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
	</div>

	<script>

	</script>

