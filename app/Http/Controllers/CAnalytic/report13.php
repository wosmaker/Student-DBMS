<?php

namespace App\Http\Controllers\CAnalytic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class report13 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$report13 = DB::select('SELECT  sl.SubjectName , SUM(ses.SeatAvailable) AS sum
		FROM subject_list sl, sectioneachsubject ses
		WHERE sl.SubjectCode = ses.SubjectCode
		GROUP BY sl.SubjectName
		ORDER BY SUM(ses.SeatAvailable) DESC
		LIMIT 5
		');

		dd($report13);
	return view('Analytic.report13', compact('report13'));
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
