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
				<button class=" btn btn-warning btn-sm mr-2 btn_detail_subject"  id="{{ $subject_list->subjectcode }}">DETAIL</button>
				<button class=" btn btn-danger btn-sm mr-2 btn_destroy_subject"  id="{{ $subject_list->subjectcode }}">DELETE</button>
		</td>
	</tr>
	@endforeach
@endif
