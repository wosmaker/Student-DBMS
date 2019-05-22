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
				$data = DB::select(
					'SELECT f.facultyname, COUNT(f.facultyname) AS count_user
					 FROM user_list u,registration_student r, sectioneachsubject ss, department_list d, faculty_list f
					 WHERE ss.subjectcode = "CPE111"                  AND
      						u.userid = r.userid                       AND
      						r.subjectsectionid = ss.subjectsectionid  AND
      						u.departmentcode = d.departmentcode       AND
      						d.facultycode = f.facultycode
					 GROUP BY f.facultyname
				');

				$sum = DB::select(
					'SELECT COUNT(d.facultycode) AS sum_user
					 FROM user_list u,registration_student r, sectioneachsubject ss, department_list d, faculty_list f
					 WHERE ss.subjectcode = "CPE111"                  AND
      						u.userid = r.userid                       AND
      						r.subjectsectionid = ss.subjectsectionid  AND
      						u.departmentcode = d.departmentcode
				');

				$total = $sum[0]->sum_user;

				foreach($data AS $dat) {
					$dat->percent = $dat*100/$total;
				}

				return view('Analytic.report1', compact('data'));
			}
		}

		public function analytic_4(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select('SELECT  rl.BuildingName, COUNT(DISTINCT ses.SubjectCode),
				CAST(COUNT(DISTINCT ses.SubjectCode) AS FLOAT)  *100/
			 (SELECT COUNT(DISTINCT ses.SubjectCode) FROM room_list rl, schedule s,sectioneachsubject ses WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID)
			 AS Percent
			 FROM room_list rl, schedule s,sectioneachsubject ses
			 WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID
			 GROUP BY rl.BuildingName
			 ');

				return view('Analytic.report4', compact('data'));
			}

		}




}
