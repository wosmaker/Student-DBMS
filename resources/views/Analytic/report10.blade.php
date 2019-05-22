<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="col" align="left"><h1>User count by payment date</h1></div>
	</div>

	<div class="shadow-sm p-3 mb-3 bg-white table-responsive-xl">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col"> Payment Date</th>
						<th scope="col">COUNT( Number of users )</th>
						<th scope="col"> %( Number of users ) </th>
					</tr>
				</thead>
				<tbody>
						@foreach ($report10 as $item)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $item->date }}</td>
							<td>{{ $item->paymentcount }}</td>
							<td>{{ $item->percent }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>

	<script>

	</script>

