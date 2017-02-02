<?php

namespace App\Http\Controllers;

use Gate;
use Route;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    //
    private $id,$menu,$theme;
    public function __construct()
    {
        $this->middleware('auth');
        $this->id = Route::current()->parameter('id');
        $this->theme=DB::table('agencies')->where(['id'=>$this->id])->value('theme');
        $this->menu=DB::table('agencies')->where(['id'=>$this->id])->value('menus');
    }
    
    private function checkmenu($menu_name)
    {
        $menu_id=DB::table('menus')->where( ['name'=>$menu_name])->value('id');
            return (in_array($menu_id,json_decode($this->menu)));
    }
    protected function home($id)
    {
        if(Gate::allows('visit-this-agency-site',$id))
        {
        $title="Home-".DB::table('agencies')->where(['id'=>$id])->value('site_name');
        $m_list=DB::table('menus')->whereIn("id", json_decode($this->menu))->orderBy('sort', 'desc')->get();
        $theme=$this->theme;
        return view('agency/home',['menus'=>$m_list,'id'=>$id,'title'=>$title],compact('theme'));
        }
        else
        {
            echo "You can not visit this agency site!";
        }
    }
    protected function pairApp($id)
    {
        if(Gate::allows('visit-this-agency-site',$id)&&$this->checkmenu('pairing-app'))
        {
        $theme=$this->theme;
        $title="Pairing App-".DB::table('agencies')->where(['id'=>$id])->value('site_name');
        return view('agency/pairing-app',['id'=>$id,'title'=>$title],compact('theme'));
        }
        else
        {
            echo "You can not visit this agency site!";
        }
    }
    
}
