@foreach($regissubjects as $regissubject)
	<tr>
			{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
			<th scope="row">{{ $loop->iteration }}</th>
			<td>{{ $regissubject->subjectcode }}</td>
			<td>{{ $regissubject->subjectname }}</td>
			<td>{{ $regissubject->sectionno }}</td>
			<td>{{ $regissubject->subjectcredit }}</td>
	</tr>
@endforeach
