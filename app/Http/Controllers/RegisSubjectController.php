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
        $this->middleware('role:1,5');    //เช็คว่า role = 1 หรือ 5 หรือเปล่า
        $this->middleware('personal');  //check personal data of this user
		}

		public function tb_registration()
		{
				$userid = auth()->user()->id;
				//ดึงข้อมูลวิชาที่ลงทะเบียนไว้แล้ว
        $regissubjects = DB::table('registration_student as r')
                        ->join('sectioneachsubject as ss', 'r.subjectsectionid', '=', 'ss.subjectsectionid')
                        ->join('subject_list as sl', 'ss.subjectcode', '=', 'sl.subjectcode')
                        ->join('schedule as sd' , 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
                        ->select('sl.subjectcode','sl.subjectname', 'ss.sectionno', 'sl.subjectcredit', 'sd.day', 'sd.start_period', 'sd.end_period' ,'ss.subjectsectionid')
                        ->where('r.userid', '=' , $userid)
												->get()->all(); //get ทำเก็บข้อมูลในรูปของ collection และ all ทำให้ข้อมูลอยู่ในรูปของ array
				return $regissubjects;
		}

    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

				$regissubjects = $this->tb_registration();


        //รหัสวิชาที่ต้องการค้นหา
        $subjectcode = request('subjectcode');
        $search_btn = request('search_btn');
        $subjectdetails = null;
        $subject_show = 0;

		//ส่งกลับที่หน้า regissubject พร้อมกับค่าในตัวแปร 2 ตัวที่ใส่ไว้ใน compact
		//dd($userdetail,$regissubjects,$subjectdetails);
        return view('complex-form.regissubject.index' , compact('userdetail','regissubjects','subjectdetails','role', 'subject_show'));
    }


		public function search_subject(Request $request)
		{
			if($request->ajax())
			{
				$query = $request->get('query');
				$userid = auth()->user()->id;

				$query = '%'.$query.'%';
				$subjectdetails = DB::select('SELECT *
				FROM subject_list sl,sectioneachsubject ses,schedule s
				WHERE sl.subjectcode = ses.subjectcode AND ses.subjectsectionid = s.subjectsectionid
				AND (sl.subjectcode ILIKE ? OR sl.subjectname ILIKE ?)
				AND sl.subjectcode NOT IN (
					SELECT a.subjectcode
					FROM sectioneachsubject a, registration_student r
					WHERE a.subjectsectionid = r.subjectsectionid AND
								r.userid = ?)', [$query,$query,$userid]);

			return view('complex-form.regissubject.tb_subject' , compact('subjectdetails'));
			}
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
			if($request->ajax())
			{
        $subjectsectionid = request('subjectsectionid');
        $userid = auth()->user()->id;

				DB::table('registration_student')->insert(
						[
								'subjectsectionid' => $subjectsectionid,
								'userid' => $userid
						]
        );

        DB::select(
          ' UPDATE sectioneachsubject
            SET seatavailable = seatavailable - 1
            WHERE subjectsectionid = ?',[$subjectsectionid]);

        $regissubjects = $this->tb_registration();
				return view('complex-form.regissubject.tb_subject_regist' , compact('regissubjects'));
			}
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
    public function destroy(Request $request)
    {
        $id = request('id');

        DB::table('registration_student')
        ->where('subjectsectionid', '=', $id)
        ->delete();

        DB::select(
          ' UPDATE sectioneachsubject
            SET seatavailable = seatavailable + 1
            WHERE subjectsectionid = ?',[$id]);

        $regissubjects = $this->tb_registration();
				return view('complex-form.regissubject.tb_subject_regist' , compact('regissubjects'));
    }
}
