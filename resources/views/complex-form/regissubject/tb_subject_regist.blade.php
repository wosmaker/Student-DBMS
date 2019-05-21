@foreach($regissubjects as $regissubject)
		<tr>
				{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
				<th scope="row">{{ $loop->iteration }}</th>
				<td>{{ $regissubject->subjectcode }}</td>
				<td>{{ $regissubject->subjectname }}</td>
				<td>{{ $regissubject->subjectcredit }}</td>
				<td>{{ $regissubject->sectionno }}</td>
				<td>{{ $regissubject->day }}</td>
				<td>{{ $regissubject->start_period }}</td>
				<td>{{ $regissubject->end_period }}</td>
				<td>
						{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
						<button class="btn btn-danger btn-sm btn_destroy_regist"  id="{{ $regissubject->subjectsectionid }}">DELETE</button>
				</td>
		</tr>
@endforeach
