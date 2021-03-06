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

		protected function response_tb_problem()
		{
			$role = auth()->user()->userroleid;
			if($role == 1) {
				$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
				FROM problemreport_list prl, user_list ul,problemtype_list ptl
				WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid
				AND ul.userid = :userid;
				', ['userid' => $userid]);

			} else {
				$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
				FROM problemreport_list prl, user_list ul,problemtype_list ptl
							WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid;
				');
			}
			return view('complex-form.problem-report.problem_tb',compact('problemreports','role'));
		}

    public function __construct()
    {
        $this->middleware('auth');      //login checking
        $this->middleware('role:1,2,3,4,5');   //เช็คว่า role = 1 หรือเปล่า
        $this->middleware('personal');  //check personal data of this user
    }

    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้

        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน
        $problemtypes = DB::table('problemtype_list')  //ดึงชนิดคำถาม
                    ->select('problemtypeid','problemtypename')
                    ->get()->all();

				if($role == 1) {
					$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
					FROM problemreport_list prl, user_list ul,problemtype_list ptl
					WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid
					AND ul.userid = :userid;
					', ['userid' => $userid]);

				} else {
					$problemreports = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
					FROM problemreport_list prl, user_list ul,problemtype_list ptl
								WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid;
					');
				}

        return view('complex-form.problem-report.index', compact('userdetail', 'problemreports','problemtypes','role'));
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
			if($request->ajax()){
				$userid = auth()->user()->id;
				$userrole =  auth()->user()->userroleid;
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

				return response($this->response_tb_problem()) ;
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
			$data = DB::select('SELECT prl.problemno ,prl.problemtitle ,ptl.problemtypename,ul.firstname,ul.lastname,prl.problemdatetime,prl.problemstatus,prl.answerdetail,prl.problemdetail
			FROM problemreport_list prl, user_list ul,problemtype_list ptl
			WHERE ptl.problemtypeid = prl.problemtypeid AND ul.userid = prl.userid
			AND prl.problemno = :id;
			', ['id' => $id]);

			return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
			if($request->ajax()){
					$userid = auth()->user()->id;
					$userrole =  auth()->user()->userroleid;
					$answerdetail = request('answerdetail');

					if(!$answerdetail == '')
						$problemstatus = 'answered';
					else
						$problemstatus = 'waiting';


					DB::update('UPDATE problemreport_list set answerdetail = ? ,problemstatus = ?  where problemno = ?', [$answerdetail,$problemstatus,$request->problemno]);

					return response($this->response_tb_problem());
				}
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
			if($request->ajax())
			{
				$isdelete = DB::table('problemreport_list')
        ->where('problemno', '=', $request->id)
				->delete();

				return response($this->response_tb_problem());
			}
    }
}
