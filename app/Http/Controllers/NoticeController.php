<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/1/30
 * Time: 17:13
 */
namespace App\Http\Controllers;

class NoticeController extends Controller
{
    public function index()
    {
        //获取当前用户
        $user = \Auth::user();
        $notices = $user->notices;
        return view('notice.index',compact('notices'));
    }
}