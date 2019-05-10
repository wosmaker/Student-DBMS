@extends('layouts.page')

@section('page-head')
<div class="col" align="left">Subject</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">ADD Data</button>
@endsection

@section('page-main')

<table class="table ">
    <tr>
        <th>รหัสวิชา</th>
        <th>ชื่อรายวิชา</th>
        <th>หน่วยกิต</th>
        <th>คำอธิบายรายวิชา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    @foreach ($tb as $item)
        <tr>
            <td>{{$item['SubjectCode']}}</td>
            <td>{{$item['SubjectName']}}</td>
            <td>{{$item['SubjectCredit']}}</td>
            <td>{{$item['Subjectdetail']}}</td>

            <td><a href='{{action('Insert\Csubject@edit',$item['SubjectCode'])}}' class="btn btn-warning">Edit</a></td>

            <td>
                <form method="post" class="delete_form" action="{{action('Insert\Csubject@destroy',$item['SubjectCode'])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>

<!-- The Modal -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" >
            <form method="post" class="col" action= {{route('subject.store')}}>
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="SubjectCode">รหัสวิชา</label>
                        <input type="text" class="form-control" id="SubjectCode" name="SubjectCode" placeholder="">
                    </div>

                    <div class="form-group col-md-7">
                        <label for="SubjectName">ชื่อรายวิชา</label>
                        <input type="text" class="form-control" id="SubjectName" name="SubjectName" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="SubjectCredit">หน่วยกิต</label>
                        <input type="text" class="form-control" id="SubjectCredit" name="SubjectCredit" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Subjectdetail">คำอธิบายรายวิชา</label>
                    <textarea class="form-control" id="Subjectdetail" name="Subjectdetail" placeholder="กรอกคำอธิบายรายวิชา" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">ADD</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!--End modal-->
@endsection

@section('script')

@endsection
