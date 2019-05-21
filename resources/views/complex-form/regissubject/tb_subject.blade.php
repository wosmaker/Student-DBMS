@foreach($subjectdetails as $subjectdetail)
<tr>
		{{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
		<th scope="row">{{ $loop->iteration }}</th>
		<td>{{ $subjectdetail->subjectcode }}</td>
		<td>{{ $subjectdetail->subjectname }}</td>
		<td>{{ $subjectdetail->sectionno }}</td>
		<td>{{ $subjectdetail->seatavailable }}</td>
		<td>{{ $subjectdetail->day }}</td>
		<td>{{ $subjectdetail->start_period }}</td>
		<td>{{ $subjectdetail->end_period }}</td>
		<td>
					<input  type="radio" id="{{"checkbox$loop->iteration"}}" class="is-invalid" name="subjectsectionid" value="{{ $subjectdetail->subjectsectionid }}">
		</td>
</tr>
@endforeach
