<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/27
 * Time: 16:26
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //获取status是0的文章，即未知的
        $posts = Post::withoutGlobalScope('available')
                       ->where('status',0)
                       ->orderBy('created_at','desc')
                       ->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    public function status(Post $post)
    {
        $this->validate(request(),[
            'status'=>'required|in:1,-1'
        ]);
        $post->status = request('status');
        $post->save();
        return ['error'=>0,'msg'=>''];
    }
}