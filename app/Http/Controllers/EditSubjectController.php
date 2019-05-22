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
        $this->middleware('role:3,5');
        $this->middleware('personal');  //check personal data of this user
		}


    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        //ดึง  รายชื่อจารย์   ที่ต้องการหา
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

        return view('complex-form.editsubject.index', compact('userdetail', 'role'));
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
            return view('complex-form.editsubject.tb_subject', compact('subject_lists'));
        }
	}

    public function search_section(Request $request)
    {
        if($request->ajax())
        {
            $subjectcode = $request->get('query');

            $section_lists = DB::select('SELECT * from sectioneachsubject where subjectcode = ?', [$subjectcode]);
            return view('complex-form.editsubject.tb_section', compact('section_lists','subjectcode'));
        }
    }

    public function search_period(Request $request)
    {
        if($request->ajax())
        {
            $subjectsectionid = $request->get('query');
            $sectionno = $request->get('sectionno');

            $period_lists = DB::select('SELECT * from schedule where subjectsectionid	= ?', [$subjectsectionid]);
            return view('complex-form.editsubject.tb_period', compact('period_lists','subjectsectionid','sectionno'));
        }
    }

    public function search_room(Request $request)
    {
        if($request->ajax())
        {
            $day = request('day');
            $roomfrees = array();
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
            return view('complex-form.editsubject.tb_room', compact('roomfrees'));
        }
    }

    public function search_teacher(Request $request)
    {
        if($request->ajax())
        {
            $teacher_keyword = request('teacher_keyword');
            $teacher_lists = DB::table('user_list as ul')
            ->join('users as u', 'ul.userid', '=', 'u.id')
            ->select('ul.userid', 'ul.firstname', 'ul.lastname')
            ->where([
                ['u.userroleid', '=', 2],
                ['firstname' , 'like' , '%' . $teacher_keyword . '%']
            ])
            ->orWhere([
                ['u.userroleid', '=', 2],
                ['lastname' , 'like' , '%' . $teacher_keyword . '%']
            ])
            ->get()->all();

            return view('complex-form.editsubject.tb_teacher', compact('teacher_lists'));
        }
    }


    public function add_section(Request $request)
    {
        if($request->ajax())
        {
            $sectionno = $request->get('sectionno');
            $subjectcode = $request->get('subjectcode');
            if($sectionno != null) {

                DB::table('sectioneachsubject')->insert(
                    [
                        'subjectcode' =>  $request->get('subjectcode'),
                        'sectionno' =>  $request->get('sectionno'),
                        'price' =>  $request->get('price'),
                        'seatavailable' => $request->get('seatavailable')
                    ]
                );
            }

            $section_lists = DB::select('SELECT * from sectioneachsubject where subjectcode = ?', [ $subjectcode]);
            return view('complex-form.editsubject.tb_section', compact('section_lists','subjectcode'));
        }
    }

    public function add_subject(Request $request)
    {
        if($request->ajax())
        {
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

            $subject_lists = DB::select('SELECT * FROM subject_list limit 5');
            return view('complex-form.editsubject.tb_subject', compact('subject_lists'));
        }
	}

	public function add_period(Request $request)
    {
        if($request->ajax())
        {
            $subjectsectionid = $request->get('subjectsectionid');
            $sectionno = $request->get('sectionno');

            $day = $request->get('day');
            $start = $request->get('start');  //คาบเริ่มต้น
            $end = $request->get('end');      //คาบจบ
            $roomcode = $request->get('roomcode');
            $periodno = $request->get('periodno');


            $period = DB::table('room_list')
            ->select($day)
            ->where('roomcode', '=', $roomcode)
            ->get()->first()->$day;

            for($i = $start-1 ; $i < $end ; $i++) {
                $period[$i] = '0';
            }

            DB::table('room_list')
            ->where('roomcode', '=', $roomcode)
            ->update([$day => $period]);

            DB::table('schedule')->insert(
                [
                    'subjectsectionid' => $subjectsectionid,
                    'periodno' => $periodno,
                    'roomcode' => $roomcode,
                    'day' => $day,
                    'start_period' => $start,
                    'end_period' => $end
                ]
            );

            $period_lists = DB::select('SELECT * from schedule where subjectsectionid = ?', [ $subjectsectionid]);
            return view('complex-form.editsubject.tb_period', compact('period_lists','sectionno','subjectsectionid'));
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

        //เพิ่ม PEPIOD
        $subjectsectionid = request('subjectsectionid');

        if($subjectsectionid != null) {
            $day = request('day');
            $start = request('start');  //คาบเริ่มต้น
            $end = request('end');      //คาบจบ
            $roomcode = request('roomcode');
            $periodno = request('periodno');


            $period = DB::table('room_list')
            ->select($day)
            ->where('roomcode', '=', $roomcode)
            ->get()->first()->$day;

            for($i = $start-1 ; $i < $end ; $i++) {
                $period[$i] = '0';
            }

            DB::table('room_list')
            ->where('roomcode', '=', $roomcode)
            ->update([$day => $period]);

            DB::table('schedule')->insert(
                [
                    'subjectsectionid' => $subjectsectionid,
                    'periodno' => $periodno,
                    'roomcode' => $roomcode,
                    'day' => $day,
                    'start_period' => $start,
                    'end_period' => $end
                ]
            );
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

    public function destroy_subject(Request $request)
    {
        if($request->ajax())
        {
			$subjectcode = $request->subjectcode;

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
                        $period[$i] = '1';
                    }

                    DB::table('room_list')
                    ->where('roomcode', '=', $roomcode)
                    ->update([$day => $period]);
				}
            }

            // ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
            DB::table('subject_list')
            ->where('subjectcode', '=', $subjectcode)
            ->delete();

            $subject_lists = DB::select('SELECT * FROM subject_list limit 5');
            return view('complex-form.editsubject.tb_subject', compact('subject_lists'));
        }
    }

    public function destroy_section(Request $request)
    {
        if($request->ajax())
        {
            $sectionid = $request->subjectsectionid;
            $subjectcode = DB::select('SELECT subjectcode from sectioneachsubject where subjectsectionid = ? LIMIT 1', [$sectionid]);
            $subjectcode = $subjectcode[0]->subjectcode;

            $room_lists = DB::table('sectioneachsubject AS ss')
            ->join('schedule AS sd', 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
            ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
            ->where([
                ['ss.subjectsectionid', '=', $sectionid]
            ])
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
                        $period[$i] = '1';
                    }

                    DB::table('room_list')
                    ->where('roomcode', '=', $roomcode)
                    ->update([$day => $period]);
                }
			}

            // ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
            DB::table('sectioneachsubject')
            ->where([
                    ['subjectsectionid', '=', $sectionid],
            ])
            ->delete();

			$section_lists = DB::select('SELECT * from sectioneachsubject where subjectcode = ?', [ $subjectcode]);
            return view('complex-form.editsubject.tb_section', compact('section_lists','subjectcode'));
		}
	}

	public function destroy_period(Request $request)
    {
        if($request->ajax())
        {
            $subjectsectionid = request('subjectsectionid');
            $periodno = request('periodno');
            $sectionno = request('sectionno');
            //หาห้องที่ section นี้ใช้ รหัสห้อง วัน คาบเริ่ม-จบ
            $room_lists = DB::table('sectioneachsubject AS ss')
            ->join('schedule AS sd', 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
            ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
            ->where([
                ['ss.subjectsectionid', '=', $subjectsectionid],
                ['sd.periodno', '=', $periodno]
            ])
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
                            $period[$i] = '1';
                        }

                        DB::table('room_list')
                        ->where('roomcode', '=', $roomcode)
                        ->update([$day => $period]);
                    }

                    //ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
                    
                }
            DB::table('schedule')
            ->where([
                ['subjectsectionid', '=', $subjectsectionid],
                ['periodno', '=', $periodno]
            ])
            ->delete();

            $period_lists = DB::table('schedule')
            ->select('*')
            ->where('subjectsectionid', '=', $subjectsectionid)
            ->get()->all();
            
            return view('complex-form.editsubject.tb_period', compact('period_lists','sectionno'));
        }
	}

    // public function destroy($id)
    // {
    //     // ลบ SUBJECT
    //     $subjectcode = request('subjectcode');

    //     if($subjectcode != null) {
    //         $room_lists = DB::table('subject_list AS sl')
    //         ->join('sectioneachsubject AS ss' , 'sl.subjectcode', '=', 'ss.subjectcode')
    //         ->join('schedule AS sd', 'sd.subjectsectionid', '=', 'ss.subjectsectionid')
    //         ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
    //         ->where('sl.subjectcode', '=', $subjectcode)
    //         ->get()->all();

    //         if($room_lists !== null) {
    //             //คืนที่คาบว่างให้กับห้องที่วิชานี้ใช้อยู่
    //             foreach($room_lists as $room_list) {
    //                 $roomcode = $room_list->roomcode;
    //                 $start = $room_list->start_period;
    //                 $end = $room_list->end_period;
    //                 $length = $end - $start + 1;
    //                 $day = $room_list->day;

    //                 $period = DB::table('room_list')
    //                 ->select($day)
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->get()->first()->$day;
    //                 //ตัวแปร period เป็น object ต้องถึงข้อมูลออกมาก่อนใช้

    //                 for($i = $start-1 ; $i < $end ; $i++) {
    //                     $period[$i] = '1';
    //                 }

    //                 DB::table('room_list')
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->update([$day => $period]);
    //             }

    //             //ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
    //             // DB::table('subject_list')
    //             // ->where('subjectcode', '=', $subjectcode)
    //             // ->delete();
    //         }
    //     }

    //     //ลบ SECTION or PERIOD
    //     $sectionid = request('sectionid');
    //     $periodno = request('periodno');

    //     if($sectionid != null && $periodno != null) {
    //         //หาห้องที่ section นี้ใช้ รหัสห้อง วัน คาบเริ่ม-จบ
    //         $room_lists = DB::table('sectioneachsubject AS ss')
    //         ->join('schedule AS sd', 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
    //         ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
    //         ->where([
    //             ['ss.subjectsectionid', '=', $sectionid],
    //             ['sd.periodno', '=', $periodno]
    //         ])
    //         ->get()->all();

    //         if($room_lists !== null) {
    //             //คืนที่คาบว่างให้กับห้องที่วิชานี้ใช้อยู่
    //             foreach($room_lists as $room_list) {
    //                 $roomcode = $room_list->roomcode;
    //                 $start = $room_list->start_period;
    //                 $end = $room_list->end_period;
    //                 $length = $end - $start + 1;
    //                 $day = $room_list->day;

    //                 $period = DB::table('room_list')
    //                 ->select($day)
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->get()->first()->$day;
    //                 //ตัวแปร period เป็น object ต้องถึงข้อมูลออกมาก่อนใช้

    //                 for($i = $start-1 ; $i < $end ; $i++) {
    //                     $period[$i] = '1';
    //                 }

    //                 DB::table('room_list')
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->update([$day => $period]);
    //             }

    //             //ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
    //             // DB::table('schedule')
    //             // ->where([
    //             //     ['ss.subjectsectionid', '=', $sectionid],
    //             //     ['sd.periodno', '=', $periodno]
    //             // ])
    //             // ->delete();
    //         }
    //     } else if($sectionid != null) {
    //         //หาห้องที่ section นี้ใช้ รหัสห้อง วัน คาบเริ่ม-จบ
    //         $room_lists = DB::table('sectioneachsubject AS ss')
    //         ->join('schedule AS sd', 'ss.subjectsectionid', '=', 'sd.subjectsectionid')
    //         ->select('sd.roomcode', 'sd.day', 'sd.start_period', 'sd.end_period')
    //         ->where([
    //             ['ss.subjectsectionid', '=', $sectionid]
    //         ])
    //         ->get()->all();

    //         if($room_lists !== null) {
    //             //คืนที่คาบว่างให้กับห้องที่วิชานี้ใช้อยู่
    //             foreach($room_lists as $room_list) {
    //                 $roomcode = $room_list->roomcode;
    //                 $start = $room_list->start_period;
    //                 $end = $room_list->end_period;
    //                 $length = $end - $start + 1;
    //                 $day = $room_list->day;

    //                 $period = DB::table('room_list')
    //                 ->select($day)
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->get()->first()->$day;
    //                 //ตัวแปร period เป็น object ต้องถึงข้อมูลออกมาก่อนใช้

    //                 for($i = $start-1 ; $i < $end ; $i++) {
    //                     $period[$i] = '1';
    //                 }

    //                 DB::table('room_list')
    //                 ->where('roomcode', '=', $roomcode)
    //                 ->update([$day => $period]);
    //             }

    //             //ลบวิชาที่ต้องการ พร้อมกับ section & schdule ที่เกี่ยวข้อง เพราะเซ็ต DB เป็น cascade ไว้
    //             // DB::table('subjectsectionid')
    //             // ->where([
    //             //     ['ss.subjectsectionid', '=', $sectionid],
    //             // ])
    //             // ->delete();
    //         }
    //     }

    //     return back();
    // }

}
