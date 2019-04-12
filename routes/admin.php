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
            Route::get('add','\App\Admin\Controllers\ConsoleUserController@add');
            Route::get('edit/{console_user}','\App\Admin\Controllers\ConsoleUserController@edit');
        }) ;
    }) ;

    //后台登录路由
    Route::get('login','\App\Admin\Controllers\LoginController@index');
    Route::get('logout','\App\Admin\Controllers\LoginController@logout');
    Route::post('login','\App\Admin\Controllers\LoginController@submit');
    Route::get('verify','\App\Admin\Controllers\LoginController@verify');
});
