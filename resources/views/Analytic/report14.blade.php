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
				<th scope="col">Count( <!-- จำนวนคน ใน รายวิขา -->)</th>
			</tr>
		</thead>
		<tbody>
				@foreach ($report14 as $item)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $item->subjectname }}</td>
					<td>{{ $item->sum }}</td>
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


