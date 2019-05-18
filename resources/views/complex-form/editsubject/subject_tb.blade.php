@if($subject_lists != null)
@foreach($subject_lists as $subject_list)
	<tr  class="clickable-row">
		{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
		<th scope="row">{{ $loop->iteration }}</th>
		<td>{{ $subject_list->subjectcode }}</td>
		<td>{{ $subject_list->subjectname}}</td>
		<td>{{ $subject_list->subjectcredit}}</td>
		<td>{{ $subject_list->subjectdetail}}</td>
		<td class="row">
			<button class=" btn btn-warning  btn-sm mr-2 " type="button" name="editsubject" value="{{ $subject_list->subjectcode }}">EDIT</button>
			<form action="editsubject/{editsubject}" method="POST">
				@csrf
				@method('DELETE')
				<button class=" btn btn-danger btn-sm" type="submit" name="subjectcode" value="{{ $subject_list->subjectcode }}">DELETE</button>
			</form>
		</td>
	</tr>
	@endforeach
@endif
