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
        //使用Gate,如果用户没有系统管理的权限,就不能调下面的方法
        Route::group(['middleware'=>'can:system'],function(){
            //管理人员列表
            Route::get('/users','\App\Admin\Controllers\UserController@index');
            Route::get('/users/create','\App\Admin\Controllers\UserController@create');
            Route::post('/users/store','\App\Admin\Controllers\UserController@store');
            Route::get('/users/{user}/role','\App\Admin\Controllers\UserController@role');
            Route::post('/users/{user}/role','\App\Admin\Controllers\UserController@storeRole');
            //角色
            Route::get('/roles','\App\Admin\Controllers\RoleController@index');
            Route::get('/roles/create','\App\Admin\Controllers\RoleController@create');
            Route::post('/roles/store','\App\Admin\Controllers\RoleController@store');
            Route::get('/roles/{role}/permission','\App\Admin\Controllers\RoleController@permission');
            Route::post('/roles/{role}/permission','\App\Admin\Controllers\RoleController@storePermission');
            //权限
            Route::get('/permissions','\App\Admin\Controllers\PermissionController@index');
            Route::get('/permissions/create','\App\Admin\Controllers\PermissionController@create');
            Route::post('/permissions/store','\App\Admin\Controllers\PermissionController@store');
        });
        //文章Gate
        Route::group(['middleware'=>'can:post'],function(){
            //审核模块
            Route::get('/posts','\App\Admin\Controllers\PostController@index');
            Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');
        });
        //专题模块,使用的是Laravel中的resource
        Route::group(['middleware'=>'can:topic'],function(){
            Route::resource('topics','\App\Admin\Controllers\TopicController',
                ['only'=>['index','create','store','destroy']]);
        });
        //通知模块
        Route::group(['middleware'=>'can:notice'],function(){
            Route::resource('notices','\App\Admin\Controllers\NoticeController',
                ['only'=>['index','create','store']]);
        });


    });
});