<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //文章列表
    public function index()
    {
        //将文章以创建时间从新到旧排序,get()方法取出的是一个collection集合
        $posts = Post::orderBy('created_at','desc')->get();
        return view('post.index',compact('posts'));
    }
    //文章详情
    public function show()
    {
        return view('post.show');
    }
    //创建文章
    public function create()
    {
        return view('post.create');
    }
    //创建文章逻辑
    public function store()
    {
        
    }
    //编辑文章
    public function edit()
    {
        return view('post.edit');
    }
    //编辑文章逻辑
    public function update()
    {
        
    }
    //删除文章
    public function delete()
    {
        
    }
}
