@extends('layouts.page')

@section('page-head')
<div class="col" align="left"><h1>Registed Subject</h1></div>
@endsection

@section('page-main')
  {{-- ชื่อผู้ใช้ --}}
<div class="shadow p-3 mb-3 bg-white ">
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
                <th scope="col">SubjectCode</th>
                <th scope="col">SubjectName</th>
                <th scope="col">Credit</th>
                <th scope="col">Section</th>
                <th scope="col">Start Period</th>
                <th scope="col">End Period</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regissubjects as $regissubject)
                <tr>
                    {{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $regissubject->subjectcode }}</td>
                    <td>{{ $regissubject->subjectname }}</td>
                    <td>{{ $regissubject->sectionno }}</td>
                    <td>{{ $regissubject->subjectcredit }}</td>
                    <td>{{ $regissubject->start_period }}</td>
                    <td>{{ $regissubject->end_period }}</td>
                    <td>
                        {{-- ปุ่มกดสำหรับการลบวิชาที่เพิ่มไว้ --}}
                        <form method="POST" action="regissubject/{regissubject}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" name="btn" value="{{ $regissubject->subjectsectionid }}">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- ช่องค้นหาวิชา --}}
<div class="shadow-sm p-3 mb-2 bg-white ">
    <form method="GET" action="regissubject">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-4 input-group">
                <input type="text" class="form-control" name="subjectcode" placeholder="SubjectCode"  aria-describedby="search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-success" id="search">Search</button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="regissubject" id="example">
        @csrf
        {{-- ตารางแสดงวิชาที่ค้นหา --}}
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Section</th>
                    <th scope="col">SeatAvailable</th>
                    <th scope="col">Start Period</th>
                    <th scope="col">End Period</th>
                    <th scope="col">Choose</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjectdetails as $subjectdetail)
                    <tr  class="clickable-row">
                        {{-- คำสั่ง $loop->iteration เป็นตัวที่ไล่เลขลำดับให้ --}}
                        <th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $subjectdetail->sectionno }}</td>
                        <td>{{ $subjectdetail->seatavailable }}</td>
                        <td>{{ $subjectdetail->start_period }}</td>
                        <td>{{ $subjectdetail->end_period }}</td>
                        <td>
							<input  type="radio" id="{{"checkbox$loop->iteration"}}" name="subjectsectionid" value="{{ $subjectdetail->subjectsectionid }}">
						</td>
                    </tr>
                @endforeach
            </tbody>
				</table>
				<div class="text-right">
                    {{-- ปุ่มยืนยันเพิ่มวิชา --}}
        	        <button class="btn btn-info" type="submit" name="btn">ADD THIS SUBJECT</button>
				</div>
	</form>
</div>

{{-- ปุ่มไปหน้าอัพเดทใบเสร็จ --}}
<div class="p-3 shadow-lg bg-white">
    <div class="text-center">
        <button class="btn btn-info  shadow" onclick="window.location.href = 'updatereceipt';">CONFIRM REGISTRATION</button>
    </div>
</div>

@endsection

@section('script')
 <script>
 $(document).ready(function() {
    var table = $('#example').DataTable();

    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    });


});
 </script>
@endsection
