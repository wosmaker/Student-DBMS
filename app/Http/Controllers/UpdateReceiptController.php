<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\User;
use App\UserList;

class UpdateReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');      //login checking
        $this->middleware('role:1,5');    //เช็คว่า role = 1 หรือเปล่า
		}

		protected function value_transaction()
		{
			$userid = auth()->user()->id;
			$transactionlists = DB::table('transaction_list as tl')
			->join('user_list as ul' , 'ul.userid', '=', 'tl.userid')
			->join('paymenttype_list as pt', 'pt.paymenttypeid', '=', 'tl.paymenttypeid')
			->select('tl.transactionid','ul.firstname', 'ul.lastname', 'pt.paymenttypename', 'tl.picturelink', 'tl.paymentdate', 'tl.paymentstatus')
			->where('ul.userid' ,'=', $userid)
			->get()->all();

			return $transactionlists;
		}

    public function index()
    {
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $role = auth()->user()->userroleid;
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

			//ดึงข้อมูลวิชาที่ลงทะเบียนไว้แล้ว
			$regissubjects = DB::table('registration_student as r')
					->join('sectioneachsubject as ss', 'r.subjectsectionid', '=', 'ss.subjectsectionid')
					->join('subject_list as sl', 'ss.subjectcode', '=', 'sl.subjectcode')
					->select('sl.subjectcode','sl.subjectname', 'ss.sectionno', 'sl.subjectcredit',)
					->where('r.userid', '=' , $userid)
					->get();
		/*
		$regissubjects  = DB::select('SELECT s.subjectcode , s.subjectname,ses.sectionno,s.subjectcredit
		FROM subject_list s, sectioneachsubject ses,registration_student rs
		WHERE s.subjectcode = ses.subjectcode AND ses.subjectsectionid = rs.subjectsectionid AND
		rs.userid = :userid;
		', ['userid' => $userid]);
*/
				$transactionlists = $this->value_transaction();

        //คำนวณหน่วยกิตทั้งหมด
        $sumcredit = $regissubjects->sum('subjectcredit');

        //แปลงให้เป็น array เพราะตอนแรกยังเป็น collection
        $regissubjects = $regissubjects->all();

				$paymenttypes = DB::select('SELECT paymenttypeid,paymenttypename FROM paymenttype_list');


        return view('complex-form.update-receipt.index', compact('userdetail','regissubjects','sumcredit','paymenttypes','role', 'transactionlists'));
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
				$role = auth()->user()->userroleid;

        //รับค่าจาก dropbox
        $paymenttype = $request->get('paymenttype');

        //รับค่าเงินที่จ่าย
        $amount = $request->get('amount');

        //เช็คว่ามีไฟล์หรือไม่แล้วทำการเก็บเข้าโฟลเดอร์ upload
						$file = $request->file('imgInp');
						$image_name = $request->file('imgInp')->getRealPath();
            $extension = $file->getClientOriginalExtension();
            // $filename = $userid . '_' . time() . '.' . $extension;
            // Storage::putFileAs('public/upload', $file , $filename);
						Cloudder::upload($image_name, null);

				dd($image_name);
        //คำนวณ Semester
        if((int)(date('n')) > 7) $semester = '1' . date('/Y');
        else $semester = '2' . date('/Y');

        //insert in DB
        DB::table('transaction_list')->insert(    //insertGetId จะค่าในคอลัมน์ auto inc กลับมาด้วย
            [
								'userid'        => $userid ,
                'amount'        => $amount ,
                'semester'      => $semester ,
                'paymenttypeid' => $paymenttype ,
                'paymentstatus' => 'waiting' ,
                'picturelink'   => $image_name ,
            ]
        );

        $transactionid = DB::select('SELECT transactionid FROM transaction_list ORDER BY transactionid DESC LIMIT 1');
        $transactionid = $transactionid[0]->transactionid;

        DB::table('registration_student')
            ->where('userid', '=', $userid)
            ->update(['transactionid' => $transactionid]);

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
    public function destroy(Request $request)
    {
			if($request->ajax())
			{
				$id = request('id');
        DB::table('transaction_list')
        ->where('transactionid', '=', $id)
				->delete();

				$transactionlists = $this->value_transaction();

        return view('complex-form.update-receipt.tb_transaction', compact('transactionlists'));
			}
    }
}
