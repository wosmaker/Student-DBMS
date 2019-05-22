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
				$data = DB::select('SELECT  rl.BuildingName, COUNT(DISTINCT ses.SubjectCode),CAST (
					(COUNT(DISTINCT ses.SubjectCode)*100)/
				(SELECT COUNT(DISTINCT ses.SubjectCode) FROM room_list rl, schedule s,sectioneachsubject ses WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID) AS float)
				AS Percent
				FROM room_list rl, schedule s,sectioneachsubject ses
				WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID
				GROUP BY rl.BuildingName
				');

				return view('Analytic.report4', compact('data'));
			}

		}




}
