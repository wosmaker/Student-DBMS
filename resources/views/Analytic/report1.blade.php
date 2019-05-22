<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<div class="col" align="left"><h1>Percent of GEN111 IN each faculty</h1></div>
</div>

<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Faculty </th>
					<th scope="col">Count( People in subject )</th>
					<th scope="col">%( People in subject )</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $item)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $item->facultyname }}</td>
						<td>{{ $item->count }}</td>
						<td>{{ $item->percent }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
</div>

<script>

</script>

