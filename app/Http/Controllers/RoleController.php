<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Permission;
use App\User;
use App\Role;
use Auth;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['password']=$request->input('password');
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    protected function showUserlist()
    {
        if(Gate::allows('list-users'))
        {
        $userlist = DB::table('users')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*','roles.name as role_name')
            ->paginate(10);
        return view('admin/userlist',['userlist'=>$userlist]);
        }
        else
        {
            echo "User Does not have permission";
        }
    }
    protected function showRolelist()
    {
        if(Gate::allows('list-users'))
        {
        $rolelist = DB::table('roles')->paginate(10);
        return view('admin/rolelist',['rolelist'=>$rolelist]);
        }
        else
        {
            echo "User Does not have permission";
        }
    }
    protected function getPermissions(Request $request)
    {
        $plist = DB::table('permissions')->get()->all();
        $r_plist=DB::table('permission_role')->where(['role_id'=>$request->input('role_id')])->pluck('permission_id')->all();
        foreach($plist as $k =>$v){
            if(in_array($v->id,$r_plist))
            {$plist[$k]->is_in=true;}
            else
            {$plist[$k]->is_in=false;}
        }
        return json_encode($plist);
    }
    protected function setPermissions(Request $request)
    {
        if(Gate::allows('set-permission'))
        {
        $plist=$request->input('permission');
        $role=$request->input('role_id');
        DB::delete('delete from permission_role where role_id=?',[$role]);
        foreach($plist as $p)
        {
            DB::insert('insert into permission_role (role_id, permission_id) values (?, ?)', [$role, $p]);
        }
        return Redirect::to('/admin/rolelist');
        }
        else
        {
            echo "User Does not have permission";
        }
    }
    protected function showAdduser()
    {
        $roles=DB::table('roles')->get();
        return view('admin/adduser',['roles'=>$roles]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function createUser(Request $request)
    {
        
        $data['role_id']=(null!==$request->input('role'))?$request->input('role'):4;
        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['password']=$request->input('password');
        if(Gate::allows('add-user'))
        {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
        ]);
        return Redirect::to('/admin/userlist');
        }
        else
        {
            echo "User Does not have permission";
        }
    }
    /*
     * Create a new Role
     * 
     */
    protected function showAddrole()
    {
        return view('admin/addrole');
    }
    
    protected function createRole(Request $request)
    {
        $data['name']=$request->input('name');
        $data['display_name']=(null!==$request->input('display_name'))?$request->input('display_name'):'';
        $data['description']=(null!==$request->input('description'))?$request->input('description'):'';
        if(Gate::allows('add-role'))
        {
        Role::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],
        ]);
        return Redirect::to('/admin/rolelist');
        }
        else
        {
            echo "User Does not have permission";
        }
    }
    
    protected function showAddpermission()
    {
        return view('admin/addpermission');
    }
    
    protected function createPermission(Request $request)
    {
        $data['name']=$request->input('name');
        $data['display_name']=(null!==$request->input('display_name'))?$request->input('display_name'):'';
        $data['description']=(null!==$request->input('description'))?$request->input('description'):'';
        if(Gate::allows('add-permission'))
        {
        Permission::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],
        ]);
        return Redirect::to('/admin/rolelist');
        }
        else
        {
            echo "User Does not have permission";
        }
    }
}
