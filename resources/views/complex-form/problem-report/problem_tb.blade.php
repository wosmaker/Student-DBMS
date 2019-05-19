@foreach($problemreports as $problemreport)
<tr class="problem-data">
	<th scope="row">{{ $loop->iteration }}</th>
	<td>{{ $problemreport->problemtitle }}</td>
	<td>{{ $problemreport->problemtypename }}</td>
	<td>{{ $problemreport->firstname }} {{ $problemreport->lastname }}</td>
	<td>{{ $problemreport->problemdatetime }}</td>
	<td>{{ $problemreport->problemstatus }}</td>
	<td>
		<div class="row">
			{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
			{{-- <form  method="POST" action="problemreport/{problemreport}">
				@csrf
				@method('DELETE')
				<input type="hidden" name="deleteID" value="{{ $problemreport->problemno }}">
				<button class="btn btn-danger btn-sm" type="submit" >DELETE</button>
			</form> --}}

			<button type="button" class="btn btn-danger btn-sm ml-2 btn_destroy" id="{{ $problemreport->problemno }}">DELETE</button>
			<button type="button" class="btn btn-info btn-sm ml-2 btn_show" id="{{ $problemreport->problemno }}">DETAIL</button>
			@if($role !== 1)
				<button type="button" class="btn btn-success btn-sm ml-2 btn_answer" id="{{ $problemreport->problemno }}">ANSWER</button>
			@endif
		</div>
	</td>
</tr>
@endforeach
