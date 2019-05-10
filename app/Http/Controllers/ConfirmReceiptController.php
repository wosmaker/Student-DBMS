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
    public function index()
    {
        $userid = auth()->user()->id;   //ดึงค่า id ของผู้ใช้
        $userdetail = UserList::where('UserID', $userid)->first();  //ดึงชื่อผู้ใช้งาน

        $transactionlists = DB::table('transaction_list AS tl')
        ->join('user_list AS ul' , 'ul.UserID', '=', 'tl.UserID')
        ->join('paymenttype_list AS pt', 'pt.PaymentTypeID', '=', 'tl.PaymentTypeID')
        ->select('tl.TransactionID','ul.FirstName', 'ul.LastName', 'pt.PaymentTypeName', 'tl.PictureLink', 'tl.PaymentDate', 'tl.PaymentStatus')
        ->get()->all();

        return view('complex-form.confirm-receipt.index', compact('userdetail', 'transactionlists'));
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
