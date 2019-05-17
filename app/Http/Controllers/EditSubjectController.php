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
        $this->middleware('role:1,2');
    }

    public function index()
    {
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        $teacher_name = request('teacher_name');
        $teacher_name = '%n%';
        $teacher_list = DB::table('user_list as ul')
                        ->join('users as u', 'ul.userid', '=', 'u.id')
                        ->select('ul.userid', 'ul.firstname', 'ul.lastname')
                        ->where([
                            ['u.userroleid', '=', 2],
                            ['firstname' , 'like' , $teacher_name]
                        ])
                        ->orWhere([
                            ['u.userroleid', '=', 2],
                            ['lastname' , 'like' , $teacher_name]
                        ])
                        ->get()->all();

        dd($teacher_list);

        return view('complex-form.editsubject.index', compact('userdetail'));
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
        $subject_code = request('subject_code');
        $subject_name = request('subject_name');
        $subject_credit = request('subject_credit');
        $subject_detail = request('subject_detail');

        DB::table('subject_list')->insert(
            [
                'subjectcode' => $subject_code,
                'subjectname' => $subject_name,
                'subjectcredit' => $subject_credit,
                'subjectdetail' => $subject_detail
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
        //
    }
}
