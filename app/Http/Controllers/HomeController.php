<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $u_alist=DB::table('agency_users')->where(['user_id'=>$user_id])->pluck('agency_id')->all(); 
        $a_list=DB::table('agencies')->whereIn("id", $u_alist)->select('id','site_name')->get();
        return view('admin/home',['agencylist'=>$a_list]);
    }
}
