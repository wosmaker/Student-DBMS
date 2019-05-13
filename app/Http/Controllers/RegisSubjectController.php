<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\UserList;

class RegisSubjectController extends Controller
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
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        //ดึงข้อมูลวิชาที่ลงทะเบียนไว้แล้ว
        $regissubjects = DB::table('registration_student as r')
                        ->join('sectioneachsubject as ss', 'r.subjectsectionid', '=', 'ss.subjectsectionid')
                        ->join('subject_list as sl', 'ss.subjectcode', '=', 'sl.subjectcode')
                        ->join('schedule as sd' , 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
                        ->select('sl.subjectcode','sl.subjectname', 'ss.sectionno', 'sl.subjectcredit', 'sd.secstart', 'sd.secend' ,'ss.subjectsectionid')
                        ->where('r.userid', '=' , $userid)
                        ->get()->all(); //get ทำเก็บข้อมูลในรูปของ collection และ all ทำให้ข้อมูลอยู่ในรูปของ array

        //รหัสวิชาที่ต้องการค้นหา
        $subjectcode = request('subjectcode');

        //ดึงรายละเอียดวิชาที่ค้นหา
        $subjectdetails = DB::table('sectioneachsubject as ss')
                        ->join('schedule as sd' , 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
                        ->select('ss.sectionno', 'ss.seatavailable', 'sd.secstart', 'sd.secend' , 'ss.subjectsectionid')
                        ->where('ss.subjectcode', '=', $subjectcode)
                        ->get()->all();

		//ส่งกลับที่หน้า regissubject พร้อมกับค่าในตัวแปร 2 ตัวที่ใส่ไว้ใน compact
		//dd($userdetail,$regissubjects,$subjectdetails);
        return view('complex-form.regissubject.index' , compact('userdetail','regissubjects','subjectdetails'));
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
        $subjectsectionid = request('subjectsectionid');
        $userid = auth()->user()->id;

        try {
            DB::table('registration_student')->insert(
                [
                    'subjectsectionid' => $subjectsectionid,
                    'userid' => $userid
                ]
            );
        } catch(\Illuminate\Database\QueryException $ex){
            if($ex->getCode() == 23000){
                return redirect()->back()->with('alert','you already regis that');
            }
            else return redirect()->back()->with('alert','WTF DID YOU JUST DO');
        }
        return back();
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
    public function destroy(Request $request, $id)
    {
        $subjectcode = request('btn');

        DB::table('registration_student')
        ->where('subjectsectionid', '=', $subjectcode)
        ->delete();

        return back();
    }
}
