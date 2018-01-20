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
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('post.index',compact('posts'));
    }
    //文章详情(show方法里需要绑定模型)
    public function show(Post $post)
    {
        //dd($post);    访问路由,地址栏给上文章对应的id就可以了
        return view('post.show',compact('post'));
    }
    //创建文章
    public function create()
    {
        return view('post.create');
    }
    //创建文章逻辑
    public function store()
    {
        $this->validate(request(),
            [
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|min:10'
            ]
            /*['title.required'=>'请输入文章标题']*/);

        /*使用create方法时,要在模型里设置可以赋值的属性,它的结果是一个模型*/
         //Post::create(request(['title','content']));
        $post = new Post();
        $post->title = request('title');
        $content = strip_tags(request('content'));
        $post->content = $content;
        $post->saveOrFail();
        return redirect('/posts');
    }
    //编辑文章
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }
    //编辑文章逻辑
    public function update(Post $post)
    {
        $this->validate(request(),
            [
                'title'=>'required|string|max:100|min:5',
                'content'=>'required|string|min:10'
            ]);
        $post->title = request('title');
        $post->content = request('content');
        $post->saveOrFail();
        return redirect("/posts/{$post->id}");
    }
    //删除文章
    public function delete(Post $post)
    {
        //TODO:用户的权限认证
        $post->delete();
        return redirect('/posts');
    }

    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
        //dd(request()->all());
    }
}
