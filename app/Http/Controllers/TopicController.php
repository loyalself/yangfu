<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Model\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * 专题显示页面:
     * 在这里用的是模型绑定的方法,所以当你想看专题时,你会在地址栏传参，比如我想看id为1的topic,但是在你刚刚建完模型时,
     * 数据库中并没有数据,所有会报错,因此刚开始时我们不用传入Topic模型
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Topic $topic)
    {
        //关于当前专题下的文章数  dd($topic) => topic的信息外加一个字段:post_topics_count
        $topic = Topic::withCount('postTopics')->find($topic->id);

        //专题文章的列表,取10个
        $posts = $topic->posts()->orderBy('created_at','desc')->take(10)->get();

        //属于我的文章但是未投稿
        $myposts = Post::authorBy(\Auth::id())->topicNotBy($topic->id)->get();
        //dd($myposts);
        return view('topic.show',compact('topic','posts','myposts'));
    }

    /**
     * 文章提交
     * @param Topic $topic
     */
    public function submit(Topic $topic)
    {
        $this->validate(request(),[
            'post_ids' => 'required|array'
        ]);

        $post_ids = request('post_ids');    //这个是文章的id的集合
        $topic_id = $topic->id;
        foreach ($post_ids as $post_id)
        {
            \App\Model\PostTopic::firstOrCreate(compact('topic_id', 'post_id'));
        }
        return back();
    }
}
