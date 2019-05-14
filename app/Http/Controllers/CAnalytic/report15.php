<?php

namespace App\Http\Controllers\CAnalytic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class report15 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$report15 = DB::select('SELECT dl.DepartmentName , COUNT(dl.DepartmentName) AS count
		FROM department_list dl,user_list ul,transaction_list tl, registration_student rl
		WHERE dl.DepartmentCode = ul.DepartmentCode AND ul.UserID = rl.UserID AND rl.TransactionID = tl.TransactionID
		AND (tl.PaymentStatus = :wait OR PaymentDate > :noww)
		GROUP BY dl.DepartmentName;
		',['wait' => 'waiting','noww' => 'now']);

	// dd($report15);
	return view('Analytic.report15', compact('report15'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
