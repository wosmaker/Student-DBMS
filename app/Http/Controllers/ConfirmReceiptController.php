<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\User;
use App\UserList;

class ConfirmReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');      
        $this->middleware('role:3,5');   
    }

    public function index()
    {
        $role = auth()->user()->userroleid;
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('userid', $userid)->first();  //ดึงชื่อผู้ใช้งาน

		$transactionlists = db::table('transaction_list as tl')
        ->join('user_list as ul' , 'ul.userid', '=', 'tl.userid')
        ->join('paymenttype_list as pt', 'pt.paymenttypeid', '=', 'tl.paymenttypeid')
        ->select('tl.transactionid','ul.firstname', 'ul.lastname', 'pt.paymenttypename', 'tl.picturelink', 'tl.paymentdate', 'tl.paymentstatus')
		->get()->all();

		//dd($transactionlists,$userdetail);
      return view('complex-form.confirm-receipt.index', compact('userdetail', 'transactionlists', 'role'));
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
        // $image_name = request('img-name');
        // $image = Storage::get('upload/' . $image_name);
        // $contents = Storage::disk('public')->get('upload/' . $image_name);
        // $url = asset('storage/upload/' . $image_name);
        // dd($url);
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
            $transaction_id = request('transaction_id');

            DB::table('transaction_list')
            ->where('transactionID', '=', $transaction_id)
            ->update(['paymentstatus' => 'CONFIRM']);

            return back();
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
