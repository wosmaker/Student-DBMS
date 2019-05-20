@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Confirm Receipt</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow p-3 mb-3 bg-white">
		<h4 class="d-inline p-2 ">Name: {{ $userdetail->firstname }} {{ $userdetail->lastname}} </h4>
		<h4 class="d-inline p-5 ">Student ID: {{ $userdetail->userid }}</h4>
		@if(Session::has('alert'))
		<div class="alert alert-danger  alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{Session::get('alert')}}
		</div>
		@endif

		@if(Session::has('success'))
				<div class="alert alert-success  alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						{{Session::get('success')}}
				</div>
		@endif
</div>

<div class="shadow-sm p-3 mb-2 bg-white ">
    {{-- ตารางแสดงรายวิชาที่ลงทะเบียนแล้ว --}}
    <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Bank</th>
                <th scope="col">Link</th>
                <th scope="col">DateTime</th>
                <th scope="col">Status</th>
                <th scope="col">Confirm</th>
            </tr>
        </thead>
        <tbody>
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
                        <form method="POST" action="confirmreceipt/{confirmreceipt}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger" type="submit" name="transaction_id" value="{{ $transactionlist->transactionid }}">CONFIRM</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script>

$(document).ready( function() {

		$('.btn-file :file').on('fileselect', function(event, label) {

		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }

		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
    }

		$("#imgInp").change(function(){
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
		    readURL(this);
		});
	});
</script>
@endsection

@section('style')
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
@endsection
