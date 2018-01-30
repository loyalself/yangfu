<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/30
 * Time: 17:00
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Notice;

class NoticeController extends Controller
{
    /**
     * 通知列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notice.index',compact('notices'));
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'title'=>'required|string',
            'content'=>'required|string'
        ]);

        $notice =  Notice::create(request(['title','content']));
        dispatch(new \App\Jobs\SendMessage($notice));
        return redirect('/admin/notices');
    }
}