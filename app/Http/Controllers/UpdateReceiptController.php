<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\User;
use App\UserList;

class UpdateReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');      //login checking
        $this->middleware('role:1');    //เช็คว่า role = 1 หรือเปล่า
    }

    public function index()
    {
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('UserID', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        //ดึงข้อมูลวิชาที่ลงทะเบียนไว้แล้ว
        $regissubjects = DB::table('registration_student AS r')
        ->join('sectioneachsubject AS ss', 'r.SubjectSectionID', '=', 'ss.SubjectSectionID')
        ->join('subject_list AS sl', 'ss.SubjectCode', '=', 'sl.SubjectCode')
        ->select('sl.SubjectCode','sl.SubjectName', 'ss.SectionNo', 'sl.SubjectCredit',)
        ->where('r.UserID', '=' , $userid)
        ->get();

        //คำนวณหน่วยกิตทั้งหมด
        $sumcredit = $regissubjects->sum('SubjectCredit');

        //แปลงให้เป็น array เพราะตอนแรกยังเป็น collection
        $regissubjects = $regissubjects->all();

        $paymenttypes = DB::table('paymenttype_list')
        ->select('*')
        ->get()->all();


        return view('complex-form.update-receipt.index', compact('userdetail','regissubjects','sumcredit','paymenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = auth()->user()->id;
        $role = auth()->user()->UserRoleID;

        //รับค่าจาก dropbox
        $paymenttype = $request->get('paymenttype');

        //รับค่าเงินที่จ่าย
        $amount = $request->get('amount');

        //เช็คว่ามีไฟล์หรือไม่แล้วทำการเก็บเข้าโฟลเดอร์ upload
        if($request->hasFile('imgInp')){
            $file = $request->file('imgInp');
            $extension = $file->getClientOriginalExtension();
            $filename = $userid . '_' . time() . '.' . $extension;
            Storage::putFileAs('public/upload', $file , $filename);
        }

        //คำนวณ Semester
        if((int)(date('n')) > 7) $semester = '1' . date('/Y');
        else $semester = '2' . date('/Y');

        //insert in DB
        $transactionid = DB::table('transaction_list')->insertGetId(    //insertGetId จะค่าในคอลัมน์ auto inc กลับมาด้วย
            [
                'UserID'        => $userid ,
                'Amount'        => $amount ,
                'Semester'      => $semester ,
                'PaymentTypeID' => $paymenttype ,
                'PaymentStatus' => 'waiting' ,
                'PictureLink'   => $filename ,
            ]
        );

        DB::table('registration_student')
            ->where('UserID', '=', $userid)
            ->update(['TransactionID' => $transactionid]);

        return view('home', compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
