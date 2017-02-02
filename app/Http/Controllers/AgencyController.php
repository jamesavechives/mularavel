<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    protected function home($id)
    {
        if(Gate::allows('visit-this-agency-site',$id))
        {
        $menu=DB::table('agencies')->where(['id'=>$id])->value('menus');
        $theme=DB::table('agencies')->where(['id'=>$id])->value('theme');
        $title="Home-".DB::table('agencies')->where(['id'=>$id])->value('site_name');
        $m_list=DB::table('menus')->whereIn("id", json_decode($menu))->orderBy('sort', 'desc')->get();
        return view('agency/home',['menus'=>$m_list,'id'=>$id,'title'=>$title],compact('theme'));
        }
        else
        {
            echo "You can not visit this agency site!";
        }
    }
    protected function pairApp($id)
    {
        $theme=DB::table('agencies')->where(['id'=>$id])->value('theme');
        $title="Pairing App-".DB::table('agencies')->where(['id'=>$id])->value('site_name');
        return view('agency/pairing-app',['id'=>$id,'title'=>$title],compact('theme'));
        
    }
    
}
