<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
                <td>No</td>
                <td>FirstName</td>
                <td>LastName</td>
            </tr>
		</thead>
		<tbody>
			@foreach($teacher_lists as $teacher_list)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $teacher_list->firstname}}</td>
                    <td>{{ $teacher_list->lastname}}</td>
                    {{-- {{ $teacher_list->userid}} --}}
                </tr>
            @endforeach
		</tbody>
	</table>
</div>