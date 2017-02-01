<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'MenuController@switchLang']);

Route::group(array('prefix' => 'admin'), function() {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    
    Route::get('/adduser', 'RoleController@showAdduser');
    Route::post('/adduser', 'RoleController@createUser');

    Route::get('/addrole', 'RoleController@showAddrole');
    Route::post('/addrole', 'RoleController@createRole');

    Route::get('/addpermission', 'RoleController@showAddpermission');
    Route::post('/addpermission', 'RoleController@createPermission');

    Route::get('/userlist', 'RoleController@showUserlist');
    Route::get('/rolelist', 'RoleController@showRolelist');
    Route::get('/permissionlist', 'RoleController@getPermissions');
    Route::post('/setpermission', 'RoleController@setPermissions');


    Route::get('/addmenu', 'MenuController@showAddmenu');
    Route::post('/addmenu', 'MenuController@createMenu');

    Route::get('/addagency', 'AgencyController@showAddagency');
    Route::post('/addagency', 'AgencyController@addAgency');

    Route::get('/agencylist', 'AgencyController@showAgencylist');
});

Route::group(array('prefix' => 'agency'), function() {
    Route::get('{id}/', ['uses'=>'AgencyController@home']);
});


