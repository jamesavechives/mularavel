<?php

namespace App\Policies;

use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    protected $user;
    public function __construct()
   {
        $this->user = Auth::user();
    }
    /**
     * Determine whether the user can add a new user
     * 
     * @param  \App\User $user
     */
    public function add_user(User $user)
    {
        $role_id=$user->role_id;
        
        $permission_id=DB::table('permissions')->where('name','like','add_user')->value('id');
        $count = DB::table('permission_role')->where([
                    ['role_id', '=', $role_id],
                    ['permission_id', '=', $permission_id],
                ])->count();
        return ($count>0);
    }
}
