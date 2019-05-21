@foreach($transactionlists as $transactionlist)
<tr>
		<th scope="row">{{ $loop->iteration }}</th>
		<td>{{ $transactionlist->firstname }}</td>
		<td>{{ $transactionlist->lastname }}</td>
		<td>{{ $transactionlist->paymenttypename }}</td>
		<td>
				@php
						$img_link = asset('storage/upload/' . $transactionlist->picturelink);
				@endphp
				<a href="{{ $img_link }}" target="_blank">IMAGE</a>
		</td>
		<td>{{ $transactionlist->paymentdate }}</td>
		<td>{{ $transactionlist->paymentstatus }}</td>
		<td>
				<button class="btn btn-success btn-sm btn_update_confirm mr-2" id="{{ $transactionlist->transactionid }}">CONFIRM</button>
				<button class="btn btn-danger btn-sm btn_update_denied" id="{{ $transactionlist->transactionid }}">DENIDE</button>

		</td>
</tr>
@endforeach
