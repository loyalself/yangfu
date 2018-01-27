<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/25
 * Time: 11:19
 */
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
    Route::group(['middleware'=>'auth:admin'],function(){
        //后台首页
        Route::get('/home','\App\Admin\Controllers\HomeController@home');
        //管理人员列表
        Route::get('/users','\App\Admin\Controllers\UserController@index');
        Route::get('/users/create','\App\Admin\Controllers\UserController@create');
        Route::post('/users/store','\App\Admin\Controllers\UserController@store');
        //审核模块
        Route::get('/posts','\App\Admin\Controllers\PostController@index');
        Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');
    });
});