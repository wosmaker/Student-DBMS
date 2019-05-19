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
