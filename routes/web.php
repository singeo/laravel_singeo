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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('user/profile', function () {
    echo route('profile') ;
})->name('profile');

/*
Route::get('user/{id}',function($id){
    return 'User:'.$id ;
}) ;
Route::get('user/{name?}',function($name = 'nihao'){
    return 'User_name:'.$name ;
}) ;

Route::get('user/{id}/{name?}',function($id,$name = 'nihao'){
    return 'user_id:'.$id.',User_name:'.$name ;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']) ;

Route::match(['get','post'],'mutly1',function (){
    return 'mutly1' ;
}) ;
Route::any('mutly2',function (){
    return 'mutly2' ;
}) ;
*/
//Route::get($uri, $callback);
//Route::post($uri, $callback);
//Route::put($uri, $callback);
//Route::patch($uri, $callback);
//Route::delete($uri, $callback);
//Route::options($uri, $callback);

//Route::match(['get', 'post'], '/', function () {
//    //
//});
//
//Route::any('foo', function () {
//    //
//});

//路由群组
/**
Route::group(['prefix'=>'member'],function (){
    Route::any('mutly2',function (){
        return 'member-mutly2' ;
    }) ;
    Route::any('mutly1',function (){
        return 'member-mutly1' ;
    }) ;
}) ;

*/
//路由中输出视图
/**
Route::get('hello',function (){
    return view('welcome') ;
}) ;
 * */