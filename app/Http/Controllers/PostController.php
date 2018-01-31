<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use App\Model\Post;
use App\Model\Zan;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //文章列表
    public function index()
    {
        //将文章以创建时间从新到旧排序,get()方法取出的是一个collection集合
        $posts = Post::orderBy('created_at','desc')
                       ->withCount(['comments','zans'])//获取评论数,使用这个方法后,集合里就有一个comment_count的字段,这个是Laravel自动生成的
                       ->paginate(6);
        $posts->load('user');       //Laravel中的预加载
        return view('post.index',compact('posts'));
    }
    //文章详情(show方法里需要绑定模型)
    public function show(Post $post)
    {
        //dd($post);    访问路由,地址栏给上文章对应的id就可以了
        $post->load('comments');    //预加载
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
        $user_id = \Auth::id();         //当你登陆后,这个方法会直接获取到用户的id
        $post->title = request('title');
        $content = strip_tags(request('content'));
        $post->content = $content;
        $post->user_id = $user_id;
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

        $this->authorize('update',$post);   //判断是否有修改权限

        $post->title = request('title');
        $content = strip_tags(request('content'));       //因为wangEditor里面有<p><br><p>标签,strip_tags会去除标签
        $post->content = $content;
        $post->saveOrFail();
        return redirect("/posts/{$post->id}");
    }
    //删除文章
    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('/posts');
    }

    /**
     * Image Upload
     * @param Request $request
     * @return string
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }

    /**
     * Add Comment
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Post $post)
    {
        $this->validate(request(),[
            'content'=>'required|min:3'
        ]);
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        return back();
    }

    /**
     * Add an zan
     * @param Post $post
     */
    public function zan(Post $post)
    {
        $params = [
            'user_id'=>\Auth::id(),
            'post_id'=>$post->id,
        ];
        Zan::firstOrCreate($params);
        return back();
    }

    /**
     * Cancel Zan
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function unzan(Post $post)
    {
        //这里的zan方法对应的是post模型里面的zan方法
        $post->zan(\Auth::id())->delete();
        return back();
    }


}
