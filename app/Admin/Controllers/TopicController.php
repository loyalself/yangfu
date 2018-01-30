<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/30
 * Time: 15:26
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Topic;

class TopicController extends Controller
{
    /**
     * 专题列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topic.index',compact('topics'));
    }

    /**
     * 创建专题页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.topic.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|string'
        ]);
        Topic::create(['name'=>request('name')]);
        return redirect('/admin/topics');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return [
            'error'=>0,
            'msg'=>''
        ];
    }
}