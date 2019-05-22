
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<div class="col" align="left"><h1>Min, Max, Mode Seat For each Building</h1></div>
</div>

<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Building Nam</th>
				<th scope="col">Min</th>
				<th scope="col">Max</th>
				<th scope="col">Mode</th>

			</tr>
		</thead>
		<tbody>
				@foreach ($data as $item)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $item->buildingname }}</td>
					<td>{{ $item->min }}</td>
					<td>{{ $item->max }}</td>
					<td>{{ $item->mode }}</td>

				</tr>
			@endforeach
		</tbody>
	</table>
</div>

	<script>

	</script>

