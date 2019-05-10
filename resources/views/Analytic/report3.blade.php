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
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
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


