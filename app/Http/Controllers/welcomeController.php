<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class welcomeController extends Controller
{

	public function index()
  {
    if(Auth::check()) {
      $role = auth()->user()->userroleid;
      return view('home',compact('role'));
    }

    
    return view('welcome');
  }
}
