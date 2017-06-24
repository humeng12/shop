<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',function(){
    return view('home');
});

Route::get('/home',function(){
    return view('welcome');
});

Route::get('admin/index', ['as' => 'admin.index', 'middleware' => ['auth','menu'], 'uses'=>'Admin\\IndexController@index']);

$this->group(['namespace' => 'Admin','prefix' => '/admin',], function () {
    Route::auth();
});

Route::group(['namespace' => 'Member', 'middleware' => ['auth','menu']],function(){

    //会员系统
    Route::get('member/permission', ['as' => 'member.permission', 'uses' => 'IndexController@index']);
    Route::any('member/index/index', ['as' => 'member.index.index', 'uses' => 'IndexController@index']);

    //积分规则
    Route::any('member/rule/index', ['as' => 'member.rule.index', 'uses' => 'RuleController@index']);

});


Route::group(['namespace' => 'Good', 'middleware' => ['auth','menu']],function(){

    //商品
    Route::any('good/permission', ['as' => 'good.permission', 'uses' => 'IndexController@index']);
    Route::any('good/index/index', ['as' => 'good.index.index', 'uses' => 'IndexController@index']);
});


Route::group(['namespace' => 'System', 'middleware' => ['auth','menu']],function(){

    //设置
    Route::any('system/permission', ['as' => 'system.permission', 'uses' => 'IndexController@index']);
    Route::any('system/index/index', ['as' => 'system.index.index', 'uses' => 'IndexController@index']);
    Route::resource('system/role', 'IndexController');
    Route::any('system/index/create', ['as' => 'system.index.create', 'uses' => 'IndexController@create']);
    Route::post('system/index/setting', ['as' => 'system.index.setting', 'uses' => 'IndexController@setting']);
});


$router->group(['namespace' => 'Admin', 'middleware' => ['auth','authAdmin','menu']], function () {
    //权限管理路由
    Route::get('admin/permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('admin/permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('admin/permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询

    Route::resource('admin/permission', 'PermissionController');
    Route::put('admin/permission/update', ['as' => 'admin.permission.edit', 'uses' => 'PermissionController@update']); //修改
    Route::post('admin/permission/store', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@store']); //添加


    //角色管理路由
    Route::get('admin/role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('admin/role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('admin/role', 'RoleController');
    Route::put('admin/role/update', ['as' => 'admin.role.edit', 'uses' => 'RoleController@update']); //修改
    Route::post('admin/role/store', ['as' => 'admin.role.create', 'uses' => 'RoleController@store']); //添加


    //用户管理路由
    Route::get('admin/user/manage', ['as' => 'admin.user.manage', 'uses' => 'UserController@index']);  //用户管理
    Route::post('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('admin/user', 'UserController');
    Route::put('admin/user/update', ['as' => 'admin.user.edit', 'uses' => 'UserController@update']); //修改
    Route::post('admin/user/store', ['as' => 'admin.user.create', 'uses' => 'UserController@store']); //添加


});

Route::get('admin', function () {
    return redirect('/admin/index');
});

Route::auth();



Route::any('/wechat', 'WechatController@serve');


Route::get('weixin/token', 'WeixinController@token');
Route::post('weixin/token', 'WeixinController@token');
Route::any('weixin/api', 'WeixinController@api');


Route::group(['middleware' => ['web']], function () {

    //测试接口
    Route::get('/api/demo','ApiController@demo');

    Route::any('/api/getOpenid','ApiController@getOpenid');

    Route::any('/api/getUserBaseInfo','ApiController@getUserBaseInfo');

});



