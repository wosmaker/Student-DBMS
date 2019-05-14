@extends('layouts.analytic-layout')

@section('analytic-head')
<div class="col" align="left"><h1>Analytic 1</h1></div>
@endsection

@section('analytic-main')

<div class="shadow-sm p-3 mb-3 bg-white table-responsive-lg">

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
					<td>{{ $item->SubjectName }}</td>
					<td>{{ $item->SectionNo }}</td>
					<td>{{ $item->BuildingName }}</td>
					<td>{{ $item->Floor }}</td>
					<td>{{ $item->seatAvailable }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection

@section('script')
<script>

</script>
@endsection

@section('style')
<style>

</style>
@endsection


