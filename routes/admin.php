<?php
/**
 * 后台路由文件
 * User: singeo
 * Date: 4/4/19
 * Time: 2:10 PM
 */
Route::group([
    'domain' => 'larsadmin.singeo.com',
    'namespace' => 'Admin'
], function () {
    // 控制器在 "App\Http\Controllers\Admin\" 命名空间下
    Route::group(['middleware'=>'auth:consoleUser'],function (){
        //后台首页
        Route::get('/','\App\Admin\Controllers\IndexController@index') ;
        Route::get('/index','\App\Admin\Controllers\IndexController@index') ;
        //后台用户管理路由
        Route::group(['prefix'=>'consoleuser'],function ()
        {
            Route::get('index','\App\Admin\Controllers\ConsoleUserController@index');
            Route::get('create','\App\Admin\Controllers\ConsoleUserController@create');
            Route::post('store','\App\Admin\Controllers\ConsoleUserController@store');
            Route::get('edit/{console_user}','\App\Admin\Controllers\ConsoleUserController@edit');
            Route::put('save','\App\Admin\Controllers\ConsoleUserController@save');
        }) ;
        //后台角色管理路由
        Route::group(['prefix'=>'consolerole'],function (){
            Route::get('index','\App\Admin\Controllers\ConsoleRoleController@index');
            Route::get('create','\App\Admin\Controllers\ConsoleRoleController@create');
            Route::post('store','\App\Admin\Controllers\ConsoleRoleController@store');
            Route::get('edit/{console_role}','\App\Admin\Controllers\ConsoleRoleController@edit');
            Route::put('save','\App\Admin\Controllers\ConsoleRoleController@save');
        });
        //后台节点管理路由
        Route::group(['prefix'=>'consolenode'],function ()
        {
            Route::get('index','\App\Admin\Controllers\ConsoleNodeController@index');
            Route::get('create/{console_node?}','\App\Admin\Controllers\ConsoleNodeController@create');
            Route::post('store','\App\Admin\Controllers\ConsoleNodeController@store');
            Route::get('edit/{console_node}','\App\Admin\Controllers\ConsoleNodeController@edit');
            Route::put('save','\App\Admin\Controllers\ConsoleNodeController@save');
            Route::get('delete/{console_node}','\App\Admin\Controllers\ConsoleNodeController@destroy');
            Route::delete('delete','\App\Admin\Controllers\ConsoleNodeController@submitDestroy');
        }) ;
    }) ;

    //后台登录路由
    Route::get('login','\App\Admin\Controllers\LoginController@index');
    Route::get('logout','\App\Admin\Controllers\LoginController@logout');
    Route::post('login','\App\Admin\Controllers\LoginController@submit');
    Route::get('verify','\App\Admin\Controllers\LoginController@verify');
    Route::get('fails',function (){
        return view('admin.common.fails') ;
    });
});
