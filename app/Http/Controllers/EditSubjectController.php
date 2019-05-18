<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\UserList;

class EditSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:2,5');
    }

    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        //ดึงรายวิชาที่ต้องการ
        $subject_CodeOrName = request('subject_CodeOrName');
        $subject_lists = null;
        if($subject_CodeOrName != null) {
        $subject_lists = DB::table('subject_list')
            ->select('*')
            ->where('subjectcode' , 'like', '%' . $subject_CodeOrName . '%')
            ->orWhere('subjectname', 'like', '%' . $subject_CodeOrName . '%')
            ->get()->all();
        }

        //ดึงรายชื่อจารย์ที่ต้องการหา
        $teacher_name = request('teacher_name');
        $submit_teacher = request('submit_teacher');
        $teacher_lists = null;
        if($teacher_name != null) {
        $teacher_lists = DB::table('user_list as ul')
            ->join('users as u', 'ul.userid', '=', 'u.id')
            ->select('ul.userid', 'ul.firstname', 'ul.lastname')
            ->where([
                ['u.userroleid', '=', 2],
                ['firstname' , 'like' , '%' . $teacher_name . '%']
            ])
            ->orWhere([
                ['u.userroleid', '=', 2],
                ['lastname' , 'like' , '%' . $teacher_name . '%']
            ])
            ->get()->all();
        } else if($submit_teacher == 1) {
            $teacher_lists = DB::table('user_list as ul')
            ->join('users as u', 'ul.userid', '=', 'u.id')
            ->select('ul.userid', 'ul.firstname', 'ul.lastname')
            ->where('userroleid', '=', 2)
            ->get()->all();
        }

        //ดึงห้องที่ว่างในวันที่กำหนด
        $day = request('day');
        $room_lists = null;
        $roomfrees = array();

        if($day != null) {
            $start = request('start'); //คาบเริ่มต้น
            $end = request('end');     //คาบจบ
            //ดึงห้องทั้งหมดออกมา
            $room_lists = DB::table('room_list')
                ->select('roomcode', 'buildingname', 'floor', 'roomseattotal', $day)
                ->where('roomseattotal', '>', 0)
                ->get()->all();
            //ระยะเวลา (คาบ)
            $length = $end - $start + 1;
            //ไล่หาว่ามีห้องไหนว่างบ้าง
            foreach($room_lists as $room) {
                $period = substr($room->$day , $start-1, $length);
                if(strpos($period, '0') === false) array_push($roomfrees, $room);
            }
        }

        return view('complex-form.editsubject.index', compact('subject_lists','userdetail', 'roomfrees', 'teacher_lists', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

		public function search_subject(Request $request)
		{
			if($request->ajax())
			{
				$query = $request->get('query');
				if($query != '')
				{
					$subject_lists = DB::table('subject_list')
					->select('*')
					->where('subjectcode' , 'like', '%' . $query . '%')
					->orWhere('subjectname', 'like', '%' . $query . '%')
					->get()->all();
				}

				else {
					$subject_lists = DB::select('SELECT * FROM subject_list limit 5');
				}
				//dd($subject_lists);
				//return response($subject_lists);
				return view('complex-form.editsubject.subject_tb', compact('subject_lists'));
			}
		}

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
        $subjectcode = request('subjectcode');
        $subjectname = request('subjectname');
        $subjectcredit = request('subjectcredit');
        $subjectdetail = request('subjectdetail');

        DB::table('subject_list')->insert(
            [
                'subjectcode' => $subjectcode,
                'subjectname' => $subjectname,
                'subjectcredit' => $subjectcredit,
                'subjectdetail' => $subjectdetail
            ]
        );

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
    public function destroy($id)
    {
        $subjectcode = request('subjectcode');

        $room_lists = DB::table('subject_list AS sl')
        ->join('sectioneachsubject AS ss' , 'sl.subjectcode', '=', 'ss.subjectcode')
        ->join('schedule AS sd', 'sd.subjectsectionid', '=', 'ss.subjectsectionid')
        ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
        ->where('sl.subjectcode', '=', $subjectcode)
        ->get()->all();

        if($room_lists !== null) {
            //คืนที่คาบว่างให้กับห้องที่วิชานี้ใช้อยู่
            foreach($room_lists as $room_list) {
                $roomcode = $room_list->roomcode;
                $start = $room_list->start_period;
                $end = $room_list->end_period;
                $length = $end - $start + 1;
                $day = $room_list->day;

                $period = DB::table('room_list')
                ->select($day)
                ->where('roomcode', '=', $roomcode)
                ->get()->first()->$day;
                //ตัวแปร period เป็น object ต้องถึงข้อมูลออกมาก่อนใช้

                for($i = $start-1 ; $i < $end ; $i++) {
                    $period[$i] = '2';
                }

                DB::table('room_list')
                ->where('roomcode', '=', $roomcode)
                ->update([$day => $period]);
            }

            //ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
            DB::table('subject_list')
            ->where('subjectcode', '=', $subjectcode)
            ->delete();
        }

        return back();
    }

}
