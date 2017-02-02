<?php

namespace App\Providers;

use App\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function __construct()
    {
        
    }
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Add User permission
        Gate::define('add-user', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'add-user')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // Add Role permission
        Gate::define('add-role', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'add-role')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // Add permission permission
        Gate::define('add-permission', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'add-permission')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // Set permission permission
        Gate::define('set-permission', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'set-permission')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // Add menu permission
        Gate::define('add-menu', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'add-menu')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // List users permission
        Gate::define('list-users', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'list-users')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // List roles permission
        Gate::define('list-roles', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'list-roles')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
        // Add agency permission
        Gate::define('add-agency', function($user) {
            $role_id=$user->role_id;
            $permission_id = DB::table('permissions')->where('name', 'like', 'add-agency')->value('id');
            $count = DB::table('permission_role')->where([
                        ['role_id', '=', $role_id],
                        ['permission_id', '=', $permission_id],
                    ])->count();
            return ($count>0);
        });
         // Visit this agency site permission
        Gate::define('visit-this-agency-site', function($user,$agency_id) {
            $count=DB::table('agency_users')->where([
                ['agency_id','=',$agency_id],
                ['user_id','=',$user->id]
               ])->count();
            return ($count>0);
        });
    }
}
