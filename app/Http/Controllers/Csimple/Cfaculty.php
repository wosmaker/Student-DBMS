<?php

namespace App\Http\Controllers\Csimple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Cfaculty extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$tb = DB::select('SELECT * FROM faculty_list');
		//dd($tb);
        return  view('simple-form/faculty',compact('tb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				DB::insert('INSERT INTO faculty_list (facultycode, facultyname,facultycontact) values (?, ?, ?)', [$request->get('facultycode'),$request->get('facultyname'),$request->get('facultycontact')]);
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
        DB::update('UPDATE faculty_list set facultycode = ?, facultyname = ? ,facultycontact = ?  where facultycode = ?', [$request->get('facultycode'),$request->get('facultyname'),$request->get('facultycontact'),$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
				DB::delete('DELETE faculty_list where facultycode = ?', [$id]);
				return back();
    }
}
