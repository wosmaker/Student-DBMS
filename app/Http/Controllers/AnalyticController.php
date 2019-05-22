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
				$subject = 'CPE111';

				$data = DB::select(
					'SELECT f.facultyname, COUNT(f.facultyname) AS count 
					 FROM user_list u,registration_student r, sectioneachsubject ss, department_list d, faculty_list f 
					 WHERE ss.subjectcode = ?		                  AND
      						u.userid = r.userid                       AND
      						r.subjectsectionid = ss.subjectsectionid  AND
      						u.departmentcode = d.departmentcode       AND
      						d.facultycode = f.facultycode
					 GROUP BY f.facultyname
				',[$subject]);

				$sum = DB::select(
					'SELECT COUNT(d.facultycode) AS sum_user
					 FROM user_list u,registration_student r, sectioneachsubject ss, department_list d, faculty_list f
					 WHERE ss.subjectcode = ?                AND
      						u.userid = r.userid                       AND
      						r.subjectsectionid = ss.subjectsectionid  AND
      						u.departmentcode = d.departmentcode
				',[$subject]);

				$sum = $sum[0]->sum_user;

				foreach($data AS $dat) {
					$dat->percent = $dat->count*100/$sum;
				}

				return view('Analytic.report1', compact('data'));
			}
		}

		public function analytic_2(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
					'SELECT c.credit, c.counts, CAST(c.counts AS FLOAT)*100/f.summ AS percent
					 FROM (	SELECT a.credit, COUNT(a.userid) AS counts
					 		FROM (	SELECT  rs.userid, SUM(sl.subjectcredit) AS credit
									FROM registration_student rs, subject_list sl, sectioneachsubject ses
									WHERE ses.subjectcode = sl.subjectcode AND ses.subjectsectionid = rs.subjectsectionid
									GROUP BY  rs.userid) a
						  	GROUP BY a.credit) c,

						  (	SELECT SUM(d.counts) AS summ
						   	FROM (	SELECT b.credit, COUNT(b.userid) AS counts
								FROM (	SELECT  rs.userid, SUM(sl.subjectcredit) AS credit
									   	FROM registration_student rs, subject_list sl, sectioneachsubject ses
									   	WHERE ses.subjectcode = sl.subjectcode AND ses.subjectsectionid = rs.subjectsectionid
									   	GROUP BY  rs.userid) b
								GROUP BY b.credit) d
						  ) f
					GROUP BY c.credit,c.counts,f.summ
				');
				dd($data);
				return view('Analytic.report2', compact('data'));
			}
		}

		public function analytic_3(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT (CASE WHEN row_temp = 1 THEN "Late" WHEN row_temp = 2 THEN "Not Late" ELSE "Not Regis" END) AS Group_Type,
					Count, Percent FROM(SELECT row_number() over(ORDER BY (SELECT NULL)) as row_temp,count(temp2.late) as Count,
					ROUND( CAST(count(temp2.late)*100 as numeric)/CAST((SELECT count( CASE WHEN userroleid = 1 then 1 ELSE NULL END)
					FROM users)as numeric),2) as Percent from (SELECT CASE WHEN Latest_Regis is null THEN "Not Regis"
					WHEN Latest_Regis > timestamp"2019-05-22 15:17:00" Then "Late" ELSE "Not Late" END as late
					FROM (SELECT u.id,temp.latest_regis from (SELECT userid,max(dateregis) as Latest_Regis
					FROM registration_student  GROUP BY userid) temp FULL OUTER JOIN users u on temp.userid= u.id
					where u.userroleid =1)  temp1) temp2 GROUP BY temp2.late) temp3 WHERE row_temp !=2
				');
				dd($data);
				return view('Analytic.report3', compact('data'));
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

		public function analytic_5(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report5', compact('data'));
			}
		}

		public function analytic_6(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report6', compact('data'));
			}
		}

		public function analytic_7(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report7', compact('data'));
			}
		}

		public function analytic_8(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report8', compact('data'));
			}
		}

		public function analytic_9(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report9', compact('data'));
			}
		}

		public function analytic_10(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report10', compact('data'));
			}
		}

		public function analytic_11(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report11', compact('data'));
			}
		}

		public function analytic_12(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report12', compact('data'));
			}
		}

		public function analytic_13(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report13', compact('data'));
			}
		}

		public function analytic_14(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report14', compact('data'));
			}
		}

		public function analytic_15(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report15', compact('data'));
			}
		}

		public function analytic_16(Request $request)
		{
			if($request->ajax())
			{
				return view('Analytic.report16', compact('data'));
			}
		}
}
