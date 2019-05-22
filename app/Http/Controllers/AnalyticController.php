<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AnalyticController extends Controller
{

		public function analytic_1(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select('SELECT ul.departmentcode,d.departmentname ,COUNT(ul.departmentcode),CAST(CAST(COUNT(ul.departmentcode)*100 AS FLOAT)/(SELECT COUNT(ul.departmentcode) FROM department_list  d, user_list ul,registration_student rs WHERE ul.departmentcode = d.departmentcode AND ul.userid = rs.userid)AS FLOAT) AS Percent
				FROM department_list  d, user_list ul,registration_student rs
				WHERE ul.departmentcode = d.departmentcode AND ul.userid = rs.userid
				GROUP BY ul.departmentcode,d.departmentname
				');

			}
		}

		public function analytic_4(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select('SELECT  rl.buildingname, COUNT(DISTINCT ses.subjectcode),CAST(COUNT(DISTINCT ses.subjectcode)*100 AS FLOAT)/(SELECT COUNT(DISTINCT ses.SubjectCode) FROM room_list rl, schedule s,sectioneachsubject ses WHERE rl.roomcode = s.roomcode AND ses.SubjectSectionid = s.subjectsectionid)AS FLOAT) AS percent
				FROM room_list rl, schedule s,sectioneachsubject ses
				WHERE rl.roomcode = s.roomcode AND ses.subjectsectionid = s.subjectsectionid
				GROUP BY rl.buildingname
				');

				return view('Analytic.report4', compact('data'));
			}

		}




}
