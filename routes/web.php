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
include_once('admin.php');















