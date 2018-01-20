<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登陆页面
    public function index()
    {
        return view('login.index');
    }

    /**
     * 登陆逻辑
     */
    public function login()
    {
        $this->validate(\request(),[
            'email'=>'required|email',
            'password'=>'required|min:3|max:20',
            'is_remember'=>'integer'
        ]);
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_remember)) return redirect('/posts');
        return back()->withErrors('邮箱或者密码错误');
    }

    //登出行为
    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
