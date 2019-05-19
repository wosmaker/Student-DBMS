
<div class="text-left pl-2 pt-3 pb-1" >
<h3 id="show_subjectcode">SECTION OF {{$subjectcode}}</h3>
</div>

<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">

	<div class="text-right">
			<button class="btn btn-info my-2 btn_add_section" id="{{$subjectcode}}">+Section</button>
	</div>

	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th scope="col">Secion No</th>
				<th scope="col">Seat</th>
				<th scope="col">Price</th>
				<th scope="col">Manage</th>
			</tr>
		</thead>
		<tbody>
				@foreach($section_lists as $section_list)
				<tr>
					{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
					<td>{{ $section_list->sectionno }}</td>
					<td>{{ $section_list->seatavailable }}</td>
					<td>{{ $section_list->price }}</td>
					<td>
						{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
						<form method="POST" action="editsubject/{id}">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit" name="sectionid" value="{{ $section_list->subjectsectionid }}">DELETE</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
