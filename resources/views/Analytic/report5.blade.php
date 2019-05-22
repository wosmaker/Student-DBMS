<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="col" align="left"><h1>Percent of subject in each building</h1></div>
	</div>

	<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
			<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Subject</th>
							<th scope="col">Section NO</th>
							<th scope="col">Building</th>
							<th scope="col">Floor</th>
							<th scope="col">Seat avaliable</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($report5 as $item)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td>{{ $item->subjectname }}</td>
								<td>{{ $item->sectionno }}</td>
								<td>{{ $item->buildingname }}</td>
								<td>{{ $item->floor }}</td>
								<td>{{ $item->seatavailable }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
	</div>

	<script>

	</script>

