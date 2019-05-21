
<div class="text-left pl-2 pt-3 pb-1" >
<h3 id="show_subjectcode">SECTION OF {{$subjectcode}}</h3>
</div>

<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">

	<div class="text-right">
			<button class="btn btn-info my-2 btn_add_section" id="{{$subjectcode}}">+Section</button>
	</div>

	<div class="table-responsive">
		<table class="table table-hover">
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
						<td class="row">
							{{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
							<button class="btn btn-info btn-sm mr-2 btn_add_period" id="{{$section_list->subjectsectionid}}" data-sectionno="{{ $section_list->sectionno }}" >+Period</button>
							<button class=" btn btn-warning btn-sm mr-2 btn_detail_section"  id="{{$section_list->subjectsectionid}}" data-sectionno="{{ $section_list->sectionno }}">DETAIL</button>
							<button class=" btn btn-danger btn-sm mr-2 btn_destroy_section"  id="{{$section_list->subjectsectionid}}">DELETE</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
