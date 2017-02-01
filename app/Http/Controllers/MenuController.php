<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Permission;
use App\Menu;
use Config;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
   
    //
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
    
    protected function showAddmenu()
    {
        
        $plist=DB::table('permissions')->get()->all();
//        $data=[];
//        $m_plist=DB::table('menus')->pluck('permission_id')->all();
//        foreach($plist as $k =>$v)
//        {
//            if(!in_array($v->id,$m_plist))
//            {
//                array_push($data,$v);
//            }
//        }
        return view('admin/addmenu',['permissions'=>$plist]);
    }
    
    protected function createMenu(Request $request)
    {
        $name=$request->input('name');
        $display_name=$request->input('display_name');
        $description=$request->input('description');
        $uri=$request->input('uri');
        $cat=$request->input('cat');
        $permission_id=$request->input('permission_id');
        $is_able=$request->input('is_able');
        $m_id=Menu::create([
            'name'=>$name,
            'display_name'=>$display_name,
            'description'=>$description,
            'uri'=>$uri,
            'cat'=>$cat,
            'permission_id'=>$permission_id,
            'is_able'=>$is_able,
                            ])->id;
        $file=$request->file('icon');
       if($request->hasFile('icon')){
       $des='upload/menu/icons';
       $extension=$file->getClientOriginalExtension();
       $filename=$des.'/'.$m_id.'.'.$extension;
       Image::make($file)->resize(50,50)->save($filename);
       Session::flash('success', 'Upload successfully'); 
       Menu::where('id','=',$m_id)->update(['icon'=>$filename]);
       }
       return Redirect::to('admin/home');
    }
}

