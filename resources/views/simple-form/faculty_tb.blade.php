@foreach ($tb as $item)
		<tr class="data">
				<td class="code">{{$item->facultycode}}</td>
				<td class="name">{{$item->facultyname}}</td>
				<td class="contact">{{$item->facultycontact}}</td>
				<td><button type="button" class="btn btn-warning btn-sm " id="edit_btn">Edit</button></td>
				<td>
						<form method="post" class="delete_form" action="{{action('Csimple\Cfaculty@destroy',$item->facultycode)}}">
								@csrf
								<input type="hidden" name="_method" value="DELETE"/>
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
				</td>
		</tr>
@endforeach
