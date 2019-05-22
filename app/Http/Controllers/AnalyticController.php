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
				$data1s = DB::select(
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
				
				$sum = $sum[0]->sum_user;

				foreach($data1s AS $data1) {
					$data1->percent = $data1/$sum;
				}

				return view('Analytic.report1', compact('data1s'));
			}
		}

		public function analytic_4(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select('SELECT  rl.BuildingName, COUNT(DISTINCT ses.SubjectCode),CAST (
					(COUNT(DISTINCT ses.SubjectCode)*100)/
				(SELECT COUNT(DISTINCT ses.SubjectCode) FROM room_list rl, schedule s,sectioneachsubject ses WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID) AS float)
				AS percent
				FROM room_list rl, schedule s,sectioneachsubject ses
				WHERE rl.RoomCode = s.RoomCode AND ses.SubjectSectionID = s.SubjectSectionID
				GROUP BY rl.BuildingName

				');

				return view('Analytic.report4', compact('data'));
			}

		}




}
