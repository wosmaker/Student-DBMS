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
		$problemreports = NULL;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userrole =  auth()->user()->userroleid;
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน
        $problemtypes = DB::table('problemtype_list')  //ดึงชนิดคำถาม
                    ->select('problemtypeid','problemtypename')
                    ->get()->all();

        if($userrole == 1 || $userrole == 2) {
			$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,dl.departmentname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
			FROM problemreport_list prl, user_list ul,problemtype_list ptl,department_list dl
			WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid AND ul.departmentcode = dl.departmentcode
			AND ul.userid = :userid;
			', ['userid' => $userid]);

        } else if($userrole == 3) {
			$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,dl.departmentname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
			FROM problemreport_list prl, user_list ul,problemtype_list ptl,department_list dl;
			');
		}

        return view('complex-form.problem-report.index', compact('userdetail','userrole', 'problemreports','problemtypes'));
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
