<div class="shadow-sm px-4 py-2 mb-2  bg-white rounded">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
                <td>No</td>
                <td>Roomcode</td>
                <td>Buildingname</td>
                <td>Floor</td>
                <td>RoomSeatTotal</td>
                <td>Choose</td>
            </tr>
		</thead>
		<tbody>
			@foreach($roomfrees as $roomfree)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $roomfree->roomcode }}</td>
                    <td>{{ $roomfree->buildingname}}</td>
                    <td>{{ $roomfree->floor}}</td>
                    <td>{{ $roomfree->roomseattotal}}</td>
                    <td>
                        <input  type="radio" id="roomcode" name="roomcode" value="{{ $roomfree->roomcode }}" >
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>