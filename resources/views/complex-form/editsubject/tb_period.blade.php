<div class="text-left pl-2 pt-3 pb-1" >
	<h3 id="show_subjectcode">PERIOD NO OF SECTION {{$sectionno}}</h3>
</div>

<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th scope="col">Period no</th>
				<th scope="col">Room Code</th>
				<th scope="col">Day</th>
				<th scope="col">Period start</th>
				<th scope="col">Period end</th>
				<th scope="col">Manage</th>
			</tr>
		</thead>
		<tbody>
			@foreach($period_lists as $period_list)
				<tr>
					{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
					<td>{{ $period_list->periodno }}</td>
					<td>{{ $period_list->roomcode }}</td>
					<td>{{ $period_list->day }}</td>
					<td>{{ $period_list->start_period }}</td>
					<td>{{ $period_list->end_period }}</td>
					<td>
						{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
						<form method="POST" action="editsubject/{id}">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit" name="sectionid" value="{{ $period_list->subjectsectionid }}">DELETE</button>
								<input type="hidden" name="periodno" value="{{ $period_list->periodno }}">
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
