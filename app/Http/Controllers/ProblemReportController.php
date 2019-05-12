<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\UserList;

class ProblemReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userrole =  1;// auth()->user()->UserRoleID;
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน
        $problemtypes = DB::table('problemtype_list')  //ดึงชนิดคำถาม
                    ->select('*')
                    ->get()->all();

        if($userrole == 1 || $userrole == 2) {
            $problemreports = DB::table('problemreport_list AS pr')
			->join('user_list as u', 'pr.userid', '=', 'u.userid')
            ->join('problemtype_list as pt', 'pr.problemtypeid', '=', 'pt.problemtypeid')
            ->join('department_list as d', 'd.departmentcode', '=', 'u.departmentcode')
            ->select('pr.problemno','pr.problemtitle','pt.problemtypename', 'u.firstname', 'u.lastname', 'd.departmentname', 'pr.problemdatetime', 'pr.problemstatus', 'pr.answerdetail', 'pr.problemdetail')
            ->where('pr.userid', '=', $userid)
            ->get()->all();
        } else if($userrole == 3) {
            $problemreports = DB::table('problemreport_list AS pr')
			->join('user_list as u', 'pr.userid', '=', 'u.userid')
            ->join('problemtype_list as pt', 'pr.problemtypeid', '=', 'pt.problemtypeid')
            ->join('department_list as d', 'd.departmentcode', '=', 'u.departmentcode')
            ->select('pr.problemno','pr.problemtitle','pt.problemtypename', 'u.firstname', 'u.lastname', 'd.departmentname', 'pr.problemdatetime', 'pr.problemstatus', 'pr.answerdetail', 'pr.problemdetail')
            ->get()->all();
		}
        return view('complex-form.problem-report.index', compact('userdetail','userrole', 'problemtypes', 'problemreports'));
    }
    // WTF
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

        $problemtitle = request('problemtitle');
        $problemdetail = request('problemdetail');
        $problemtype = request('problemtype');

        DB::table('problemreport_list')->insert(
            [
                'userid'        => $userid,
                'problemtypeid' => $problemtype,
                'problemtitle'  => $problemtitle,
                'problemdetail' => $problemdetail,
                'problemstatus' => 'waiting',
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
        $answerID = request('answerID');
        $answerdetail = request('answerdetail');

        DB::table('problemreport_list')
        ->where('problemno', '=', $answerID)
        ->update(
            [
				'answerdetail' => $answerdetail,
                'problemstatus' => 'answered'
            ]
        );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteID = intval(request('deleteID'));

        DB::table('problemreport_list')
        ->where('problemno', '=', $deleteID)
        ->delete();

        return back();
    }
}
