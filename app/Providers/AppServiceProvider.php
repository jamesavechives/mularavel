<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.app', function($view) {
            $user = Auth::user();
            if(null!==$user)
            {
            $r_plist=DB::table('permission_role')->where(['role_id'=>$user->role_id])->pluck('permission_id')->all();
            $m_list=DB::table('menus')->where('cat','like','back_text')->whereIn("permission_id", $r_plist)->orderBy('sort', 'desc')->get();
            $view->with('menus', $m_list);
            }
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
