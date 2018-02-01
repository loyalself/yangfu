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
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','LoginController@index');

Route::group(['middleware' => 'auth:web'],function(){
    //文章列表页
    Route::get('/posts','PostController@index');
    //创建文章
    Route::get('/posts/create','PostController@create');
    Route::post('/posts','PostController@store');
    //文章详情页(参数用的是模型绑定)
    Route::get('/posts/{post}','PostController@show');
    //编辑文章
    Route::get('/posts/{post}/edit','PostController@edit');
    Route::put('/posts/{post}','PostController@update');
    //删除文章
    Route::get('/posts/{post}/delete','PostController@delete');
    //评论文章
    Route::post('/posts/{post}/comment','PostController@comment');
    //对文章进行点赞和取消赞
    Route::get('/posts/{post}/zan','PostController@zan');
    Route::get('/posts/{post}/unzan','PostController@unzan');
    //图片上传
    Route::post('/posts/img/upload', 'PostController@imageUpload');

    //个人中心主页
    Route::get('/user/{user}','UserController@show');
    Route::post('/user/{user}/fan','UserController@fan');
    Route::post('/user/{user}/unfan','UserController@unfan');

    //个人设置页面及操作
    Route::get('/user/me/seeting','UserController@seeting');
    Route::post('/user/me/seeting','UserController@seetingStore');

    //专题详情页
    Route::get('/topic/{topic}','TopicController@show');
    //投稿
    Route::post('/topic/{topic}/submit','TopicController@submit');

    //通知
    Route::get('/notices','NoticeController@index');
});
//用户模块
Route::get('/register','RegisterController@index');
Route::post('/register','RegisterController@register');
Route::get('/login','LoginController@index')->name('login');
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');

//包含后台管理路由文件,要在web.php中包含一下,才可以访问的到
//include_once('admin.php');   后台管理路由模块
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















