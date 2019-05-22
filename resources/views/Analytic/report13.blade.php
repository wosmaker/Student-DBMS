<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<div class="col" align="left"><h1>Most Seat available subject</h1></div>
</div>

<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Subject Name</th>
					<th scope="col">SUM( Seat Available )</th>
					<th scope="col">Difference From Mean</th>
				</tr>
			</thead>
			<tbody>
					@foreach ($data as $item)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $item->subjectname }}</td>
						<td>{{ $item->sum }}</td>
						<td>{{ $item->differencefrommean }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
</div>

<script>

</script>

