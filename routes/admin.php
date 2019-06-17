<?php
/**
 * 后台路由文件
 * User: singeo
 * Date: 4/4/19
 * Time: 2:10 PM
 */
Route::group([
    'domain' => 'larsadmin.singeo.com',
    'namespace' => '\App\Admin\Controllers'
], function () {

    Route::group(['middleware'=>['auth:consoleUser','rbac']],function (){
        //以下每个路由都需要有一个路由别名，用于RBAC权限管理
        //后台首页
        Route::get('/','IndexController@index')->name('console.index') ;
        //后台用户管理路由
        Route::group(['prefix'=>'consoleuser'],function ()
        {
            Route::get('index','ConsoleUserController@index')->name('consoleuser.index');
            Route::get('create','ConsoleUserController@create')->name('consoleuser.create');
            Route::post('store','ConsoleUserController@store')->name('consoleuser.store');
            Route::get('edit/{console_user}','ConsoleUserController@edit')->name('consoleuser.edit');
            Route::put('save','ConsoleUserController@save')->name('consoleuser.save');
            Route::get('userrole/{console_user}','ConsoleUserController@userrole')->name('consoleuser.userrole');
            Route::post('saveRoles/{console_user}','ConsoleUserController@saveRoles')->name('consoleuser.saveRoles') ;
        }) ;
        //后台角色管理路由
        Route::group(['prefix'=>'consolerole'],function (){
            Route::get('index','ConsoleRoleController@index')->name('consolerole.index');
            Route::get('create','ConsoleRoleController@create')->name('consolerole.create');
            Route::post('store','ConsoleRoleController@store')->name('consolerole.store');
            Route::get('edit/{console_role}','ConsoleRoleController@edit')->name('consolerole.edit');
            Route::put('save','ConsoleRoleController@save')->name('consolerole.save');
            Route::get('rolenode/{console_role}','ConsoleRoleController@rolenode')->name('consolerole.rolenode');
            Route::post('role_access/{console_role}','ConsoleRoleController@roleAccess')->name('consolerole.roleAccess');
        });
        //后台节点管理路由
        Route::group(['prefix'=>'consolenode'],function ()
        {
            Route::get('index','ConsoleNodeController@index')->name('consolenode.index');
            Route::get('create/{console_node?}','ConsoleNodeController@create')->name('consolenode.create');
            Route::post('store','ConsoleNodeController@store')->name('consolenode.store');
            Route::get('edit/{console_node}','ConsoleNodeController@edit')->name('consolenode.edit');
            Route::put('save','ConsoleNodeController@save')->name('consolenode.save');
            Route::get('delete/{console_node}','ConsoleNodeController@destroy')->name('consolenode.destroy');
            Route::delete('submitdelete','ConsoleNodeController@submitDestroy')->name('consolenode.submitDestroy');
        }) ;
    }) ;

    //后台登录路由
    Route::get('login','LoginController@index')->name('login');
    Route::get('logout','LoginController@logout');
    Route::post('login','LoginController@submit');
    Route::get('verify','LoginController@verify');
    Route::get('fails',function (){
        return view('admin.common.fails') ;
    });
    Route::get('success',function (){
        return view('admin.common.success') ;
    });
});
