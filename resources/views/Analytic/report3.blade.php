@extends('layouts.analytic-layout')

@section('analytic-head')
<div class="col" align="left"><h1>Analytic 3</h1></div>
@endsection

@section('analytic-main')


<div class="shadow-sm p-3 mb-3 bg-white ">

		<table class="table table-hover table-responsive-lg">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ชนิดที่ลง late</th>
					<th scope="col">Count( <!-- จำนวนคน ใน รายวิขา -->)</th>
					<th scope="col">%( <!-- จำนวนคน ใน รายวิขา -->)</th>
				</tr>
			</thead>
			<tbody>
					@foreach ($report3 as $item)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $item->facultyname }}</td>
						<td>{{ $item->count }}</td>
						<td></td>
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


