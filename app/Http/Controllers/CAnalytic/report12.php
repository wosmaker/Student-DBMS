<?php

namespace App\Http\Controllers\CAnalytic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class report12 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$report12 = DB::select('SELECT EXTRACT(YEAR FROM DATE(rs.DateRegis)) AS YEAR, COUNT(EXTRACT(YEAR FROM DATE(rs.DateRegis))) AS count
		FROM user_list ul , registration_student rs
		WHERE ul.UserID = rs.UserID AND ul.Gender = :male
		GROUP BY EXTRACT(YEAR FROM DATE(rs.DateRegis));
		',['male' => 'Male']);

	//dd($report12);
	return view('Analytic.report12', compact('report12'));
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
