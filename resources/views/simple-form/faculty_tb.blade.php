@foreach ($tb as $item)
<tr class="data">
		<td class="code">{{$item->facultycode}}</td>
		<td class="name">{{$item->facultyname}}</td>
		<td class="contact">{{$item->facultycontact}}</td>
		<td><button type="button" class="btn btn-warning btn-sm edit_btn" id="{{$item->facultycode}}">EDIT</button></td>
		<td><button type="button" class="btn btn-danger btn-sm delete_btn " id="{{$item->facultycode}}">DELETE</button></td>
</tr>
@endforeach
