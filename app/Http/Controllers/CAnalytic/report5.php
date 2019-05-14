<?php

namespace App\Http\Controllers\CAnalytic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class report5 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$report5 = DB::select('SELECT DISTINCT sl.SubjectName, ses.SectionNo,rl.BuildingName,rl.Floor, rl.RoomSeatTotal - ses.SeatAvailable AS seatAvailable
		FROM subject_list sl,sectioneachsubject ses,schedule s,room_list rl,registration_student rs
		WHERE sl.SubjectCode = ses.SubjectCode AND ses.SubjectSectionID = s.SubjectSectionID AND s.RoomCode = rl.RoomCode
		AND ses.SubjectSectionID = rs.SubjectSectionID;
		');
	dd($report5);
	return view('Analytic.report5', compact('report5'));
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
