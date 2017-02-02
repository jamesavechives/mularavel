<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use Image;
use Auth;
use Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ResellerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    protected function showAddagency()
    {
        $role_id=DB::table('roles')->where(['name'=>'end_user'])->value('id');
        $r_plist=DB::table('permission_role')->where(['role_id'=>$role_id])->pluck('permission_id')->all();
        $m_list=DB::table('menus')->whereIn("permission_id", $r_plist)->orderBy('sort', 'desc')->get();
        return view('admin/addagency',['menus'=>$m_list]);
    }
    
    protected function addAgency(Request $request)
    {
        if(Gate::allows('add-agency'))
        {
        $name=$request->input('name');
        $site_name=$request->input('site_name');
        $description=$request->input('description');
        $menus=$request->input('menus');
        $theme=$request->input('theme');
        $reseller_id=Auth::user()->id;
        $a_id=Agency::create([
            'name'=>$name,
            'site_name'=>$site_name,
            'description'=>$description,
            'menus'=>json_encode($menus),
            'theme'=>$theme,
            'logo'=>'',
            'reseller_id'=>$reseller_id,
                            ])->id;
        $file=$request->file('logo');
       if($request->hasFile('logo')){
       $des='upload/agency/logos';
       $extension=$file->getClientOriginalExtension();
       $filename=$des.'/'.$a_id.'.'.$extension;
       Image::make($file)->resize(200,50)->save($filename);
       Session::flash('success', 'Upload successfully'); 
       Agency::where('id','=',$a_id)->update(['logo'=>$filename]);
       }
       return Redirect::to('admin/agencylist');
    }
    else 
     {
        echo "User Does not have permission";
     }
    }
    
    protected function showAgencylist()
    {
        $agencylist=DB::table('agencies')->paginate(10);
        return view('admin/agencylist',['agencylist'=>$agencylist]);
    }
    
    protected function agencyUserlist($id)
    {
       $a_ulist=DB::table('agency_users')->where(['agency_id'=>$id])->pluck('user_id')->all(); 
       $u_list=DB::table('users')->whereIn("users.id", $a_ulist)
               ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*','roles.name as role_name')->paginate(10);
       $nu_list=DB::table('users')->whereNotIn("users.id", $a_ulist)
               ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*','roles.name as role_name')->paginate(10);
       $agency=DB::table('agencies')->where(['id'=>$id])->first();
       return view('admin/agencyusers',['users'=>$u_list,'others'=>$nu_list,'agency'=>$agency]);
    }
    
    protected function addAgencyuser(Request $request)
    {
       $result= DB::insert('insert into agency_users(agency_id, user_id) values (?, ?)', [$request->input('agency_id'), $request->input('user_id')]);
       return ($result?"success":"error");
    }
    
    protected function deleteAgencyuser(Request $request)
    {
        $result=DB::table('agency_users')->where(['agency_id'=>$request->input('agency_id'),'user_id'=>$request->input('user_id')])->delete();
        return ($result?"success":"error");
    }
}
