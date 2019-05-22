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
					 FROM user_list u,registration_student r, sectioneachsubject ss, department_list d
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

				return view('Analytic.report2', compact('data'));
			}
		}

		public function analytic_3(Request $request)
		{
			if($request->ajax())
			{
				$not_late = 'Not Late';
				$not_regis = 'Not Regis';
				$late = 'Late';
				$time = '2019-05-22 15:17:00';

				$data = DB::select(
				  'SELECT (CASE WHEN row_temp = 1 THEN ? WHEN row_temp = 2 THEN ? ELSE ? END) AS group_type,
					count, percent FROM(SELECT row_number() over(ORDER BY (SELECT NULL)) as row_temp,count(temp2.late) as Count,
					ROUND( CAST(count(temp2.late)*100 as numeric)/CAST((SELECT count( CASE WHEN userroleid = 1 then 1 ELSE NULL END)
					FROM users)as numeric),2) as Percent from (SELECT CASE WHEN Latest_Regis is null THEN ?
					WHEN Latest_Regis > timestamp ? Then ? ELSE ? END as late
					FROM (SELECT u.id,temp.latest_regis from (SELECT userid,max(dateregis) as Latest_Regis
					FROM registration_student  GROUP BY userid) temp FULL OUTER JOIN users u on temp.userid= u.id
					where u.userroleid =1)  temp1) temp2 GROUP BY temp2.late) temp3 WHERE row_temp !=2
				',[$late,$not_late,$not_regis,$not_regis,$time,$late,$not_late]);

				return view('Analytic.report3', compact('data'));
			}
		}

		public function analytic_4(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
					'SELECT  rl.BuildingName, COUNT(DISTINCT ses.SubjectCode),CAST(COUNT(DISTINCT ses.SubjectCode) AS FLOAT)  *100/(
						 SELECT COUNT(DISTINCT ses.SubjectCode) 
					 	FROM room_list rl, schedule s,sectioneachsubject ses 
					 	WHERE rl.RoomCode = s.RoomCode AND 
					 		ses.SubjectSectionID = s.SubjectSectionID) AS Percent
			 		FROM room_list rl, schedule s,sectioneachsubject ses
			 		WHERE 	rl.RoomCode = s.RoomCode AND 
				 			ses.SubjectSectionID = s.SubjectSectionID
			 		GROUP BY rl.BuildingName
			 	');
				return view('Analytic.report4', compact('data'));
			}

		}

		public function analytic_5(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT ses.subjectcode, ses.sectionno, rl.buildingname,sc.roomcode,CAST(COUNT(rs.userid) AS FLOAT)*100/rl.roomseattotal AS seatused
				   	FROM registration_student rs, sectioneachsubject ses, schedule sc, room_list rl
				   	WHERE 	ses.subjectsectionid = rs.subjectsectionid AND
					   		ses.subjectsectionid = sc.subjectsectionid AND
							rl.roomcode = sc.roomcode
				   	GROUP BY ses.subjectsectionid,sc.roomcode,rl.buildingname,rl.roomseattotal
				   	ORDER BY ses.subjectcode
				');
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
				$data = DB::select(
				   'SELECT m.buildingname,MIN(r.roomseattotal),MAX(r.roomseattotal),m.roomseatTotal AS mode
					FROM (	SELECT a.buildingname,a.roomseattotal,COUNT(a.roomseattotal) AS modecount
							FROM room_list a
						  	GROUP BY buildingname,roomseattotal) m ,

						 (	SELECT n.buildingname,MAX(n.modecount) AS maxmode
						  	FROM (	SELECT b.buildingName,b.roomseattotal,COUNT(b.roomseatTotal) AS modecount
								 	FROM room_list b
								 	GROUP BY b.buildingname,b.roomseattotal) n
						  	GROUP BY n.buildingname) o,
						  room_list r
					WHERE m.modecount = o.maxmode AND r.buildingname = m.buildingname
					GROUP BY m.buildingname,m.roomseattotal
				');

				return view('Analytic.report7', compact('data'));
			}
		}

		public function analytic_8(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT  pl.paymenttypeName ,COUNT( pl.paymenttypeName ) , round(CAST(COUNT( pl.paymenttypeName )*100/(SUM(tid.counts)/COUNT( pl.paymenttypeName ))as numeric) ,2) AS percent
					FROM transaction_list tl , paymenttype_list pl , (
						SELECT COUNT(*) AS counts 
						FROM transaction_list) tid
					WHERE tl.paymenttypeid = pl.paymenttypeid
					GROUP BY  pl.paymenttypename
				',);
			
				return view('Analytic.report8', compact('data'));
			}
		}

		public function analytic_9(Request $request)
		{
			if($request->ajax())
			{
				$time = '2019-05-22 15:16:00';

				$data = DB::select(
				   'SELECT dl.DepartmentName , COUNT(dl.DepartmentName),ROUND( CAST(CAST(COUNT(dl.DepartmentName)*100 AS FLOAT)/(SELECT COUNT(dl.DepartmentName) FROM department_list dl,user_list ul,transaction_list tl, registration_student rl WHERE dl.DepartmentCode = ul.DepartmentCode AND ul.UserID = rl.UserID AND rl.TransactionID = tl.TransactionID AND  PaymentDate > ? )AS numeric),2) AS Percent
					 FROM department_list dl,user_list ul,transaction_list tl, registration_student rl
					 WHERE dl.DepartmentCode = ul.DepartmentCode AND ul.UserID = rl.UserID AND rl.TransactionID = tl.TransactionID
					 AND PaymentDate > ?
					 GROUP BY dl.DepartmentName
				',[$time,$time]);

				return view('Analytic.report9', compact('data'));
			}
		}

		public function analytic_10(Request $request)
		{
			if($request->ajax())
			{
				$start = '2019-05-01';
				$end = '2019-05-30';

				$data = DB::select(
				   'SELECT DATE(PaymentDate) AS date,COUNT( UserID) AS paymentcount ,  ROUND(CAST(CAST(COUNT( UserID) AS Float) *100/(SELECT COUNT(*) FROM transaction_list) AS numeric),2) AS percent
				   	FROM transaction_list 
				   	WHERE DATE(PaymentDate) BETWEEN ? AND ?
				   	GROUP BY DATE(PaymentDate) 
				',[$start, $end]);
				return view('Analytic.report10', compact('data'));
			}
		}

		public function analytic_11(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT dl.departmentname , COUNT(dl.departmentcode) , ROUND(CAST(CAST(COUNT(dl.departmentcode) AS FLOAT)*100/c.counts AS numeric),2) AS Percent
				   	FROM department_list dl, user_list ul, problemreport_list pl ,(
						SELECT COUNT(cc.problemno) AS counts FROM problemreport_list cc) c
				   	WHERE dl.DepartmentCode = ul.DepartmentCode AND ul.UserID = pl.UserID
				   	GROUP BY dl.DepartmentCode, c.counts ORDER BY count DESC
				');
				return view('Analytic.report11', compact('data'));
			}
		}

		public function analytic_12(Request $request)
		{
			if($request->ajax())
			{
				$male = 'male';
				$female = 'female';

				$data = DB::select(
				   'SELECT EXTRACT(YEAR FROM DATE(rs.Latest_Regis)) AS YEAR, COUNT(CASE WHEN ul.gender = ? THEN 1 ELSE NULL END) as Male,
				   		count(CASE WHEN ul.gender = ? THEN 1 ELSE NULL END) as Female 
				   	FROM (SELECT userid,max(dateregis) as Latest_Regis FROM registration_student  GROUP BY userid) rs, user_list ul 
				   	WHERE ul.userid = rs.userid GROUP BY EXTRACT(YEAR FROM DATE(rs.Latest_Regis))
				',[$male, $female]);
				dd($data);
				return view('Analytic.report12', compact('data'));
			}
		}

		public function analytic_13(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT  sl.SubjectName , SUM(ses.SeatAvailable) , SUM(ses.SeatAvailable)-sss.AVG AS differenceFromMean
				   	FROM subject_list sl, sectioneachsubject ses, (
						SELECT AVG(ss.summ) AS AVG
						FROM (
							SELECT  sl.SubjectName , SUM(ses.SeatAvailable) AS summ
							FROM subject_list sl, sectioneachsubject ses
							WHERE sl.SubjectCode = ses.SubjectCode
							GROUP BY sl.SubjectCode
							ORDER BY SUM(ses.SeatAvailable) DESC) ss ) sss
				   	WHERE sl.SubjectCode = ses.SubjectCode
				   	GROUP BY sl.SubjectCode , sss.AVG
				   	ORDER BY SUM(ses.SeatAvailable) DESC
				   	LIMIT 5
				');

				return view('Analytic.report13', compact('data'));
			}
		}

		public function analytic_14(Request $request)
		{
			if($request->ajax())
			{
				$data = DB::select(
				   'SELECT  sl.SubjectName , SUM(ses.SeatAvailable) , SUM(ses.SeatAvailable)-sss.AVG AS differenceFromMean
				   	FROM subject_list sl, sectioneachsubject ses, (
						SELECT AVG(ss.summ) AS AVG
						FROM (	SELECT  sl.SubjectName , SUM(ses.SeatAvailable) AS summ
								FROM subject_list sl, sectioneachsubject ses
								WHERE sl.SubjectCode = ses.SubjectCode
								GROUP BY sl.SubjectCode
								ORDER BY SUM(ses.SeatAvailable) DESC) ss ) sss
				   	WHERE sl.SubjectCode = ses.SubjectCode
				   	GROUP BY sl.SubjectCode , sss.AVG
				   	ORDER BY SUM(ses.SeatAvailable)
				   	LIMIT 5
				');

				return view('Analytic.report14', compact('data'));
			}
		}

		public function analytic_15(Request $request)
		{
			if($request->ajax())
			{
				$waiting = 'waiting';
				$now = 'now';

				$data = DB::select(
				   'SELECT dl.DepartmentName , COUNT(dl.DepartmentName) AS count ,CAST(COUNT(dl.DepartmentName) AS FLOAT)*100/(
					   SELECT COUNT(dl.DepartmentName)
					   FROM department_list dl,user_list ul,transaction_list tl, registration_student rl 
					   WHERE dl.DepartmentCode = ul.DepartmentCode AND 
					   	ul.UserID = rl.UserID AND 
						   rl.TransactionID = tl.TransactionID AND 
						   (tl.PaymentStatus = ? OR PaymentDate > ? )) AS percent
				   	FROM department_list dl,user_list ul,transaction_list tl, registration_student rl
				   	WHERE dl.DepartmentCode = ul.DepartmentCode AND ul.UserID = rl.UserID AND rl.TransactionID = tl.TransactionID
				   	AND (tl.PaymentStatus = ? OR PaymentDate > ?)
				   GROUP BY dl.DepartmentName 
				',[$waiting, $now ,$waiting, $now]);
				dd($data);

				return view('Analytic.report15', compact('data'));
			}
		}

		public function analytic_16(Request $request)
		{
			if($request->ajax())
			{
				$waiting = 'waiting';

				$data = DB::select(
				   'SELECT ptl.ProblemTypeName , COUNT(ptl.ProblemTypeID) AS NOTANSWER , COUNT(ptl.ProblemTypeID)*100/(SUM(prc.counts)/COUNT(ptl.ProblemTypeID)) AS percent
					FROM problemtype_list ptl, problemreport_list prl , (SELECT COUNT(*) AS counts FROM problemreport_list) prc
					WHERE ptl.ProblemTypeID = Prl.ProblemTypeID AND prl.ProblemStatus = ?
					GROUP BY ptl.ProblemTypeID
				',[$waiting]);

				return view('Analytic.report16', compact('data'));
			}
		}
}
