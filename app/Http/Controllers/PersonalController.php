<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\UserList;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');      //login checking
        $this->middleware('role:1,2,5');    //เช็คว่า role = 1 หรือเปล่า
    }

    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        $departments = DB::table('department_list')
        ->select('departmentcode', 'departmentname')
        ->get()->all();

        return view('complex-form.personal.index', compact('role','departments', 'userid', 'userdetail'));
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
        $identificationno = request('identificationno');
        $userid = auth()->user()->id;
        $titlename = request('titlename');
        $firstname = request('firstname');
        $lastname = request('lastname');
        $gender = request('gender');
        $bloodtype = request('bloodtype');
        $birthdate = request('birthdate');
        $race = request('race');
        $religion = request('religion');
        $nationnality = request('nationnality');
        $address = request('address');
        $postcode = request('postcode');
        $province = request('province');
        $district = request('district');
        $subdistrict = request('subdistrict');
        $departmentcode = request('departmentcode');
        $usercontact = request('usercontact');

        DB::table('user_list')
        ->where('userid', '=', $userid)
        ->update([
            'identificationno' => $identificationno,
            'userid' => $userid,
            'titlename' => $titlename,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'gender' => $gender,
            'bloodtype' => $bloodtype,
            'birthdate' => $birthdate,
            'race' => $race,
            'religion' => $religion,
            'nationnality' => $nationnality,
            'address' => $address,
            'postcode' => $postcode,
            'province' => $province,
            'district' => $district,
            'subdistrict' => $subdistrict,
            'departmentcode' => $departmentcode,
            'usercontact' => $usercontact
        ]);

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
    public function update(Request $request)
    {
			if($request->ajax())
					{
						$userid = auth()->user()->id;
						$validatedData = $request->validate([
									'identificationno' => 'required',
									'titlename' =>   'required' ,
									'firstname' =>   'required' ,
									'lastname' =>   'required' ,
									'gender' =>   'required' ,
									'bloodtype' =>   'required' ,
									'birthdate' =>   'required' ,
									'race' =>   'required' ,
									'religion' =>   'required' ,
									'nationnality' =>   'required' ,
									'address' =>   'required' ,
									'postcode' =>   'required' ,
									'province' =>   'required' ,
									'district' =>   'required' ,
									'subdistrict' =>   'required' ,
									'usercontact' =>   'required'
						]);

						$identificationno = request('identificationno');
						$userid = auth()->user()->id;
						$titlename = request('titlename');
						$firstname = request('firstname');
						$lastname = request('lastname');
						$gender = request('gender');
						$bloodtype = request('bloodtype');
						$birthdate = request('birthdate');
						$race = request('race');
						$religion = request('religion');
						$nationnality = request('nationnality');
						$address = request('address');
						$postcode = request('postcode');
						$province = request('province');
						$district = request('district');
						$subdistrict = request('subdistrict');
						$departmentcode = request('departmentcode');
						$usercontact = request('usercontact');

						// DB::table('user_list')
						// ->updateOrInsert([
						// 		['userid' => $userid],
						// 		[
						// 			'identificationno' => $identificationno,
						// 			'titlename' => $titlename,
						// 			'firstname' => $firstname,
						// 			'lastname' => $lastname,
						// 			'gender' => $gender,
						// 			'bloodtype' => $bloodtype,
						// 			'birthdate' => $birthdate,
						// 			'race' => $race,
						// 			'religion' => $religion,
						// 			'nationnality' => $nationnality,
						// 			'address' => $address,
						// 			'postcode' => $postcode,
						// 			'province' => $province,
						// 			'district' => $district,
						// 			'subdistrict' => $subdistrict,
						// 			'departmentcode' => $departmentcode,
						// 			'usercontact' => $usercontact
						// 		]
						// ]);

						DB::insert('INSERT into user_list (userid,identificationno, titlename,firstname,lastname,gender,bloodtype,birthdate,race,religion,nationnality,address,postcode,province,district,subdistrict,departmentcode,usercontact)
						values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE
						titlename = ?,firstname = ? , lastname = ?,gender = ?,bloodtype = ?,birthdate = ?,race = ?,religion = ?,nationnality = ?,address = ?,postcode = ?,province = ?,district = ?,subdistrict = ?,departmentcode = ?,usercontact = ?
						', [$userid,$identificationno, $titlename,$firstname,$lastname,$gender,$bloodtype,$birthdate,$race,$religion,$nationnality,$address,$postcode,$province,$district,$subdistrict,$departmentcode,$usercontact ,
								$titlename,$firstname,$lastname,$gender,$bloodtype,$birthdate,$race,$religion,$nationnality,$address,$postcode,$province,$district,$subdistrict,$departmentcode,$usercontact]);
					return response("complete");
				}
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
